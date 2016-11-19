<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Recipe;
use App\Workout;
use App\Mindset;
use Redirect;
use Carbon\Carbon;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($current_day = NULL) // day is passed only for testing
    { 

        # $subscriptions = Auth::user()->subscriptions;
        if(Auth::user()->active_subscription() == 0) {
        	return redirect('registration/payment');
        }
      	
        
        # user's program
        $program = Auth::user()->active_program->first();
        
        #if user doesn't have a program assigned, redirect to registration 'program' step
        if(!isset($program)) {
			return Redirect::to('/program');
		}
        
        # user's day on the program
        $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
        if(!isset($current_day)){
			$current_day = $start_day->diffInDays(Carbon::now());
			if($current_day == 0){$current_day = 1;}
		}
		        
        # program's phase
        if($current_day <= 9){
        	$phase = '9-Day Jumpstart';
        	$phase_number = 1;
        	$phase_day = $current_day;
        	$phase_message = 'The goal of the Summer Body Club Jumpstart is to get you headed in the right direction toward maximizing weight loss.';
        }
        elseif($current_day == 10){
        	$phase = '5-Day Acceleration';
        	$phase_number = 2;
        	$phase_day = $current_day - 9;
        	$phase_message = "Congratulations! You completed the Summer Body Club 9-Day Jumpstart. Today you'll begin our 5-Day Acceleration program. Let's keep that momentum going!";
        }
        elseif($current_day <= 14){
        	$phase = '5-Day Acceleration';
        	$phase_number = 2;
        	$phase_day = $current_day - 9;
        	$phase_message = '';
        }
        elseif($current_day == 15){
        	$phase = $program->name . ' Program';
        	$phase_number = 3;
        	$phase_day = $current_day;
        	$phase_message = "Congratulations! You've now completed both the Summer Body Club Jumpstart and the 5-Day Acceleration. And that means you are now two weeks into your Summer Body journey. Now it's time to begin following the main " . $program->name .  " program.";
        }
        else{
        	$phase = $program->name . ' Program';
        	$phase_number = 3;
        	$phase_day = $current_day;
        	$phase_message = '';
        }
        
        # daily program
        $recipes = $program->recipes()->whereIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();
        $recipes_other = $program->recipes()->whereNotIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();

        /*
        $generic_breakfast = new Recipe;
        $generic_breakfast->meal_id = 1;
        $generic_breakfast->name = 'Hot Water with Lemon';
        $generic_breakfast->instructions = '1 cup of hot water with a slice of lemon.';
        $recipes->prepend($generic_breakfast);
        */
        
        $recipes = $recipes->groupBy('meal_id');
        
        $workout = Workout::where('day', '=', $current_day)->first();       
        # if this is for program 1 / Navigator and no video assigned for this day, display one of the bonus videos
        if($program->id == 1 AND $workout == NULL) {
        	$workout = Workout::where('category_id', '=', 7)->get();
        	$workout = $workout->random();
        	$workout->instructions = "On the off days, you have the option to complete one of our pre-planned Bonus workouts using a resistance band. These workouts aren’t super high intensity, but they’ll definitely have you feeling that Summer Body burn and help keep you on track. Plus, they’re totally optional, so if you want to do them on some off days and not on others, that’s just fine!";
        	$off_day = 1;
        }
        # if this is for program 2 / Adventurer, display a random Warm Up video
        elseif($program->id == 2) {
        	$workout = Workout::where('category_id', '=', 4)->get();
        	$workout = $workout->random();
        }
        
        $mindset = Mindset::where('day', '=', $current_day)->first(); 
        
        # user's stats
        $weight_start = Auth::user()->weight;
        $weight_last = Auth::user()->measurements->sortBy('date')->last();
        if (!empty($weight_last)) {$weight_current = $weight_last->weight;} else {$weight_current = $weight_start;}
        $weight_goal = Auth::user()->weight_goal;
        $weight_unit = Auth::user()->weight_unit;
        
        if($weight_unit == 'lb'){
        	$weight_start = convert_to_lb($weight_start);
        	$weight_current = convert_to_lb($weight_current);
        	$weight_goal = convert_to_lb($weight_goal);
        }
        else {
        	$weight_start = round_kg($weight_start);
        	$weight_current = round_kg($weight_current);
        	$weight_goal = round_kg($weight_goal);
        }
        
        session()->put('program_id', $program->id);
        
        return view('home', compact('program', 'phase', 'phase_number', 'phase_day', 'phase_message', 'current_day', 'off_day', 'recipes_other', 'recipes', 'workout', 'mindset', 
        'weight_start', 'weight_current', 'weight_goal', 'weight_unit'));
    }
    
    
    
    /**
     * Show the program overview.
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    { 
        
        # user's program
        $program = Auth::user()->active_program->first();
        
        # user's day on the program
        $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
        $current_day = $start_day->diffInDays(Carbon::now());
        if($current_day == 0){$current_day = 1;}
        
        # program's phase
        if($current_day <= 9){
        	$phase = '9-Day Jumpstart';
        	$phase_number = 1;
        	$phase_day = $current_day;
        	$phase_message = 'The Summer Body Jumpstart’s goal is to maximize weight loss in the first 9 days.';
        }
        elseif($current_day <= 14){
        	$phase = '5-Day Acceleration';
        	$phase_number = 2;
        	$phase_day = $current_day - 9;
        	$phase_message = '';
        }
        else{
        	$phase = $program->name . ' Program';
        	$phase_number = 3;
        	$phase_day = $current_day;
        	$phase_message = '';
        }
        
        return view('program.overview', compact('program', 'phase', 'phase_number'));
    }
}
