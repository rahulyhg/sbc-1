<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Session;
use App\Subscription;
use App\Program;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Mail;
use Redirect;
use Carbon\Carbon;
use Log;
use Config;
use DateTime;

class AccountController extends Controller
{

    public function getAccount(Request $request)
    {
        $user = Auth::user();
        $subs = Subscription::where('user_id', $user->id)->where('active', 1)->first();
        return view('account.account', array('user' => $user, 'subs' => $subs));
    }

    public function updatePersonalinfo(Request $request)
    {
        $login_user = Auth::user();
        $user = User::find($login_user->id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->country_id=$request->input('country');
        $user->state_id = $request->input('state');
        $user->zip = $request->input('zip');
        $user->phone = $request->input('phone');
        if ($user->save()) {
            $msg = array(
                'type' => 'success',
                'message' => 'Personal Info updated successfully'
                );
        } else {
            $msg = array(
                'type' => 'danger',
                'message' => 'Something went wrong to updated Personal Info'
                );
        }

        echo json_encode($msg);
        exit;
    }


    public function updateGoal(Request $request)
    {
        $login_user = Auth::user();
        $user = User::find($login_user->id);

        if($request->input('goal_unit') == 'lb'){
            $user_weight=convert_to_kg($request->input('weight_goal'));

            $user->weight_goal=$user_weight;
            $user->weight_unit = $request->input('goal_unit');
        }else {
            $user->weight_unit = $request->input('goal_unit');
            $user->weight_goal = $request->input('weight_goal');
        }
        if ($user->save()) {
            $msg = array(
                'type' => 'success',
                'message' => 'Weight Goal updated successfully'
                );
        } else {
            $msg = array(
                'type' => 'danger',
                'message' => 'Something went wrong to updated Weight Goal'
                );
        }

        echo json_encode($msg);
        exit;
    }

    public function updatePreference(Request $request)
    {
        $login_user = Auth::user();
        $user = User::find($login_user->id);
        $user->weight_unit = $request->input('weight_unit');
        $user->height_unit = $request->input('height_unit');
        if ($user->save()) {
            $msg = array(
                'type' => 'success',
                'message' => 'Measurement preferences updated successfully.'
                );
        } else {
            $msg = array(
                'type' => 'danger',
                'message' => 'Something went wrong with updating measurement preferences. Please try again later.'
                );
        }

        echo json_encode($msg);
        exit;
    }


    public function updateNotifications(Request $request)
    {
        $login_user = Auth::user();
        $user = User::find($login_user->id);

        if($request->input('notifications') == 1){
        	$user->notifications = $request->input('notifications');
        } else {
           $user->notifications = null;
       }

       if ($user->save()) {
        $msg = array(
            'type' => 'success',
            'message' => 'Email preferences updated successfully'
            );
    } else {
        $msg = array(
            'type' => 'danger',
            'message' => 'We were unable to update email preferences. Please try again.'
            );
    }

    echo json_encode($msg);
    exit;
}

public function jumpstart()
{
    $user = Auth::user();
    $program_start = Carbon::now()->subDay();
    $user_program =  $user->active_program->first();

    if ($user->active_program()->sync([$user_program->id => [ 'program_start' => $program_start] ], false)) {
        $url = url('/home');
        $msg = array(
            'type' => 'success',
            'message' => 'Your program has been reset to 5-Day Jumpstart phase. <a href="'.$url.'">Refresh your dashboard.</a>'
            );
    } else {
        $msg = array(
            'type' => 'danger',
            'message' => 'Something went wrong with updating your program.'
            );
    }
    echo json_encode($msg);
    exit;
}

public function programOptions()
{
    $user = Auth::user();
    $user_program =  $user->active_program->first()->id;
    $programs = Program::all();

    return view('account.program-options', compact('user_program', 'programs'));
}

	/**
     * Process program update.
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveProgramOptions(Request $request)
    {	
		// Validate and process measurement...

      $this->validate($request, [
       'option' => 'required',
       ]);


      $user = Auth::user();
      $user_program =  $user->active_program->first();
      $user->active_program()->sync([$user_program->id => [ 'program_id' => $request->option] ], false);
		/*
		$user_program = $request->option;
        $programs = Program::all();
		
		$request->session()->put('program_id', $request->option);
		$request->session()->flash('status', 'Program has been changed.');
		return view('account.program-options', compact('user_program', 'programs'));
		*/
		
		session()->put('program_id', $request->option);
		session()->flash('status', 'Your program has been changed.');
		return redirect('home');
	}

