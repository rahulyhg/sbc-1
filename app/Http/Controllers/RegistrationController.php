<?php

namespace App\Http\Controllers;

use \Session;
use Illuminate\Http\Request;
use App\Grocery\GroceryEmailClass;
use App\Http\Requests;
use Auth;
use App\Subscription;
use App\Question;
use Socialize;
use App\SocialAccount;
use App\Program;
use App\User;
use Mail;
use DB;
use DateTime;
use Redirect;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Facades\Input as Input;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Log;

class RegistrationController extends Controller
{
    
    /**
     * Show payment form.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {        
        $user = Auth::user();        
        if (Auth::check() && Auth::user()->active_subscription()!=0) 
        {
            return Redirect::to('registration/measurements');
        }
        // Log::info( Session::get('AUTHORIZE_TRIAL_MONTHS') );
        if(!$user->subscriptions || Session::get('AUTHORIZE_TRIAL_MONTHS')) {        
            return view('registration.payment', compact('user'));
        }
        return Redirect::to('/account/billing');

    }


    /**
     * Process payment.
     *
     * @param  Request $request
     * @return Response
     */
    public function processPayment(Request $request)
    {
        
        // Validate and process payment...
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'city' => 'required|max:255',
            'state' => 'required',
            'zip' => 'required|max:10',
            'country' => 'required',
            'phone' => 'required|max:42',
            'credit_card_number' => 'required',
            'credit_card_code' => 'required',
            'credit_card_expiration_month' => 'required',
            'credit_card_expiration_year' => 'required',
            'agree' => 'required',
        ]);
        $purchase_date = date('Y-m-d');
        $next_renewal_date = date('Y-m-d', strtotime('+1 month', strtotime($purchase_date)));
        $price = null;
        $emailThrow = true;        
        // The form data is valid, process payment...

        $user = Auth::user();

        $ref_id = 'ref' . time();

        $get_trial_months = Session::get("AUTHORIZE_TRIAL_MONTHS", "0");
        
        $description = "Summer Body Club Monthly Subscription";
        $suspendedSubscription  = $user->suspendedSubscription;
        $terminatedSubscription = $user->terminatedSubscription;
        if ( ($suspendedSubscription) || ($terminatedSubscription)) {
            $get_trial_months = "0";
        }
        if($get_trial_months=="0")
        {
            if($suspendedSubscription) {
                $renewal_date = new Carbon($suspendedSubscription->renewal_date);           
                $purchase_date = $renewal_date->format('Y-m-d');
                $next_renewal_date = $renewal_date->addMonth()->format('Y-m-d');
                $price = $suspendedSubscription->price;
                $emailThrow = false;
                // cancel subscription on authorize.net and delete cancel subscription
                if(!$this->cancelSubscription($suspendedSubscription)) {
            
                    return Redirect::back()->withInput(Input::all());
                }

            }
            if($terminatedSubscription) {      
                $current_date = Carbon::now();                    
                $purchase_date = $current_date->format('Y-m-d');
                $next_renewal_date = $current_date->addMonth()->format('Y-m-d');
                $emailThrow = true;
                // cancel subscription on authorize.net and delete cancel subscription
                if(!$this->cancelSubscription($terminatedSubscription)) {
            
                    return Redirect::back()->withInput(Input::all());
                }
            }

        }

            $transaction_response = $this->createTransactions($request["credit_card_number"], $request["credit_card_expiration_year"], $request["credit_card_expiration_month"], $request["credit_card_code"], $request["first_name"], $request["last_name"], $request["address1"] . " " . $request["address2"], $request["city"], $request["state"], $request["zip"], $request["country"], $request["phone"], $user->id, $user->email, $ref_id, $get_trial_months, $description, $price);
        if ( ($transaction_response != null) && ($transaction_response->getMessages()->getResultCode() == "Ok")) {

        $authorize_response = $this->processAuthNetSubscription($request["credit_card_number"], $request["credit_card_expiration_year"], $request["credit_card_expiration_month"], $request["credit_card_code"], $request["first_name"], $request["last_name"], $request["address1"] . " " . $request["address2"], $request["city"], $request["state"], $request["zip"], $request["country"], $request["phone"], $user->id, $user->email, $ref_id, $get_trial_months);


        if (($authorize_response != null) && ($authorize_response->getMessages()->getResultCode() == "Ok")) {
            $auth_customer_profile_id = $authorize_response->getProfile()->getCustomerProfileId();
            $auth_customer_get_payment_profile_id = $authorize_response->getProfile()->getCustomerPaymentProfileId();
            $credit_card_type = detectCardType($request["credit_card_number"]);            
            if ($get_trial_months != "0") {
                $next_renewal_date = date('Y-m-d', strtotime('+' . $get_trial_months . ' month', strtotime($purchase_date)));
            }

            $last_four_digit = substr($request['credit_card_number'], -4);
                    
			$price = Config::get('global.price');

            $subscription = new Subscription(['active' => '1', 'authorizenet_ref_id' => $ref_id, 'authorizenet_subscription_id' => $authorize_response->getSubscriptionId(), 'authorizenet_subscription_status' => 'created', 'card_last_four' => $last_four_digit, 'card_exp_date' => $request["credit_card_expiration_year"] . '-' . $request["credit_card_expiration_month"], 'purchase_date' => $purchase_date, 'updated_at' => date('Y-m-d H:i:s'), 'customer_profile_id' => $auth_customer_profile_id, 'customer_payment_profile_id' => $auth_customer_get_payment_profile_id, 'credit_card_type' => $credit_card_type, 'renewal_date' => $next_renewal_date, 'price' => $price, 'trial_months' => $get_trial_months, 'is_valid' => 1]);

            Auth::user()->subscriptions()->save($subscription);

            // Update user info
            Auth::user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'zip' => $request->zip,
                'optin' => $request->optin,
                'state_id' => $request->state,
                'country_id' => $request->country
            ]);

            //send receipt email


            if (!empty($user->email) && ($emailThrow)) //condition when facebook donot provide email id
            {

                $email_data = ["authorize_ref_id" => $ref_id, "purchase_date" => $purchase_date, "next_renewal_date" => $next_renewal_date, "credit_card_type" => $credit_card_type, "card_last_four_digit" => $last_four_digit, "address_1" => $request["address1"], "address_2" => $request["address2"], "city" => $request["city"], "state" => $request["state"],  "zip" => $request["zip"], "receipt_email" => $user->email, "first_name" => $user->first_name, "last_name" => $user->last_name, "is_trial" => (($get_trial_months == "0") ? false : true), "free_trial_months" => $get_trial_months];
				
				if($get_trial_months=="0") {
					$email_template = 'emails.receipt';
				} else {
					$email_template = 'emails.trialconfirmation';
				}
				
                Mail::send($email_template, $email_data, function ($message) use ($email_data) {
                    $message->from('noreply@summerbodyclub.com', 'Summer Body Club');
                    $message->to($email_data["receipt_email"], $email_data['first_name'])->subject("Payment Confirmation");
                });
            }


            Session::flash('message', "Please check your email for your payment confirmation.");
            
            //check if user entry exists in question_user table, if not redirect to quiz section.
			$is_quiz = DB::table('question_user')->where('user_id', Auth::user()->id)->count();
			if ($is_quiz <= 0) {
				return Redirect::to('/registration/question/1');
			} else {
				//else redirect to measurements page         
				return Redirect::to('registration/measurements');
			}
		
            
        } else {
            Session::flash('message', $authorize_response->getMessages()->getMessage()[0]->getText());
            return Redirect::back()->withInput(Input::all());
        }

        } else {
            Session::flash('message', "Invalid Credit Card Information, Please review and try again."); //Session::flash('message', $authorize_response->getMessages()->getMessage()[0]->getText()); 
            return Redirect::back()->withInput(Input::all());
        }
    }


    

    /**
     * Process trial.
     *
     * @param  Request $request
     * @return Response
     */
    public function processTrial(Request $request)
    {
        
        //dd('this is the trial');
        
        $get_trial_months = Session::get("AUTHORIZE_TRIAL_MONTHS", "0");
        
        // Validate and process trial...			
		$this->validate($request, [
			'first_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'address1' => 'required|max:255',
			'address2' => 'max:255',
			'city' => 'required|max:255',
			'state' => 'required',
			'zip' => 'required|max:10',
			'country' => 'required',
			'phone' => 'required|max:42',
			'agree' => 'required',
		]);	

        // The form data is valid, process payment...

        $user = Auth::user();

        $ref_id = 'ref' . time();

		$purchase_date = date('Y-m-d');
		if ($get_trial_months == "0") {
			$next_renewal_date = date('Y-m-d', strtotime('+1 month', strtotime($purchase_date)));
		} else {
			$next_renewal_date = date('Y-m-d', strtotime('+' . $get_trial_months . ' month', strtotime($purchase_date)));
		}
		                    
		$price = Config::get('global.price');

		$subscription = new Subscription(['active' => '1', 'ref_id' => $ref_id, 'purchase_date' => $purchase_date, 'updated_at' => date('Y-m-d H:i:s'), 'renewal_date' => $next_renewal_date, 'price' => $price, 'trial_months' => $get_trial_months]);

		Auth::user()->subscriptions()->save($subscription);

		// Update user info
		Auth::user()->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'phone' => $request->phone,
			'address1' => $request->address1,
			'address2' => $request->address2,
			'city' => $request->city,
			'zip' => $request->zip,
			'optin' => $request->optin,
			'state_id' => $request->state,
			'country_id' => $request->country
		]);

		//send receipt email


		if (!empty($user->email)) //condition when facebook donot provide email id
		{

			$email_data = ["ref_id" => $ref_id, "trial_start_date" => $purchase_date, "next_renewal_date" => $next_renewal_date, "address_1" => $request["address1"], "address_2" => $request["address2"], "city" => $request["city"], "state" => $request["state"],  "zip" => $request["zip"], "receipt_email" => $user->email, "first_name" => $user->first_name, "is_trial" => (($get_trial_months == "0") ? false : true), "free_trial_months" => $get_trial_months];

			Mail::send("emails.trialconfirmation", $email_data, function ($message) use ($email_data) {
				$message->from('noreply@summerbodyclub.com', 'Summer Body Club');
				$message->to($email_data["receipt_email"], $email_data['first_name'])->subject("Trial Confirmation");
			});
		}


		Session::flash('message', "Trial Activated Successfully, Please check your email for confirmation.");
		return Redirect::to('registration/measurements');
 
    }
    
    
    
    
    
    /**
     * Show intro question.
     *
     * @return \Illuminate\Http\Response
     */
    public function intro()
    {
        return view('/registration/intro');
    }
    
    
    
    
    
    /**
     * Show questionnaire.
     *
     * @param  Request $request
     * @return Response
     */
    public function collectAnswers(Request $request, $id = NULL)
    {
        $method = $request->method();
        if ($request->isMethod('post')) {
            $question_answer_session = Session::get('Question_Answers');
            if (empty($question_answer_session)) {
                $question_answer_session = array();
            }

            $question_id = $request->question_id;
            $question_answer_session[$question_id] = array("a" => (($request->yes) ? 1 : 0), "g" => $request->question_group);
            Session::set('Question_Answers', $question_answer_session);
            Session::save();
            $id = $id + 1;
        }

        if ($id != NULL) {
            $question = DB::table('questions')->where('position', $id)->first();
            if ($question) {
                return view('registration.question', compact('id', 'question'));
            } else {
                if (Auth::check()) {
                    $this->saveCollectAnswers();
                    return Redirect::to('/registration/measurements');
                }
                return Redirect::to('/decision');
            }
        } else {
            return Redirect::to('/registration/question/1');
        }
    }


    /**
     * Insert Or Update answers if user first sign up and than answers quiz
     *
     * @param  Request $request
     * @return Response
     */
    private function saveCollectAnswers()
    {
        $question_answer_session = Session::get('Question_Answers');

        if (!empty($question_answer_session) and count($question_answer_session) > 0) {

            $new_user_id = Auth::user()->id;
            DB::table('question_user')->where('user_id', $new_user_id)->delete(); //delete past entries

            $q_answer_array = array();
            foreach ($question_answer_session as $key => $value) {
                $q_answer_array[] = array('user_id' => $new_user_id, 'question_id' => $key, 'answer' => $value["a"], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now());
            }
            DB::table('question_user')->insert($q_answer_array);
        }

    }


    /**
     * Save Measurements
     *
     * @param  Request $request
     * @return Response
     */
    public function postMeasurement(Request $request)
    {
        $height_val = $request->height_cm;
        $weight_val = $request->weight;
        $weight_goal_val = $request->weight_goal;

        if ($request->weight_unit == "lb") {
            $weight_val = convert_to_kg($request->weight);
            $weight_goal_val = convert_to_kg($request->weight_goal);
        }

        if ($request->height_unit == "in") {
            $height_val = convert_to_cm($request->height_feet, $request->height_inch);
        }

        Auth::user()->update([
            'weight' => $weight_val,
            'weight_goal' => $weight_goal_val,
            'height' => $height_val,
            'height_unit' => $request->height_unit,
            'weight_unit' => $request->weight_unit
        ]);
        return Redirect::to('/program');
    }


    /*Function to calculate program name and program group based on answers, either from session or from database.*/
    private function getProgramName($answers)
    {

    }

    /**
     * Assign and show selected program.
     *
     * @return \Illuminate\Http\Response
     */
    public function program()
    {
        $user = Auth::user();

        // Process answers and assign a program to the user
        $answers = Auth::user()->questions()->wherePivot('answer', '=', 1)->get();

        $answers_a = $answers->where('group', 'a');
        $answers_b = $answers->where('group', 'b');

        if ($answers_a >= $answers_b) {
            $program_id = 1;
        } else {
            $program_id = 2;
        }

        $program = Program::findOrFail($program_id);

        //save program data.
        $user_program = DB::table('program_user')->where('user_id', $user->id)->first();
        if (empty($user_program)) {
            DB::table('program_user')->insert(array("program_id" => $program_id, "user_id" => $user->id, "program_start" => Carbon::now()->toDateString(), "active" => "1", "created_at" => Carbon::now(), "updated_at" => Carbon::now()));
        }
        
        //send welcome email
		if (!empty($user->email)) //condition when facebook doesn't provide email id
		{
            $program= Auth::user()->active_program->first();
			$email_data = ["user_email" => $user->email, "first_name" => $user->first_name,  "program_id" => $program->id];

			if($program->id == 1) {
           		$grocery_data = GroceryEmailClass::GroceryList($program, $user);
           		$full_data=array_merge($grocery_data,$email_data);
           	} else {
				$full_data=$email_data;
			}

			Mail::send("emails.welcome", $full_data, function ($message) use ($full_data) {
				$message->from('noreply@summerbodyclub.com', 'Summer Body Club');
				$message->to($full_data["user_email"], $full_data['first_name'])->subject("Welcome to Summer Body Club");
			});
		}

        return view('program', compact('program'));
    }

    // DECISION PAGE START
    public function showDecision()
    {
        //print_r(Session::get('Question_Answers'));die;
        $program = $this->fetchProgram();

        return view('decision', compact('program'));
    }

    // DECISION PAGE END

    public function fetchProgram()
    {
        $program = "b";
        $program_id = 2;

        $question_answer_session = Session::get('Question_Answers');

        $programs_array = ["a" => 0, "b" => 0];

        if (!empty($question_answer_session)) {
            $count = 0;
            foreach ($question_answer_session as $key => $value) {
                if ($value["a"] == 1) {
                    if ($value["g"] == "a") {
                        $programs_array["a"]++;
                    } else {
                        $programs_array["b"]++;
                    }
                }
            }

            if ($programs_array["a"] >= $programs_array["b"]) {
                $program = 'a';
                $program_id = 1;
            }

            return DB::table('programs')->where('id', '=', $program_id)->first();
        }

        return $program;
    }
    // FUNCTION TO CALCULATE THE PROGRAM END
    
    // FUNCTION SAVE INTRO START
    public function saveIntroEmail($email)
    {
        if (isset($email) && !empty($email)) {
            //1. check whether the user is already signed up or not
            $user = DB::table('users')->where('email', $email)->first();
            if (empty($user)) {
				// save email to db
                $lead = DB::table('leads')->where('email', $email)->first();
                if (empty($lead)) {
                	DB::table('leads')->insert(array("email" => $email, "created_at" => Carbon::now(), "updated_at" => Carbon::now()));
                }
            } 
            echo 'Certain aspects of your personality may hold the key to losing weight and keeping it off! <br><br> Continue taking our quiz to find out which Summer Body personality type you are, and get started on your journey toward your own Summer Body.';
        } else
            echo 'Please provide your email address.';
        exit;
    }
    // FUNCTION SAVE INTRO EMAIL END

    // FUNCTION SEND EMAIL START
    public function sendResultsEmail($email)
    {
        if (isset($email) && !empty($email)) {
            //1. check whether if user is already signed up or not
            $user = DB::table('users')->where('email', $email)->first();
            if (empty($user)) {
                //create Email Required Array
                $subject = 'Your Summer Body Club Daily Program';
                $view_name = 'emails.decision';
                $to = strtolower($email);

                // extract name
                $data = [];
                $nameArr = explode('@', $to);
                $data['FirstName'] = ucwords($nameArr[0]);
                //$data['ProgramName'] = $this->fetchProgram();   
                $data['ProgramName'] = $this->fetchProgram()->name;
                $data['ProgramDescription'] = $this->fetchProgram()->description;

                $data['link'] = 'signup_step_2/' . base64_encode($to) . '/' . base64_encode(json_encode(Session::get('Question_Answers')));

                $data["to"] = $to;
                $data["subject"] = $subject;

                Mail::send($view_name, $data, function ($message) use ($data) {
                    $message->from('noreply@summerbodyclub.com', 'Summer Body Club');
                    $message->to($data["to"], $data['FirstName'])->subject($data["subject"]);
                });
                echo '1';
            } else
                echo 'Email already registered.';
        } else
            echo 'Please provide your email address.';
        exit;
    }
    // FUNCTION SEND EMAIL END


    // SIGN UP STEP 2, AFTER EMAIL
    public function signUpStep2($email, $answers)
    {
        $email = base64_decode($email);
        $question_answer_session = json_decode(base64_decode($answers), true);

        // search for email, if exists
        $user = DB::table('users')->where('email', '=', $email)->first();
        if (empty($user)) {
            Session::set('Question_Answers', $question_answer_session);
            Session::save();
            return Redirect::to('/register');
        } else {
            echo 'Email: ' . $email . ' is already registered! Please Login';
        }
    }
    // SIGN UP STEP 2, AFTER EMAIL 

    /*Facebook login starts*/
    public function facebookRedirect(Request $request)
    {
        $request_type = $request["type"];
        Session::set("fblogin_request_type", $request_type);
        Session::save();
        return Socialize::with('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday', 'name'
        ])->scopes([
            'email', 'user_birthday', 'public_profile'
        ])->redirect();
    }

    public function facebookCallback(Request $request)    
    {
        $fblogin_request_type = Session::get("fblogin_request_type");           
        if(Input::get('error')=='access_denied'){
             //if ($fblogin_request_type == "signup") {
                Session::flash('message', "Please authorize Facebook to use your account information.");
                return Redirect::to('/register');
            //}
            /*else
            {
                return Redirect::to('/login');   
            }*/
        }

        if(Input::has('code'))
        {

        // when facebook call us a with token           
        $user = $this->createOrGetUser(Socialize::with('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday', 'name'
        ])->scopes([
            'email', 'user_birthday', 'public_profile'
        ])->stateless()->user());

        if (isset($user["has_errors"])) {
            Session::flash('message', "We were unable to process your registration using your Facebook account. Please use registration form to register.");
            return Redirect::to($user["redirect_path"])->withInput($user['user']->user);
        }

        auth()->login($user);

        $user_id = Auth::user()->id;
        

        if ($fblogin_request_type == "signup") {
            $this->saveCollectAnswers();
        }

        $is_quiz = DB::table('question_user')->where('user_id', $user_id)->count();
        if ($is_quiz <= 0) {
            //return Redirect::to('/registration/question/1');
            return Redirect::to('/registration/payment');
        } else {
            if (Auth::user()->active_subscription() == 0) {
                return Redirect::to('/registration/payment');
            } else {
                return Redirect::to('/home');
            }
        }

        }
        else
        {
             //if ($fblogin_request_type == "signup") {
                Session::flash('message', "Invalid operation, Please register manually.");
                return Redirect::to('/register');
            /*}
            else
            {
                return Redirect::to('/login');   
            } */  
        }

    }

    public function facebookAgeValidationFails()
    {
        echo "Age validation failed";
    }


    public function createOrGetUser($providerUser)
    {
        $fblogin_request_type = Session::get("fblogin_request_type");  

        $account = SocialAccount::where('provider', 'facebook')
            ->where('provider_user_id', $providerUser->id)
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->id,
                'provider' => 'facebook'
            ]);

            //  unset($providerUser->user["birthday"]);
            //check if facebook provided email and birthday, if not, redirect to registration form
            if (!isset($providerUser->email) || $providerUser->email == "" || !isset($providerUser->user["birthday"])) {

               //  if ($fblogin_request_type == "signup") 
                // {
                    return array("has_errors" => true, "redirect_path" => "/register", "error_type" => "Empty Email id Or birthdate, Please register manually.", "user" => $providerUser);
                 /*}
                 else
                 {
                    return array("has_errors" => true, "redirect_path" => "/login", "error_type" => "Empty Email id Or birthdate", "user" => $providerUser);
                 } */               
            }


            $user = User::where('email', $providerUser->email)->first();
            if (!$user) {

                $birthday = "0000-00-00";
                if (isset($providerUser->user["birthday"])) {
                    $birthday = date('Y-m-d', strtotime(str_replace('-', '/', $providerUser->user["birthday"])));
                    if (time() < strtotime('+18 years', strtotime($birthday))) {
                        //user is under age, redirect it to registration/age route and donot register in system
                        return array("has_errors" => true, "redirect_path" => "/registration/age", "error_type" => "User is below 18 years old.", "user" => $providerUser);
                    }
                }

                $user = User::create([
                    'email' => $providerUser->email,
                    'first_name' => $providerUser->user["first_name"],
                    'last_name' => $providerUser->user["last_name"],
                    'dob' => $birthday,
                    'gender' => substr($providerUser->user["gender"], 0, 1),
                    'name' => $providerUser->user["name"]
                ]);

            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }

    }

    /*facebook login ends*/

    public function testEmail()
    {
        Mail::send('emails.welcome', ['FirstName' => 'John', 'ProgramName' => 'Beginner'], function ($message) {
            $message->from('us@technosip.com', 'Tech');
            $message->to('mahavir@technosip.com', 'Mahavir')->subject('Welcome!');
        });
    }

    //authorize.net process subscription code
    private function processAuthNetSubscription($credit_card_number, $expiration_year, $expiration_month, $credit_card_code, $first_name, $last_name, $address, $city, $state, $zip, $country, $phonenumber, $user_id, $email_id, $ref_id, $trial_months)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
        $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));
        $refId = $ref_id;


        $subscription = new AnetAPI\ARBSubscriptionType();
        $subscription->setName("Summer Body Club Monthly Subscription");

        $interval = new AnetAPI\PaymentScheduleType\IntervalAType();
        $interval->setLength("1");
        $interval->setUnit("months");
        
        $price = Config::get('global.price');

        $date = new DateTime();
        if($trial_months=="0")
        {
            $date->modify('+1 month');
        }

        $paymentSchedule = new AnetAPI\PaymentScheduleType();
        $paymentSchedule->setInterval($interval);
        $paymentSchedule->setStartDate($date);
        $paymentSchedule->setTotalOccurrences("9999");
        $paymentSchedule->setTrialOccurrences($trial_months);

        $subscription->setPaymentSchedule($paymentSchedule);
        $subscription->setAmount($price);
        $subscription->setTrialAmount("0.00");

        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($credit_card_number);
        $creditCard->setExpirationDate($expiration_year . "-" . $expiration_month);
        $creditCard->setCardCode($credit_card_code);

        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $subscription->setPayment($payment);

        $billTo = new AnetAPI\NameAndAddressType();
        $billTo->setFirstName($first_name);
        $billTo->setLastName($last_name);
        $billTo->setAddress(substr($address, 0, 59)); //it takes upto 60 characters max
        $billTo->setCity($city);
        $billTo->setState($state);
        $billTo->setZip($zip);
        $billTo->setCountry($country);

        $subscription->setBillTo($billTo);

        $customerProfile = new AnetAPI\CustomerType();
        $customerProfile->setId($user_id);
        $customerProfile->setEmail($email_id);
        $customerProfile->setPhoneNumber($phonenumber);

        $subscription->setCustomer($customerProfile);

        $request = new AnetAPI\ARBCreateSubscriptionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($refId);
        $request->setSubscription($subscription);
        $controller = new AnetController\ARBCreateSubscriptionController($request);
        if(env('AUTHORIZENET_TRANSACTION_MODE')=="PRODUCTION")
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }
        else
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);   
        }

        return $response;

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            //echo "SUCCESS: Subscription ID : " . $response->getSubscriptionId() . "\n";
            return $resposne;
        } else {
            echo "ERROR :  Invalid response\n";
            echo "Response : " . $response->getMessages()->getMessage()[0]->getCode() . "  " . $response->getMessages()->getMessage()[0]->getText() . "\n";
        }
    }


    //function to turn on or off user email notification prefernces.
    public function updateEmailPreference(Request $request)
    {
        $status = $request["status"];
        Auth::user()->update([
            'notifications' => $status,
        ]);
        echo json_encode(["status" => "success"]);
    }

    /*callback function after normal signup and it will decide redirect*/
    public function registrationComplete(Request $request)
    {        
        $user_id = Auth::user()->id;

        //save the answers if those are in session
        $this->saveCollectAnswers();

		//check if user has an active subscription, if not redirect to payment form
		 if (Auth::user()->active_subscription() == 0) {
			return Redirect::to('/registration/payment');
		}
		
        //check if user entry exists in question_user table, if not redirect to quiz section.
        $is_quiz = DB::table('question_user')->where('user_id', $user_id)->count();
        if ($is_quiz <= 0) {
            return Redirect::to('/registration/question/1');
        } else {
            //else redirect to payment page or home page based on subscription status          
            if (Auth::user()->active_subscription() == 0) {
                return Redirect::to('/registration/payment');
            } else {
                return Redirect::to('/home');
            }
        }
    }


    public function getTrialView()
    {
        $number_of_trial_months = Session::get("AUTHORIZE_TRIAL_MONTHS");
        if ($number_of_trial_months != "") {
            return view('trial', compact('number_of_trial_months'));
        } else {
            echo "Invalid Location";
        }
    }

    public function setOneMonthTrial(Request $request)
    {
        Session::set("AUTHORIZE_TRIAL_MONTHS", "1");
        Session::save();
        return Redirect::to('trial/' . time());
    }

    public function setUnlimitedMonthTrial(Request $request)
    {
        Session::set("AUTHORIZE_TRIAL_MONTHS", "99");
        Session::save();
        return Redirect::to('trial/' . time());
    }

