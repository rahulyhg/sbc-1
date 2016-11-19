<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Grocery\GroceryEmailClass;
use App\Http\Requests;
use Auth;
use App\User;
use App\Workout;
use App\Mindset;
use Mail;
use Carbon\Carbon;

class EmailController extends Controller
{
     /**
     * Send out daily email.
     */
    public function dailyEmail()
    { 

        $users= User::with('subscription')->where('notifications',1)->get();
        
        foreach($users as $user){
            if (!empty($user->email)) //condition when facebook donot provide email id
            {
        
				//$user = Auth::user();
				$program = $user->active_program->first();
				
				if (!empty($program))
				{
					# user's day on the program
					$start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
					$current_day = $start_day->diffInDays(Carbon::now());
					if($current_day == 0){$current_day = 1;}
					//echo $current_day . ' / ';
		
					# daily program
					//$recipes = $program->recipes()->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();
					$recipes = $program->recipes()->whereIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();
			        $recipes_other = $program->recipes()->whereNotIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();


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
					if(isset($mindset->instructions)) {
						$mindset->instructions = Str::words($mindset->instructions, $words = 30, $end = '...');
					}		
					$data['first_name'] = $user->first_name;  
					$data['program'] = $program;
					$data['recipes'] = $recipes;
					$data['recipes_other'] = $recipes_other;
					$data['workout'] = $workout;
					$data['mindset'] = $mindset;
					$data['current_day'] = $current_day;

					$data['to']=$user->email;
					$data['subject']='Welcome to Day '. $current_day;
		
					Mail::send('emails.daily', $data, function($message) use ($data)
					{                    
						$message->from('noreply@summerbodyclub.com', 'Summer Body Club');
						$message->to($data["to"],$data['first_name'])->subject($data['subject']);
					}); 
				
				}
			}
			
		} 

    }
	
	/*
    public function dailyMail(){

        $users= User::with('subscription')->where('notifications',1)->get();
        
        foreach($users as $user){
            if (!empty($user->email)) //condition when facebook donot provide email id
            {
                $email_data = ["FirstName" => $user->first_name, "receipt_email" => $user->email, 'link' => '/account/billing'];

                Mail::send("emails.dailymail", $email_data, function ($message) use ($email_data) {
                    $message->from('noreply@summerbodyclub.com', 'SummerBodyClub');
                    $message->to($email_data["receipt_email"], $email_data['FirstName'])->subject("Subscription is Suspended ");
                });
            }
        }

    }
    */
    
     /**
     * Send out weekly email.
     */
    public function weeklyEmail()
    { 
		$users= User::with('subscription')->where('notifications',1)->get();
        
        foreach($users as $user){
            if (!empty($user->email)) //condition when facebook doesn't provide email id
            {

				//$user = Auth::user();
				$program = $user->active_program->first();
				
				if (!empty($program) && $program->id == 1) // for now, only send emails to program 1 (Navigator)
				{
					# user's day on the program
					$start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
					$current_day = $start_day->diffInDays(Carbon::now());
					if($current_day == 0){$current_day = 1;}
					echo 'day ' . $current_day . '<br>';
		
					$data['first_name'] = $user->first_name;  
					$data['program'] = $program;
					$data['current_day'] = $current_day;

					$data['to']=$user->email;
					$data['subject']='Your Weekly ' . $program->name . ' Email';
                    
                    $grocery_data = GroceryEmailClass::GroceryList($program, $user);
                    $full_data=array_merge($grocery_data,$data);
                    
                    Mail::send('emails.weekly', $full_data, function($message) use ($full_data)
					{                    
						$message->from('noreply@summerbodyclub.com', 'Summer Body Club');
                        $message->to($full_data["to"],$full_data['first_name'])->subject($full_data['subject']);
					});

					
				}
			}
			
		} 

    }












     /**
     * Send out daily email.
     */
    public function dailyEmailTest()
    { 

        //$users= User::with('subscription')->where('notifications',1)->get();
        
        //foreach($users as $user){

    	$user=USER::with('subscription')->where('notifications',1)->where('id',34)->first();

    	for($m=0;$m<=5;$m++)
    	{

            if (!empty($user->email)) //condition when facebook donot provide email id
            {
        
				//$user = Auth::user();
				$program = $user->active_program->first();
				
				if (!empty($program))
				{
					# user's day on the program
					$start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
					$current_day = $start_day->diffInDays(Carbon::now());
					if($current_day == 0){$current_day = 1;}
					echo $current_day . ' / ';
		
					# daily program
					//$recipes = $program->recipes()->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();
					$recipes = $program->recipes()->whereIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();
			        $recipes_other = $program->recipes()->whereNotIn('meal_id',[1,2,3,4])->wherePivot('day', '=', $current_day)->wherePivot('program_id', '=', $program->id)->orderBy('meal_id')->get();


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
					if(isset($mindset->instructions)) {
						$mindset->instructions = Str::words($mindset->instructions, $words = 30, $end = '...');
					}		
					$data['first_name'] = $user->first_name;  
					$data['program'] = $program;
					$data['recipes'] = $recipes;
					$data['recipes_other'] = $recipes_other;
					$data['workout'] = $workout;
					$data['mindset'] = $mindset;
					$data['current_day'] = $current_day;

					$data['to']=$user->email;
					$data['subject']='NewLogTest Welcome to Day '. $current_day;
		
					Mail::send('emails.daily', $data, function($message) use ($data)
					{                    
						$message->from('noreply@summerbodyclub.com', 'Summer Body Club');
						$message->to($data["to"],$data['first_name'])->subject($data['subject']);
					}); 
				
				}
			}
			
		} 

    }
	


}