    public function programReset()
    {
        # user's program
        $program = Auth::user()->active_program->first();
        
         # user's day on the program
        $start_day = Carbon::createFromFormat('Y-m-d', $program->pivot->program_start);
        if(!isset($current_day)){
           $current_day = $start_day->diffInDays(Carbon::now());
           if($current_day == 0){$current_day = 1;}
       }

       $past_days_10 = collect([
           ['daynumber' => ($current_day - 1), 'day' => 'Day ' . ($current_day - 1) . ' - ' . Carbon::now()->subDays(1)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 2), 'day' => 'Day ' . ($current_day - 2) . ' - ' . Carbon::now()->subDays(2)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 3), 'day' => 'Day ' . ($current_day - 3) . ' - ' . Carbon::now()->subDays(3)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 4), 'day' => 'Day ' . ($current_day - 4) . ' - ' . Carbon::now()->subDays(4)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 5), 'day' => 'Day ' . ($current_day - 5) . ' - ' . Carbon::now()->subDays(5)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 6), 'day' => 'Day ' . ($current_day - 6) . ' - ' . Carbon::now()->subDays(6)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 7), 'day' => 'Day ' . ($current_day - 7) . ' - ' . Carbon::now()->subDays(7)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 8), 'day' => 'Day ' . ($current_day - 8) . ' - ' . Carbon::now()->subDays(8)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 9), 'day' => 'Day ' . ($current_day - 9) . ' - ' . Carbon::now()->subDays(9)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ['daynumber' => ($current_day - 10), 'day' => 'Day ' . ($current_day - 10) . ' - ' . Carbon::now()->subDays(10)->toFormattedDateString(), 'date' => $start_day->addDays(1)->toDateString()],
           ]);

       $past_days = $past_days_10->reject(function ($item) {
           global $start_day;
           return $item['daynumber'] < 1;
       });

       $past_days->all();

       $past_days = [null=>'Return to...' ] + $past_days->lists('day', 'date')->all();


       return view('account.program-reset', compact('current_day', 'past_days'));
   }

	/**
     * Process program reset.
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveProgramReset (Request $request)
    {	
		// Validate and process measurement...

      $this->validate($request, [
       'day' => 'required',
       ]);


      $user = Auth::user();
      $user_program =  $user->active_program->first();
      $user->active_program()->sync([$user_program->id => [ 'program_start' => $request->day] ], false);

      session()->flash('status', 'Your program has been changed.');
      return redirect('home');
  }

	/**
     * Process program reset to jumpstart phase.
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveProgramResetJumpstart ()
    {
      $user = Auth::user();
      $program_start = Carbon::now()->subDay();
      $user_program =  $user->active_program->first();

      $user->active_program()->sync([$user_program->id => [ 'program_start' => $program_start] ], false);

      session()->flash('status', 'Your program has been changed.');
      return redirect('home');
  }

  public function cancelSubscription()
  {
    $login_user = Auth::user();
    $subscription = Subscription::where('user_id', $login_user->id)->where('active', 1)->first();
    if (!empty($subscription)) {
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
        $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));

        $transaction_mode=env("AUTHORIZENET_TRANSACTION_MODE");

        $request = new AnetAPI\ARBCancelSubscriptionRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setRefId($subscription->authorizenet_ref_id);
        $request->setSubscriptionId($subscription->authorizenet_subscription_id);
        $controller = new AnetController\ARBCancelSubscriptionController($request);
        $response = $controller->executeWithApiResponse(constant('\net\authorize\api\constants\ANetEnvironment::'.$transaction_mode));

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $msg = array(
                'type' => 'success',
                'message' => 'Subscription cancelled successfully.'
                );
            $user_subs = Subscription::find($subscription->id);
            $user_subs->active = 0;
            $user_subs->is_valid = 0;
            $user_subs->save();

            $user = User::find($login_user->id);
            $user->notifications = null;
            $user->save();
            $email_data = [
            'receipt_email' => $login_user->email,
            'first_name'    => $login_user->first_name,
            'last_name'     => $login_user->last_name
            ];
            Mail::send('emails.subcancel', $email_data, function ($message) use ($email_data) {
                $message->from('noreply@summerbodyclub.com', 'Summer Body Club');
                $message->to($email_data["receipt_email"], $email_data['first_name'])->subject("Subscription Canceled");
            });

        } else {
            $msg = array(
                'type' => 'danger',
                'message' => "There was a problem processing your request. Please contact support and provide a copy of this message: " . $response->getMessages()->getMessage()[0]->getCode() . "  " . $response->getMessages()->getMessage()[0]->getText()
                );
        }
    } else {
        $msg = array(
            'type' => 'danger',
            'message' => 'No subscription found.'
            );
    }
    echo json_encode($msg);
    exit;
}

public function getBilling()
{
    $user = Auth::user();
    $oldSubscription = Auth::user()->subscriptions()->take(1)->orderBy('id', 'desc')->first();
    
    $price = Config::get('global.price');
    if( $oldSubscription && $oldSubscription->active === 3) {
        $price = $oldSubscription->price;
    }

    Session::set("AUTHORIZE_TRIAL_MONTHS", "0");    

    return view('account.billing', compact('user', 'price'));
}

public function postBilling(Request $request)
{
    $isSubscriptionUpdated = false;
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

        // The form data is valid, process payment...

    $user = Auth::user();
    $oldSubscription = Auth::user()->subscriptions()->take(1)->orderBy('id', 'desc')->first();
    if(!$oldSubscription) {
      return view('registration.payment', compact('user'));
    }
    if((int)$oldSubscription->active === 3) {
        $renewal_date = new Carbon($oldSubscription->renewal_date);           
        $purchase_date = $renewal_date->format('Y-m-d');
        $next_renewal_date = $renewal_date->addMonth()->format('Y-m-d');
        $price = $oldSubscription->price;
        $isSubscriptionUpdated = $this->subscriptionUpdate($purchase_date, $next_renewal_date, $price, $request, $oldSubscription);
    }

    if((int)$oldSubscription->active ===  4) {     
        $current_date = Carbon::now();                    
        $purchase_date = $current_date->format('Y-m-d');
        $next_renewal_date = $current_date->addMonth()->format('Y-m-d');
        $price = Config::get('global.price');
        if(!$this->cancelAuthSubscription($oldSubscription)) {
           return Redirect::to('account/billing');
        }
        $oldSubscription->is_valid = 0;
        $oldSubscription->update();
        $isSubscriptionUpdated = $this->createNewSubscription($purchase_date, $next_renewal_date, $price, $request);
        dd($isSubscriptionUpdated);
    }
    if(! (int)$oldSubscription->active) {     
        $current_date = Carbon::now();                    
        $purchase_date = $current_date->format('Y-m-d');
        $next_renewal_date = $current_date->addMonth()->format('Y-m-d');
        $price = Config::get('global.price');
        // if(!$this->cancelAuthSubscription($oldSubscription)) {
        //    return Redirect::to('account/billing');
        // }
        $oldSubscription->is_valid = 0;
        $oldSubscription->update();
        $isSubscriptionUpdated = $this->createNewSubscription($purchase_date, $next_renewal_date, $price, $request);
    }
    if ($isSubscriptionUpdated) {        
        Session::flash('message', "Payment information updated Successfully.");
    }
    return Redirect::to('account/billing');

}

public function suspendedAccount()
{
    $refId = "ref" . time();
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
    $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));
    $transaction_mode=env("AUTHORIZENET_TRANSACTION_MODE");
    $request = new AnetAPI\ARBGetSubscriptionListRequest();
    $request->setmerchantAuthentication($merchantAuthentication);
    $request->setSearchType('subscriptionInactive');
    $request->setRefId($refId);

    $controller = new AnetController\ARBGetSubscriptionListController($request);
    $response = $controller->executeWithApiResponse(constant('\net\authorize\api\constants\ANetEnvironment::'.$transaction_mode));

    if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
        $response = $response->getSubscriptionDetails();

        foreach ($response as $res) {

            $subscription_id = trim($res->getid());
            $subscription_status = $res->getstatus();
            $subscription = Subscription::where('authorizenet_subscription_id', $subscription_id)->first();

            if (!empty($subscription)) {
                if ($subscription_status == 'suspended') {

                    $subs = Subscription::find($subscription->id);
                    $subs->active = 3;
                    $subs->is_valid = 0;
                    $subs->authorizenet_subscription_status = $subscription_status;
                    $subs->save();
                    $user = User::where('id', $subscription->user_id)->first();

                        if (!empty($user->email)) //condition when facebook donot provide email id
                        {
                            $email_data = ["FirstName" => $user->first_name, "receipt_email" => $user->email, 'link' => '/account/billing'];

                            Mail::send("emails.substatus", $email_data, function ($message) use ($email_data) {
                                $message->from('noreply@summerbodyclub.com', 'SummerBodyClub');
                                $message->to($email_data["receipt_email"], $email_data['FirstName'])->subject("Subscription is Suspended ");
                            });
                        }


                    }
                    $subs = Subscription::find($subscription->id);
                    if ($subscription_status == 'canceled' || $subscription_status == 'cancelled') {
                        $subs->active = 0;
                        $subs->authorizenet_subscription_status = $subscription_status;
                        $subs->is_valid = 0;
                        $subs->save();
                    }

                    if($subscription_status=='terminated' ) {
                        $subs->active = 4;
                        $subs->is_valid = 0;
                        $subs->authorizenet_subscription_status = $subscription_status;
                        $subs->save();
                    }

                    if($subscription_status == 'expired') {
                        $subs->active = 2;
                        $subs->is_valid = 0;
                        $subs->authorizenet_subscription_status = $subscription_status;
                        $subs->save();
                    }
                }

            }

        }

    }


    public function expireCardSoon()
    {

        $refId = "ref" . time();
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
        $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));
        $transaction_mode=env("AUTHORIZENET_TRANSACTION_MODE");
        $request = new AnetAPI\ARBGetSubscriptionListRequest();
        $request->setmerchantAuthentication($merchantAuthentication);
        $request->setSearchType('cardExpiringThisMonth');
        $request->setRefId($refId);

        $controller = new AnetController\ARBGetSubscriptionListController($request);
        $response = $controller->executeWithApiResponse(constant('\net\authorize\api\constants\ANetEnvironment::'.$transaction_mode));

        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
            $response = $response->getSubscriptionDetails();

            foreach ($response as $res) {

                $subscription_id = trim($res->getid());
                $subscription_status = $res->getstatus();
                $subscription = Subscription::where('authorizenet_subscription_id', $subscription_id)->first();

                if (!empty($subscription)) {

                    $user = User::where('id', $subscription->user_id)->first();

                        if (!empty($user->email)) //condition when facebook donot provide email id
                        {
                            $email_data = ["FirstName" => $user->first_name, "receipt_email" => $user->email, 'link' => '/account/billing'];

                            Mail::send("emails.cardexpiry", $email_data, function ($message) use ($email_data) {
                                $message->from('noreply@summerbodyclub.com', 'SummerBodyClub');
                                $message->to($email_data["receipt_email"], $email_data['FirstName'])->subject("Subscription is Suspended ");
                            });
                        }
                    }

                }
            }
        }

        public function setInactiveSubscription($subscription)
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

        private function subscriptionUpdate($purchase_date, $renewal_date, $price, $request = array(), $subs )
        {
            $subscription = new AnetAPI\ARBSubscriptionType();
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($request["credit_card_number"]);
            $creditCard->setExpirationDate($request["credit_card_expiration_year"] . "-" . $request["credit_card_expiration_month"]);
            $creditCard->setCardCode($request["credit_card_code"]);

            $payment = new AnetAPI\PaymentType();
            $payment->setCreditCard($creditCard);

            $subscription->setPayment($payment);

            $subscription->setAmount($price);

            $billTo = new AnetAPI\NameAndAddressType();
            $billTo->setFirstName($request["first_name"]);
            $billTo->setLastName($request["last_name"]);
            $billTo->setAddress(substr($request["address1"] . " " . $request["address2"], 0, 59)); //it takes upto 60 characters max
            $billTo->setCity($request["city"]);
            $billTo->setState($request["state"]);
            $billTo->setZip($request["zip"]);
            $billTo->setCountry($request["country"]);

            $subscription->setBillTo($billTo);

            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName(env("AUTHORIZENET_API_LOGIN_ID"));
            $merchantAuthentication->setTransactionKey(env("AUTHORIZENET_TRANSACTION_KEY"));
            $transaction_mode=env("AUTHORIZENET_TRANSACTION_MODE");
            $requests = new AnetAPI\ARBUpdateSubscriptionRequest();
            $requests->setmerchantAuthentication($merchantAuthentication);
            $requests->setRefId($subs->authorizenet_ref_id);
            $requests->setSubscriptionId($subs->authorizenet_subscription_id);
            $requests->setSubscription($subscription);

            $controller = new AnetController\ARBUpdateSubscriptionController($requests);
            $authorize_response = $controller->executeWithApiResponse(constant('\net\authorize\api\constants\ANetEnvironment::'.$transaction_mode));


            if (($authorize_response != null) && ($authorize_response->getMessages()->getResultCode() == "Ok")) {            
                $auth_customer_get_payment_profile_id = $authorize_response->getProfile()->getCustomerPaymentProfileId();
                $credit_card_type = detectCardType($request["credit_card_number"]);

                $auth_customer_profile_id = $authorize_response->getProfile()->getCustomerProfileId();
                $Updatesubscription= Subscription::find($subs->id);

                $credit_card_type=detectCardType($request["credit_card_number"]);

                $last_four_digit=substr($request['credit_card_number'], -4);

                $Updatesubscription->credit_card_type=$credit_card_type;
                $Updatesubscription->card_last_four=$last_four_digit;
                $Updatesubscription->card_last_four=$request["credit_card_expiration_year"].'-'.$request["credit_card_expiration_month"];
                $Updatesubscription->purchase_date = $purchase_date;
                $Updatesubscription->renewal_date = $renewal_date;
                $Updatesubscription->trial_months = 0;
                $Updatesubscription->is_valid = 1;
                $Updatesubscription->active = 1;
                $Updatesubscription->save();

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

                return true;
            }
            $response = $authorize_response->getMessages()->getMessage()[0]->getCode() . "  " . $authorize_response->getMessages()->getMessage()[0]->getText() . "\n";
            Session::flash('message', $response);

            return false;
    }

    private function createNewSubscription($purchase_date, $next_renewal_date, $price, $request = array())
    {        
        $get_trial_months = "0";
        $user = Auth::user();

        $ref_id = 'ref' . time();
        
        $description = "Summer Body Club Monthly Subscription";
        $suspendedSubscription  = $user->suspendedSubscription;
        
        $transaction_response = $this->createTransactions($request["credit_card_number"], $request["credit_card_expiration_year"], $request["credit_card_expiration_month"], $request["credit_card_code"], $request["first_name"], $request["last_name"], $request["address1"] . " " . $request["address2"], $request["city"], $request["state"], $request["zip"], $request["country"], $request["phone"], $user->id, $user->email, $ref_id, $get_trial_months, $description, $price);



        if ( ($transaction_response != null) 
            && ($transaction_response->getMessages()->getResultCode() == "Ok")) 
        {

            $authorize_response = $this->processAuthNetSubscription($request["credit_card_number"], $request["credit_card_expiration_year"], $request["credit_card_expiration_month"], $request["credit_card_code"], $request["first_name"], $request["last_name"], $request["address1"] . " " . $request["address2"], $request["city"], $request["state"], $request["zip"], $request["country"], $request["phone"], $user->id, $user->email, $ref_id, $get_trial_months);


            if (($authorize_response != null) && ($authorize_response->getMessages()->getResultCode() == "Ok")) 
            {
                $auth_customer_profile_id = $authorize_response->getProfile()->getCustomerProfileId();
                $auth_customer_get_payment_profile_id = $authorize_response->getProfile()->getCustomerPaymentProfileId();
                $credit_card_type = detectCardType($request["credit_card_number"]);

                $last_four_digit = substr($request['credit_card_number'], -4);

                $subscription = new Subscription(['active' => '1', 'authorizenet_ref_id' => $ref_id, 'authorizenet_subscription_id' => $authorize_response->getSubscriptionId(), 'authorizenet_subscription_status' => 'created', 'card_last_four' => $last_four_digit, 'card_exp_date' => $request["credit_card_expiration_year"] . '-' . $request["credit_card_expiration_month"], 'purchase_date' => $purchase_date, 'updated_at' => date('Y-m-d H:i:s'), 'customer_profile_id' => $auth_customer_profile_id, 'customer_payment_profile_id' => $auth_customer_get_payment_profile_id, 'credit_card_type' => $credit_card_type, 'renewal_date' => $next_renewal_date, 'price' => $price, 'trial_months' => '0', 'is_valid' => 1]);

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

                return true;
            
            } else {
              $error = $authorize_response->getMessages()->getMessage()[0]->getCode() . "  " . $authorize_response->getMessages()->getMessage()[0]->getText() . "\n";
                Session::flash('message', $error);

                return false;
            }

            
        }else {
            $error = $transaction_response->getMessages()->getMessage()[0]->getCode() . "  " . $transaction_response->getMessages()->getMessage()[0]->getText() . "\n";
                  Log::error($error);
            Session::flash('message', $error);
            return false;
        }
    }

    private function createTransactions($credit_card_number, $expiration_year, $expiration_month, $credit_card_code, $first_name, $last_name, $address, $city, $state, $zip, $country, $phonenumber, $user_id, $email_id, $ref_id, $trial_months, $description, $price = null) {
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

     //authorize.net process subscription code
    private function processAuthNetSubscription($credit_card_number, $expiration_year, $expiration_month, $credit_card_code, $first_name, $last_name, $address, $city, $state, $zip, $country, $phonenumber, $user_id, $email_id, $ref_id, $trial_months, $price = null)
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
           $response = $response->getMessages()->getMessage()[0]->getCode() . "  " . $response->getMessages()->getMessage()[0]->getText() . "\n";
            Session::flash('message', $response);
            return false;
        }
    }

    public function cancelAuthSubscription($subscription)
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