//For generating base64 months, just for testing.
    public function getBaseEncode($months = null)
    {
        echo base64_encode(base64_encode($months));
        die;
    }

    public function createTransactions($credit_card_number, $expiration_year, $expiration_month, $credit_card_code, $first_name, $last_name, $address, $city, $state, $zip, $country, $phonenumber, $user_id, $email_id, $ref_id, $trial_months, $description, $price = null) {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
        $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));
        $user = Auth::user();
        // if(($user->suspendedSubscription) && ($)) {

        // }
        if(!$price) {
            $price = Config::get('global.price');            
        }

        $transaction= new AnetAPI\TransactionRequestType();
        $transaction->setTransactionType('authCaptureTransaction');
        
        $order = new AnetAPI\OrderType();
		$order->setDescription($description);
		$transaction->setOrder($order);
		
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($credit_card_number);
        $creditCard->setExpirationDate($expiration_year . "-" . $expiration_month);
        $creditCard->setCardCode($credit_card_code);


        $payment = new AnetAPI\PaymentType();
        $payment->setCreditCard($creditCard);

        $transaction->setPayment($payment);
        $transaction->setAmount($price);

        $billTo = new AnetAPI\CustomerAddressType();
        $billTo->setFirstName($first_name);
        $billTo->setLastName($last_name);
        $billTo->setAddress(substr($address, 0, 59)); //it takes upto 60 characters max
        $billTo->setCity($city);
        $billTo->setState($state);
        $billTo->setZip($zip);
        $billTo->setCountry($country);

        $transaction->setBillTo($billTo);

        $customerProfile = new AnetAPI\CustomerDataType();
        $customerProfile->setId($user_id);
        $customerProfile->setEmail($email_id);
        $transaction->setCustomer($customerProfile);

        $request= new AnetAPI\CreateTransactionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($ref_id);
        $request->setTransactionRequest($transaction);
        $controller = new AnetController\CreateTransactionController($request);
        if(env('AUTHORIZENET_TRANSACTION_MODE')=="PRODUCTION")
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }
        else
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);   
        }

        return $response;

    }

   public function cancelSubscription($subscription)
    {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
        $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));       
        $request = new AnetApi\ARBCancelSubscriptionRequest();
        $request->setMerchantAuthentication($merchantAuthentication);
        $request->setSubscriptionId($subscription->authorizenet_subscription_id);
        $controller = new AnetController\ARBCancelSubscriptionController($request);
         if(env('AUTHORIZENET_TRANSACTION_MODE')=="PRODUCTION")
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
        }
        else
        {
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);   
        }
        if ( ($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $subscription->update(['active' => 0]);

            return true;
        }
        Session::flash('message', $Response->getMessages()->getMessage()[0]->getText());

        return false;
    }        
}

