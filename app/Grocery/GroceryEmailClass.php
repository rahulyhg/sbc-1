<?php
namespace App\Grocery;

use App\Department;
use App\Http\Requests;
use App\Program;
use App\Recipe;
use App\Food;
use App\Workout;
use App\Mindset;
use Auth;
use Session;
use Carbon\Carbon;
use DB;
use Mail;

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 6/25/2016
 * Time: 12:33 AM
 */
class GroceryEmailClass
{

   public static function GroceryList($program,$user){


// $program = Auth::user()->active_program->first();
       //dd($program);
       # days of recipes to add to current day (default is 1 week)
       $days = 6;
//		$data['data']=DB::select('Select rt.name as recipe_name, ft.name as food_name , irt.unit , irt.quanity_w, irt.quanity_s, it.name as ingedient_name, dt.name as department_name FROM program_recipe as prt, recipes as rt,food_recipe as frt, foods as ft, ingredient_recipe as irt, ingredients as it, departments as dt WHERE prt.recipe_id = rt.id AND prt.program_id = '.$program->id.' AND frt.recipe_id = rt.id AND ft.id = frt.food_id AND irt.recipe_id = rt.id AND irt.ingredient_id = it.id AND it.department_id = dt.id GROUP BY rt.id, dt.id ORDER BY dt.id, it.id, rt.id');

       # user's first day on the program
       $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
       // echo 'start day: ' . $start_day . '<br>';

       # user's first day of recipes which is previous Sunday unless the start date is later
       $today = Carbon::now();
       //echo 'today: ' . $today . '<br>';

       $saturday = Carbon::now()->next(Carbon::SATURDAY);
       //echo 'saturday: ' . $saturday . '<br>';

       # days until Saturday (for partial weeks)
       $days_until_saturday = $start_day->diffInDays($saturday, false);
       //echo 'days between start_day and Saturday: ' .  $days_until_saturday . '<br>';

       # adjust the number of days if this is a partial week
       if($days_until_saturday < $days) {
           $days = $days_until_saturday;
       }

       if($today->isSaturday()) {
		$first_day = $today->next(Carbon::SUNDAY)->endOfDay();
	  } else {
		$first_day = $today->previous(Carbon::SUNDAY)->endOfDay();
	  }
       //echo 'first day before adjustment: ' . $first_day . '<br>';

       $first_day_number = $start_day->diffInDays($first_day, false);
       //echo 'first day number: ' . $first_day_number . '<br>';

       if($first_day_number < 1) {
           $first_day_number = 1;
       }
       //echo 'first day number fixed: ' . $first_day_number . '<br>';

       # user's last day of recipes
       $last_day_number = $first_day_number + $days;
       //echo 'last day number: ' . $last_day_number;


       $data=array();
       $j=0;
       $departments=Department::orderBy('id', 'asc')->get();
       foreach($departments as $department){

           //$ingredents=DB::select('SELECT it.name as ingred_name, it.id as ingredient_id, (Select `name` from `recipes` where `id`=`irt`.`recipe_id`) as recipe_name FROM program_recipe as prt, ingredient_recipe as irt, ingredients as it WHERE prt.program_id = '.$program->id.' AND prt.recipe_id = irt.recipe_id AND it.department_id = '.$department->id.' AND prt.day BETWEEN '.$first_day_number.' AND '.$last_day_number.' GROUP BY it.id ORDER BY it.name');

           //$ingredents=DB::select('SELECT it.name as ingred_name, it.id as ingredient_id FROM program_recipe as prt, ingredient_recipe as irt, ingredients as it WHERE prt.program_id = '.$program->id.' AND prt.recipe_id = irt.recipe_id AND it.department_id = '.$department->id.' AND prt.day BETWEEN '.$first_day_number.' AND '.$last_day_number.' GROUP BY it.id ORDER BY it.name');

           $program_id=$program->id;

           $ingredients=DB::table('ingredient_recipe')
               ->selectRaw('ingredient_recipe.*,ingredients.*,SUM(ingredient_recipe.quanity_w) AS total_quantity_w, SUM(ingredient_recipe.quanity_s) AS total_quantity_s, GROUP_CONCAT(DISTINCT ingredient_recipe.recipe_id SEPARATOR " , ") AS recipe_ids')
               ->join('ingredients','ingredients.id','=','ingredient_recipe.ingredient_id')
               ->join('program_recipe','program_recipe.recipe_id','=','ingredient_recipe.recipe_id')
               ->where('ingredients.department_id','=',$department->id)
               ->where('program_recipe.program_id','=',$program_id)
               ->whereBetween('program_recipe.day',array($first_day_number,$last_day_number))
               ->groupBy('ingredient_recipe.ingredient_id')
               ->orderBy('ingredients.name','ASC')
               ->get();

           //$data['data'][]=$department->name;
           $data['ingre'][$j]['department']=$department->name;
           $i=0;
           foreach($ingredients as $row){
               //echo $ingredent->recipe_name;
               //  $data['data'][$i]['department']=$department->name;
               //$quantity=DB::select('SELECT SUM(ingredient_recipe.quanity_w) as total_quantity_w, SUM(ingredient_recipe.quanity_s) as total_quantity_s, unit, GROUP_CONCAT(DISTINCT ingredient_recipe.recipe_id SEPARATOR " , ") as recipe_ids FROM ingredient_recipe,program_recipe WHERE ingredient_recipe.recipe_id = program_recipe.recipe_id AND ingredient_recipe.ingredient_id = '.$ingredent->ingredient_id.' AND program_recipe.day BETWEEN '.$first_day_number.' AND '.$last_day_number.' LIMIT 1');

               $data['ingre'][$j]['ingrednet'][$i]['name']=$row->name;
               $data['ingre'][$j]['ingrednet'][$i]['total_quantity_w']=$row->total_quantity_w;
               $data['ingre'][$j]['ingrednet'][$i]['total_quantity_s']=$row->total_quantity_s;
               $data['ingre'][$j]['ingrednet'][$i]['recipe_ids']=$row->recipe_ids;
               $data['ingre'][$j]['ingrednet'][$i]['food']=$row->food_id;  
               $i++;
           }

           $j++;
       }
       $data['first_day_number']=$first_day_number;
       $data['last_day_number']=$last_day_number;
        return $data;
    }
}