<?php
namespace App\Http\Controllers;
use App\Playlists;
use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests;
use App\Program;
use App\Recipe;
use App\Food;
use App\Workout;
use App\Mindset;
use App\Measurement;
use Auth;
use Session;
Use Redirect;
use Carbon\Carbon;
use DB;
class ProgramController extends Controller
{
  /**
  * Show recipe page
  *
  * @return \Illuminate\Http\Response
  */
  public function recipe($id)
  {
    $recipe = Recipe::findOrFail($id);
    $ingredients = $recipe->ingredients()->orderBy('order')->get();
    return view('program.recipe', compact('recipe', 'ingredients'));
  }
  /**
  * Show food page
  *
  * @return \Illuminate\Http\Response
  */
  public function food($id)
  {
    $food = Food::findOrFail($id);
    return view('program.food', compact('food'));
  }
  /**
  * Show workout page
  *
  * @return \Illuminate\Http\Response
  */
  public function workout($id)
  {
    $workout = Workout::findOrFail($id);
    return view('program.workout', compact('workout'));
  }
  /**
  * Show public workout page for facebook sharing
  *k
  * @return \Illuminate\Http\Response
  */
  public function workoutShare($id)
  {
    $workout = Workout::findOrFail($id);
    return view('workout', compact('workout'));
  }
  /**
  * Show mindset page
  *
  * @return \Illuminate\Http\Response
  */
  public function mindset($id)
  {
    $mindset = Recipe::findOrFail($id);
    return view('program.mindset', compact('mindset'));
  }
  /**
  * kShow recipe lounge page
  *
  * @return \Illuminate\Http\Response
  */
  public function recipeLounge($id = NULL)
  {	# user's program
    $program = Auth::user()->active_program->first(); 
	# program to take recipes from
	$program_recipes = Program::findOrFail(1);
 
    # user's first day on the program
    $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start)->startOfDay();
    //echo 'start day: ' . $start_day . '<br>';
    # user's first day of recipes which is previous Sunday unless the start date is later
    $today = Carbon::now();
    $first_day = $today->previous(Carbon::SUNDAY);
    //echo 'first day before adjustment: ' . $first_day . '<br>';
    $first_day_number = $start_day->diffInDays($first_day, false);
    //echo 'first day number: ' . $first_day_number . '<br>';
    if($first_day_number < 1) {
      $first_day_number = 1;
    }
    //echo 'first day number: ' . $first_day_number . '<br>';
    # user's last day of recipes
    $last_day_number = $first_day_number + 6;
    //echo 'last day number: ' . $last_day_number;
    if(isset($id)) {
      $recipes = Recipe::where('meal_id',$id)->where('id','!=','62')->get();
      $recipes = $recipes->groupBy('meal_id');
      $category = 1;
    }
    else {
      $recipes = $program_recipes->recipes()->where('id','!=','62')->wherePivot('day', '>=',$first_day_number)->wherePivot('day', '<=',$last_day_number)->orderBy('meal_id')->get();
      $recipes = $recipes->groupBy('meal_id');
    }
    return view('program.recipe-lounge', compact('recipes','category'));
  }
  /**
  * Show exercise room page
  *
  * @return \Illuminate\Http\Response
  */
  public function exerciseRoom($category = NULL)
  {
    if(isset($category)) {
      $workouts = Workout::where('category_id',7)->orderBy('name')->get();
      return view('program.workout-bonus', compact('workouts'));
    }
    else {
      //$workouts = Workout::where('day', '<=', 7)->orderBy('name')->get();
      $workouts = Workout::whereIn('category_id',[4,2,3,1,5])->get();
      $new_user_id = Auth::user()->id;
      $cntUserVideo=Playlists::where('user_id',$new_user_id)->count();
      $workouts_warmup = $workouts->where('category_id',4)->sortBy('name');
      $workouts_cardio = $workouts->where('category_id',2)->sortBy('name');
      $workouts_resistance = $workouts->where('category_id',3)->sortBy('name');
      $workouts_abscore = $workouts->where('category_id',1)->sortBy('name');
      $workouts_cooldown = $workouts->where('category_id',5)->sortBy('name');
      return view('program.exercise-room', compact('cntUserVideo','workouts_warmup','workouts_cardio','workouts_resistance','workouts_abscore','workouts_cooldown'));
    }
  }
  /**
  * Show exercise room page
  *
  * @return \Illuminate\Http\Response
  */
  public function eventReady()
  {
    // workouts are the same for both programs
    $workouts = Workout::where('day', '<=', 7)->orderBy('name')->get();
    return view('program.event-ready', compact('workouts'));
  }
  /**
  * Show exercise room page
  *
  * @return \Illuminate\Http\Response
  */
  public function workoutPrep()
  {
    // workouts are the same for both programs
    $workouts = Workout::where('day', '<=', 7)->orderBy('name')->get();
    return view('program.workout-prep', compact('workouts'));
  }
  /**
  * Show shopping list page
  *
  * @return \Illuminate\Http\Response
  */
  public function saveData(Request $request)
  {
    $videos_id = $request['name'];
    $workouts = Workout::whereIn('category_id',[4,5])->get();
    $workouts_warmup = $workouts->where('category_id',4)->sortBy('name');
    $workouts_cooldown = $workouts->where('category_id',5)->sortBy('name');
    $wormex = array();
    foreach ($workouts_warmup as $key => $value) {
      $wormex[] = $value->id;
    }
    $cool = array();
    foreach ($workouts_cooldown as $key => $val) {
      $cool[] = $value->id;
    }
    /*$error = 0;
    if(!in_array($videos_id[0],$wormex)){
    $error = 1;
  }
  if(!in_array(end($videos_id), $cool)){
  $error = 2;
}
if($error == 0){*/
$new_user_id = Auth::user()->id;
$videoslist = array();
foreach ($videos_id as $video_id) {
  $videoslist[] =  $video_id;
}
$videos=serialize($videoslist);
$cntUserVideo=Playlists::where('user_id',$new_user_id)->count();
if($cntUserVideo >  0){
  $UserVideo=Playlists::where('user_id',$new_user_id)->first();
  $playlist=Playlists::find($UserVideo->id);
  $playlist->workouts=$videos;
  $playlist->save();
}else{
  $playlist= new Playlists();
  $playlist->user_id=$new_user_id;
  $playlist->workouts=$videos;
  $playlist->save();
}
return Redirect::to('/program/playlists');
/*}
else{
$workouts = Workout::whereIn('category_id',[4,2,3,1,5])->get();
$workouts_warmup = $workouts->where('category_id',4)->sortBy('name');
$workouts_cardio = $workouts->where('category_id',2)->sortBy('name');
$workouts_resistance = $workouts->where('category_id',3)->sortBy('name');
$workouts_abscore = $workouts->where('category_id',1)->sortBy('name');
$workouts_cooldown = $workouts->where('category_id',5)->sortBy('name');
return view('program.exercise-room', compact('workouts_warmup','workouts_cardio','workouts_resistance','workouts_abscore','workouts_cooldown', 'error'));
}*/
}
public function getPlaylist(){
  $user_id=Auth::user()->id;
  $playlist=Playlists::where('user_id',$user_id)->first();
  $workouts_id=unserialize($playlist->workouts);
  //$workout = Workout::findOrFail($workouts_id);
  $workout=Workout::whereIn('id',$workouts_id)->orderBy(DB::raw('FIELD(id,'.implode(",",$workouts_id).')'))->get();
  return view('program.view-video',["workout"=>$workout]);
  //		print_r($workouts_id);
  //		exit;
}
public function shoppingList()
{
  # user's program
  $program = Auth::user()->active_program->first();
  //dd($program);
  # days of recipes to add to current day (default is 1 week)
  $days = 6;
  //		$data['data']=DB::select('Select rt.name as recipe_name, ft.name as food_name , irt.unit , irt.quanity_w, irt.quanity_s, it.name as ingedient_name, dt.name as department_name FROM program_recipe as prt, recipes as rt,food_recipe as frt, foods as ft, ingredient_recipe as irt, ingredients as it, departments as dt WHERE prt.recipe_id = rt.id AND prt.program_id = '.$program->id.' AND frt.recipe_id = rt.id AND ft.id = frt.food_id AND irt.recipe_id = rt.id AND irt.ingredient_id = it.id AND it.department_id = dt.id GROUP BY rt.id, dt.id ORDER BY dt.id, it.id, rt.id');
  # user's first day on the program
  $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
  //echo 'start day: ' . $start_day . '<br>';
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
  //
  //		$recipes = $program->recipes()->wherePivot('day', '>=',$first_day_number)->wherePivot('day', '<=',$last_day_number)->orderBy('meal_id')->get();
  //
  //
  //
  //
  //		$all_ingredients = array();
  //
  //		foreach($recipes as $recipe) {
  //
  //			foreach($recipe->ingredients as $ingredient) {
  //				$all_ingredients[] =  $ingredient;
  //			}
  //		}
  //
  //		$ingredients = collect($all_ingredients)->where('department_id',2)->groupBy('id'); // convert to collection
  //
  //       // echo $current_day;
  //       // $ingredients=$ingredient->department;
  //foreach($ingredients as $ingredient){
  //   // dd($ingredient);
  //    //print_r($ingredient);
  //    //exit;
  //    echo $ingredient[0]->name.'<br>';
  //}
  //dd($ingredients);
  $data=array();
  $j=0;
  $departments=Department::orderBy('id', 'asc')->get();
  foreach($departments as $department){
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
  //         echo "<pre>";
  //print_r($data);
  //        exit;
  return view('program.shopping-list', $data);
}
public function getChart(){

  $measurements	= Auth::user()->measurements->sortBy('date')->reverse()->all();
  $user= Auth::user();
  // echo "<pre>";
  // print_r($firstmeasurement);
  // echo "</pre>";
  // //$date = "2010-10-10";
//echo date("m", strtotime($firstmeasurement->date));



  $last_day=date('Y-m-d');

// Last day of the month.
  $first_day= date('Y-m-d', strtotime('- 30 days'));

  $weight_unit=Auth::User()->weight_unit;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  $data['firstday']=$first_day;
  $data['lastday']=$last_day;
  $data['created_at']= $created_at;
  $data['measurements']=$measurements;
  $data['weight_unit']=$weight_unit;
  $data['weight']=$initial_weight;
  $data['weight_goal']=Auth::User()->weight_goal;
  return view('program.chart',$data);
}
public function postChartAjax(Request $request){
  $start_date=$request->input('startdate');
  $end_date=$request->input('enddate');
  $search=$request->input('search');
  $user_id=Auth::User()->id;
  $weight_unit=Auth::User()->weight_unit;
  $weight_goal=Auth::User()->weight_goal;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  //$labels[]=date('M d, Y',strtotime($created_at));
  if($weight_unit == 'lb'){
    // $data2[]= round(convert_to_lb($weight_goal),2);
    $main_weight_goal=round(convert_to_lb($weight_goal),2);
    //$data1[] = round(convert_to_lb($initial_weight),2);
  }else{
    //  $data2[] = round($weight_goal,1);
    //$data1[] = round($initial_weight,1);
    $main_weight_goal=round($weight_goal,1);
  }
  //  $measurements	=	Auth::user()->measurements->sortBy('date')->all();
  //$rang_date=array(date('Y-m-d',strtotime($start_date)),date('Y-m-d',strtotime($end_date)));
  //echo date('Y-m-d',strtotime($start_date));
  //echo $end_date;
  //exit;
  //print_r()
  //$measurements = Measurement::where('user_id',$user_id)->whereMonth('date','=',7)->get();
  $allmeasurements = Measurement::where('user_id',$user_id)->whereBetween('date',[$start_date,$end_date])->get();
  //wsecho $allmeasurements->count();
//  exit;
//echo $search;
//
// if($allmeasurements->count()==1){
//$measurements=$allmeasurements;
// }else{
//   if($search!='yes'){
//
//   $measurements	=	Measurement::where('user_id',$user_id)->orderBy('date', 'asc')->get();
//   $labels[]=date('M d, Y',strtotime($created_at));
//   if($weight_unit == 'lb'){
//      $data2[]= round(convert_to_lb($weight_goal),2);
//     $main_weight_goal=round(convert_to_lb($weight_goal),2);
//     $data1[] = round(convert_to_lb($initial_weight),2);
//   }else{
//       $data2[] = round($weight_goal,1);
//     $data1[] = round($initial_weight,1);
//     $main_weight_goal=round($weight_goal,1);
//   }
//}else{
//   $config_options = array(
//       'type'=>'line',
//       'data'=>array(
//         'labels'=>'',
//       ),
//     );
//   echo json_encode($config_options);
//   exit;
//}
// }.


//    echo $allmeasurements->count();
//    exit;
  //if($search!='yes'){
   if($allmeasurements->count()>0){

    //if($allmeasurements->count()==1){
   //echo date('m',strtotime($start_date));
   //exit;
     $measurements1	=	Measurement::where('user_id',$user_id)->whereDate('date','<',date('Y-m-d',strtotime($start_date)))->orderBy('date', 'dsc')->get();
       $measurements = $allmeasurements;
       if($start_date!=$measurements[0]->date) {
           if ($measurements1->count() > 0) {

               $labels[] = date('M d Y', strtotime($start_date));
               if ($weight_unit == 'lb') {
                   $data2[] = round(convert_to_lb($weight_goal), 2);
                   $data1[] = round(convert_to_lb($measurements1[0]->weight), 2);
               } else {
                   $data1[] = round($measurements1[0]->weight, 1);
                   $data2[] = round($weight_goal, 1);
               }
           } else {

               $labels[] = date('M d Y', strtotime($start_date));
               if ($weight_unit == 'lb') {
                   $data2[] = round(convert_to_lb($weight_goal), 2);
                   $data1[] = round(convert_to_lb($initial_weight), 2);
               } else {
                   $data1[] = round($initial_weight, 1);
                   $data2[] = round($weight_goal, 1);
               }
           }
       }
       $count=$measurements->count()-1;

       foreach($measurements as $measurement){
    $labels[]=date('M d, Y',strtotime($measurement->date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($measurement->weight),2);
    } else {
      $data1[] = round($measurement->weight,1);
      $data2[] = round($weight_goal,1);
    }
  }

       if($end_date!=$measurements[$count]->date){

           $labels[] = date('M d Y', strtotime($end_date. ' + 10 days'));
           if ($weight_unit == 'lb') {
               $data2[] = round(convert_to_lb($weight_goal), 2);
               $data1[] = round(convert_to_lb($measurements[$count]->weight), 2);
           } else {
               $data1[] = round($measurements[$count]->weight, 1);
               $data2[] = round($weight_goal, 1);
           }

       }

   }else{

     $last_measurements	= Measurement::where('user_id',$user_id)->whereDate('date','<',date('Y-m-d',strtotime($start_date)))->orderBy('date', 'dsc')->get();;

     if($last_measurements->count()>0) {
       $labels[] = date('M d Y', strtotime($start_date));
       if ($weight_unit == 'lb') {
         $data2[] = round(convert_to_lb($weight_goal), 2);
         $data1[] = round(convert_to_lb($last_measurements[0]->weight), 2);
       } else {
         $data1[] = round($last_measurements[0]->weight, 1);
         $data2[] = round($weight_goal, 1);
       }
       $labels[] = date('M d Y', strtotime($end_date. '+5 days'));
       if ($weight_unit == 'lb') {
         $data2[] = round(convert_to_lb($weight_goal), 2);
         $data1[] = round(convert_to_lb($last_measurements[0]->weight), 2);
       } else {
         $data1[] = round($last_measurements[0]->weight, 1);
         $data2[] = round($weight_goal, 1);
       }
     }else{
          $labels[]=date('M d, Y',strtotime($start_date));
   if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);

     $data1[] = round(convert_to_lb($initial_weight),2);
   }else{
       $data2[] = round($weight_goal,1);
     $data1[] = round($initial_weight,1);

   }
         $labels[]=date('M d, Y',strtotime($end_date. '+5 days'));
         if($weight_unit == 'lb'){
             $data2[]= round(convert_to_lb($weight_goal),2);
             $data1[] = round(convert_to_lb($initial_weight),2);
         }else{
             $data2[] = round($weight_goal,1);
             $data1[] = round($initial_weight,1);
         }
     }
   }


    $all_weight=array_merge($data1,$data2);
    $min=min($all_weight);
    $ystartpoint=$min;
    $ystartpoint=floor($ystartpoint / 10) * 10;
    if($min-$ystartpoint<=5)
    {
        $ystartpoint=$ystartpoint-10;
        if($ystartpoint<0)
        {
            $ystartpoint=0;
        }
    }

  $config_options = array(
    'type'=>'line',
    'data'=>array(
      'labels'=>$labels,
      'datasets'=>array(
        array(
          'label'=>'Weight Goal : '.$main_weight_goal.' '.$weight_unit,
          'data'=>$data2,
          'borderDash'=> [10,10],
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.3)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>0,
          "borderWidth"=>4
        ),
        array(
          'label'=>'Weight',
          'data'=>$data1,
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.8)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>6,
          "borderWidth"=>4							)
        )
      ),
      'options'=>array(
        'responsive'=> 'true',
        'legend'=>array(
          'position'=>'bottom',
        ),
        'hover'=>array(
          'mode'=>'label'
        ),
        'tooltips'=>array(
          'enabled'=>true,
          'mode'=>'single',
          'tooltipTemplate'=>"function (label) {
            return customTooltip(label);
            }"
          ),
          'scales'=>array(
            'xAxes'=>array(array(
              "type"=>'time',
                'ticks'=>array(
                   'labelOffset'=>5,
                    'minRotation'=>50,

                ),
                "time"=>array(
                "displayFormats"=>array(
                  'day'=>'MMM DD',
                ),
                  "max"=>$end_date,
                  "min"=>$start_date,
                "unit"=>'day',
                'unitStepSize'=> 3,
              ),

              'display'=>true,
              'scaleLabel'=>array(
                'display'=>false,
                'labelString'=>'',

              ),


            )
          ),
          'yAxes'=>array(array(
            'display'=>true,
            'scaleLabel'=>array(
              'display'=>true,
              'labelString'=>'Weight in '.$weight_unit
            ),
            'ticks'=>array(
              'suggestedMin'=> '1',
                'min'=>$ystartpoint
            )
          )
        ),
      ),
      'title'=> array(
        'display'=> true,
        'text'=> ''
      ),
    )
  );
  echo json_encode($config_options);
  exit;
}
//Ajax Chart According to the Month
public function chartAjaxMonth(){
  $user_id=Auth::User()->id;
  $weight_unit=Auth::User()->weight_unit;
  $weight_goal=Auth::User()->weight_goal;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  $labels[]=date('M d, Y',strtotime($created_at));
  if($weight_unit == 'lb'){
    $data2[]= round(convert_to_lb($weight_goal),2);
    $main_weight_goal=round(convert_to_lb($weight_goal),2);
    $data1[] = round(convert_to_lb($initial_weight),2);
  }else{
    $data2[] = round($weight_goal,1);
    $data1[] = round($initial_weight,1);
    $main_weight_goal=round($weight_goal,1);
  }
  $measurements	=	Auth::user()->measurements->sortBy('date')->all();
  foreach($measurements as $measurement){
    $labels[]=date('M d, Y',strtotime($measurement->date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($measurement->weight),2);
    } else {
      $data1[] = round($measurement->weight,1);
      $data2[] = round($weight_goal,1);
    }
  }
    $all_weight=array_merge($data1,$data2);
    $min=min($all_weight);
    $ystartpoint=$min;
    $ystartpoint=floor($ystartpoint / 10) * 10;
    if($min-$ystartpoint<=5)
    {
        $ystartpoint=$ystartpoint-10;
        if($ystartpoint<0)
        {
            $ystartpoint=0;
        }
    }
  $config_options = array(
    'type'=>'line',
    'data'=>array(
      'labels'=>$labels,
      'datasets'=>array(
        array(
          'label'=>'Weight Goal : '.$main_weight_goal.' '.$weight_unit,
          'data'=>$data2,
          'borderDash'=> [10,10],
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.3)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>0,
          "borderWidth"=>4
        ),
        array(
          'label'=>'Weight',
          'data'=>$data1,
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.8)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>6,
          "borderWidth"=>4							)
        )
      ),
      'options'=>array(
        'responsive'=> 'true',
        'legend'=>array(
          'position'=>'bottom',
        ),
        'hover'=>array(
          'mode'=>'label'
        ),
        'tooltips'=>array(
          'enabled'=>true,
          'mode'=>'single',
          'tooltipTemplate'=>"function (label) {
            return customTooltip(label);
            }"
          ),
          'scales'=>array(
            'xAxes'=>array(array(
              "type"=>'time',

                'ticks'=>array(
                    'labelOffset'=>5,
                    'minRotation'=>50,

                ),
              "time"=>array(
                "displayFormats"=>array(
                  'month'=>'MMM YYYY'
                ),
                'unit'=>'month'
              ),
              'display'=>true,
              'scaleLabel'=>array(
                'display'=>false,
                'labelString'=>''
              )
            )
          ),
          'yAxes'=>array(array(
            'display'=>true,
            'scaleLabel'=>array(
              'display'=>true,
              'labelString'=>'Weight in '.$weight_unit
            ),
            'ticks'=>array(
              'suggestedMin'=> '1',
                'min'=>$ystartpoint
            )
          )
        ),
      ),
      'title'=> array(
        'display'=> true,
        'text'=> ''
      ),
    )
  );
  echo json_encode($config_options);
  exit;
}
//Ajax Chart According to the Year
public function chartAjaxYear(){
  $user_id=Auth::User()->id;
  $weight_unit=Auth::User()->weight_unit;
  $weight_goal=Auth::User()->weight_goal;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  $labels[]=date('M d, Y',strtotime($created_at));
  if($weight_unit == 'lb'){
    $data2[]= round(convert_to_lb($weight_goal),2);
    $main_weight_goal=round(convert_to_lb($weight_goal),2);
    $data1[] = round(convert_to_lb($initial_weight),2);
  }else{
    $data2[] = round($weight_goal,1);
    $data1[] = round($initial_weight,1);
    $main_weight_goal=round($weight_goal,1);
  }
  $measurements	=	Auth::user()->measurements->sortBy('date')->all();
  foreach($measurements as $measurement){
    $labels[]=date('M d, Y',strtotime($measurement->date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($measurement->weight),2);
    } else {
      $data1[] = round($measurement->weight,1);
      $data2[] = round($weight_goal,1);
    }
  }

    $all_weight=array_merge($data1,$data2);
    $min=min($all_weight);
    $ystartpoint=$min;
    $ystartpoint=floor($ystartpoint / 10) * 10;
    if($min-$ystartpoint<=5)
    {
        $ystartpoint=$ystartpoint-10;
        if($ystartpoint<0)
        {
            $ystartpoint=0;
        }
    }
  $config_options = array(
    'type'=>'line',
    'data'=>array(
      'labels'=>$labels,
      'datasets'=>array(
        array(
          'label'=>'Weight Goal : '.$main_weight_goal.' '.$weight_unit,
          'data'=>$data2,
          'borderDash'=> [10,10],
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.3)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>0,
          "borderWidth"=>4
        ),
        array(
          'label'=>'Weight',
          'data'=>$data1,
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.8)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>6,
          "borderWidth"=>4							)
        )
      ),
      'options'=>array(
        'responsive'=> 'true',
        'legend'=>array(
          'position'=>'bottom',
        ),
        'hover'=>array(
          'mode'=>'label'
        ),
        'tooltips'=>array(
          'enabled'=>true,
          'mode'=>'single',
          'tooltipTemplate'=>"function (label) {
            return customTooltip(label);
            }"
          ),
          'scales'=>array(
            'xAxes'=>array(array(
              "type"=>'time',

                'ticks'=>array(
                    'labelOffset'=>5,
                    'minRotation'=>50,

                ),
              "time"=>array(
                "displayFormats"=>array(
                  'year'=>'MMM YYYY'
                ),
                'unit'=>'month',

              ),
              'display'=>true,
              'scaleLabel'=>array(
                'display'=>false,
                'labelString'=>''
              )
            )
          ),
          'yAxes'=>array(array(
            'display'=>true,
            'scaleLabel'=>array(
              'display'=>true,
              'labelString'=>'Weight in '.$weight_unit
            ),
            'ticks'=>array(
              'suggestedMin'=> '1',
                'min'=>$ystartpoint
            )
          )
        ),
      ),
      'title'=> array(
        'display'=> true,
        'text'=> ''
      ),
    )
  );
  echo json_encode($config_options);
  exit;
}
//Ajax Chart According to the Week
public function chartAjaxWeek(){
  $user_id=Auth::User()->id;
  $weight_unit=Auth::User()->weight_unit;
  $weight_goal=Auth::User()->weight_goal;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  $labels[]=date('M d, Y',strtotime($created_at));
  if($weight_unit == 'lb'){
    $data2[]= round(convert_to_lb($weight_goal),2);
    $main_weight_goal=round(convert_to_lb($weight_goal),2);
    $data1[] = round(convert_to_lb($initial_weight),2);
  }else{
    $data2[] = round($weight_goal,1);
    $data1[] = round($initial_weight,1);
    $main_weight_goal=round($weight_goal,1);
  }
  $measurements	=	Auth::user()->measurements->sortBy('date')->all();
  foreach($measurements as $measurement){
    $labels[]=date('M d, Y',strtotime($measurement->date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($measurement->weight),2);
    } else {
      $data1[] = round($measurement->weight,1);
      $data2[] = round($weight_goal,1);
    }
  }

    $all_weight=array_merge($data1,$data2);
    $min=min($all_weight);
    $ystartpoint=$min;
    $ystartpoint=floor($ystartpoint / 10) * 10;
    if($min-$ystartpoint<=5)
    {
        $ystartpoint=$ystartpoint-10;
        if($ystartpoint<0)
        {
            $ystartpoint=0;
        }
    }
  $config_options = array(
    'type'=>'line',
    'data'=>array(
      'labels'=>$labels,
      'datasets'=>array(
        array(
          'label'=>'Weight Goal : '.$main_weight_goal.' '.$weight_unit,
          'data'=>$data2,
          'borderDash'=> [10,10],
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.3)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>0,
          "borderWidth"=>4
        ),
        array(
          'label'=>'Weight',
          'data'=>$data1,
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.8)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>6,
          "borderWidth"=>4							)
        )
      ),
      'options'=>array(
        'responsive'=> 'true',
        'legend'=>array(
          'position'=>'bottom',
        ),
        'hover'=>array(
          'mode'=>'label'
        ),
        'tooltips'=>array(
          'enabled'=>true,
          'mode'=>'single',
          'tooltipTemplate'=>"function (label) {
            return customTooltip(label);
            }"
          ),
          'scales'=>array(
            'xAxes'=>array(array(
              "type"=>'time',

                'ticks'=>array(
                    'labelOffset'=>5,
                    'minRotation'=>50,

                ),
              "time"=>array(
                "displayFormats"=>array(
                  'week'=>'MMM DD'
                ),
                'unit'=>'week'
              ),
              'display'=>true,
              'scaleLabel'=>array(
                'display'=>false,
                'labelString'=>''
              )
            )
          ),
          'yAxes'=>array(array(
            'display'=>true,
            'scaleLabel'=>array(
              'display'=>true,
              'labelString'=>'Weight in '.$weight_unit
            ),
            'ticks'=>array(
              'suggestedMin'=> '1',
                'min'=>$ystartpoint
            )
          )
        ),
      ),
      'title'=> array(
        'display'=> true,
        'text'=> ''
      ),
    )
  );
  echo json_encode($config_options);
  exit;
}
//miniChartAjax showing the MIni chart
public function miniChartAjax(){
  $user_id=Auth::User()->id;
  $weight_unit=Auth::User()->weight_unit;
  $weight_goal=Auth::User()->weight_goal;
  $initial_weight=Auth::User()->weight;
  $created_at=Auth::User()->created_at;
  $count_data=Measurement::where('user_id',$user_id)->count();
  //exit;
//  if($count_data<5){
//    $labels[]=date('m-d',strtotime($created_at));
//    if($weight_unit == 'lb'){
//      $data2[]= round(convert_to_lb($weight_goal),2);
//      $data1[] = round(convert_to_lb($initial_weight),2);
//    }else{
//      $data2[] = round($weight_goal,1);
//      $data1[] = round($initial_weight,1);
//    }
//  }

    $weight=array();
  $measurements	=	Auth::user()->measurements->sortByDesc('date')->take(4)->reverse()->all();
  $start_date=date('Y-m-d',strtotime('- 6 days '));
  $end_date=date('Y-m-d');
  $allmeasurements = Measurement::where('user_id',$user_id)->whereBetween('date',[$start_date,$end_date])->get();

if($allmeasurements->count()>0){

    $measurements1	=	Measurement::where('user_id',$user_id)->whereDate('date','<',date('Y-m-d',strtotime($start_date)))->orderBy('date', 'dsc')->get();
    $measurements = $allmeasurements;


    if($start_date!=$measurements[0]->date) {
        if ($measurements1->count() > 0) {

            $labels[] = date('M d Y', strtotime($start_date));
            if ($weight_unit == 'lb') {
                $data2[] = round(convert_to_lb($weight_goal), 2);
                $data1[] = round(convert_to_lb($measurements1[0]->weight), 2);

            } else {
                $data1[] = round($measurements1[0]->weight, 1);
                $data2[] = round($weight_goal, 1);
            }

        } else {

            $labels[] = date('M d Y', strtotime($start_date));
            if ($weight_unit == 'lb') {
                $data2[] = round(convert_to_lb($weight_goal), 2);
                $data1[] = round(convert_to_lb($initial_weight), 2);
            } else {
                $data1[] = round($initial_weight, 1);
                $data2[] = round($weight_goal, 1);
            }
        }
    }

$count=$measurements->count()-1;

  foreach($measurements as $measurement){
    $labels[]=date('M d Y',strtotime($measurement->date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($measurement->weight),2);
    } else {
      $data1[] = round($measurement->weight,1);
      $data2[] = round($weight_goal,1);
    }

  }


    if($end_date!=$measurements[$count]->date){

        $labels[] = date('M d Y', strtotime($end_date. '+5 days'));
        if ($weight_unit == 'lb') {
            $data2[] = round(convert_to_lb($weight_goal), 2);
            $data1[] = round(convert_to_lb($measurements[$count]->weight), 2);
        } else {
            $data1[] = round($measurements[$count]->weight, 1);
            $data2[] = round($weight_goal, 1);
        }

    }


  }else{
  $measurements	= Auth::user()->measurements->sortByDesc('date')->first();

  if(!empty($measurements)) {
    $labels[] = date('M d Y', strtotime($start_date));
    if ($weight_unit == 'lb') {
      $data2[] = round(convert_to_lb($weight_goal), 2);
      $data1[] = round(convert_to_lb($measurements->weight), 2);
    } else {
      $data1[] = round($measurements->weight, 1);
      $data2[] = round($weight_goal, 1);
    }
    $labels[] = date('M d Y', strtotime($end_date. '+5 days'));
    if ($weight_unit == 'lb') {
      $data2[] = round(convert_to_lb($weight_goal), 2);
      $data1[] = round(convert_to_lb($measurements->weight), 2);
    } else {
      $data1[] = round($measurements->weight, 1);
      $data2[] = round($weight_goal, 1);
    }
  }else{
    $labels[]=date('M d, Y',strtotime($start_date));
    if($weight_unit == 'lb'){
      $data2[]= round(convert_to_lb($weight_goal),2);
      $main_weight_goal=round(convert_to_lb($weight_goal),2);
      $data1[] = round(convert_to_lb($initial_weight),2);
    }else{
      $data2[] = round($weight_goal,1);
      $data1[] = round($initial_weight,1);
      $main_weight_goal=round($weight_goal,1);
    }
      $labels[]=date('M d, Y',strtotime($end_date. '+5 days'));
      if($weight_unit == 'lb'){
          $data2[]= round(convert_to_lb($weight_goal),2);
          $main_weight_goal=round(convert_to_lb($weight_goal),2);
          $data1[] = round(convert_to_lb($initial_weight),2);
      }else{
          $data2[] = round($weight_goal,1);
          $data1[] = round($initial_weight,1);
          $main_weight_goal=round($weight_goal,1);
      }
  }
}

$all_weight=array_merge($data1,$data2);
   // print_r($all_weight);
     $min=min($all_weight);
    $ystartpoint=$min;
    $ystartpoint=floor($ystartpoint / 10) * 10;
    if($min-$ystartpoint<=5)
    {
        $ystartpoint=$ystartpoint-10;
        if($ystartpoint<0)
        {
            $ystartpoint=0;
        }
    } //exit;
  $config_options = array(
    'type'=>'line',
    'data'=>array(
      'labels'=>$labels,
      'datasets'=>array(
        array(
          'label'=>'Weight Goal',
          'data'=>$data2,
          'borderDash'=> [10,10],
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.3)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>0,
          "borderWidth"=>4
        ),
        array(
          'label'=>'Weight',
          'data'=>$data1,
          'borderColor'=> "rgb(253,115,96)",
          'backgroundColor'=>"rgba(255,206,200,0.8)",
          'pointBorderColor' => "rgb(253,115,96)",
          "pointBackgroundColor" => "rgb(255,205,199)",
          "pointBorderWidth" => 1,
          "pointRadius"=>5,
          "borderWidth"=>4							)
        )
      ),
      'options'=>array(
        'responsive'=> 'true',
        "legend"=>array(
          "display"=> false
        ),
          'hover'=>array(
              'mode'=>'label'
          ),
          'tooltips'=>array(
              'enabled'=>true,
              'mode'=>'single',
              'tooltipTemplate'=>"function (label) {
            return customTooltip(label);
            }"
          ),
        'scales'=>array(
            'xAxes'=>array(array(
                "type"=>'time',
                "time"=>array(
                    "displayFormats"=>array(
                        'day'=>'MMM DD'
                    ),
                    "unit"=>'day',
                    'unitStepSize'=> 1,
                    "min"=>$start_date,
                    "max"=>$end_date
                ),
                'display'=>true,
                'scaleLabel'=>array(
                    'display'=>false,
                    'labelString'=>''
                )
            )
        ),
        'yAxes'=>array(array(
          'display'=>true,
          'scaleLabel'=>array(
            'display'=>false,
            'labelString'=>'Weight in '.$weight_unit
          ),
          'ticks'=>array(
            'suggestedMin'=> 1,
              'min'=>$ystartpoint
          )
        )
      ),
    ),
    'title'=> array(
      'display'=> false,
      'text'=> ''
    )
  )
);

echo json_encode($config_options);
exit;
}
}
