<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/as',function(){
	$subscriptions = Auth::user()->subscriptions()->take(1)->orderBy('id', 'desc')->first();
});

Route::get('/test', 'RegistrationController@cancelSubscription');

Route::get('/testEmail','RegistrationController@testEmail');

Route::post('/testipn','SubscriptionResponseController@save');

Route::group(['middleware' => ['web']], function () {

	Route::get('/fb_redirect', 'RegistrationController@facebookRedirect');
	Route::get('/fb_callback', 'RegistrationController@facebookCallback');
	Route::get('/registration/age', 'RegistrationController@facebookAgeValidationFails');

	//Route::get('/', function () {return view('welcome');});
	Route::get('/', 'RegistrationController@setOneMonthTrial'); // temp redirect to free month trial

	Route::get('/freemonth', 'RegistrationController@setOneMonthTrial');
	Route::get('/KRxvHuEXZCfHWoAw3QPjK8PLKUWM','RegistrationController@setUnlimitedMonthTrial');

	Route::get('/trial/{months?}','RegistrationController@getTrialView');

	Route::get('/about', function () {return view('about');});
	Route::get('/privacy-policy', function () {return view('privacy-policy');});
	Route::get('/terms-service', function () {return view('terms-service');});
	Route::get('/home/{id?}', 'HomeController@index');
	Route::get('/registration/intro', 'RegistrationController@intro');
	Route::get('/registration/question/{id?}', 'RegistrationController@collectAnswers');
	Route::post('/registration/question/{id?}', 'RegistrationController@collectAnswers');
	Route::get('/decision', 'RegistrationController@showDecision'); // decision page
	Route::get('/send_results_email/{email?}', 'RegistrationController@sendResultsEmail'); // send results email page
	Route::get('/save_intro_email/{email?}', 'RegistrationController@saveIntroEmail'); // send results email page
	Route::get('/signup_step_2/{email?}/{answers?}', 'RegistrationController@signUpStep2'); // send results email page
	Route::get('/workout/{id}','ProgramController@workoutShare'); // public page for facebook sharing

	Route::group(['middleware' => 'auth'], function () {

		Route::get('/registration/register_complete', 'RegistrationController@registrationComplete');

		Route::get('/registration/payment', 'RegistrationController@payment');
		Route::post('/registration/process_payment', 'RegistrationController@processPayment');
		Route::post('/registration/process_trial', 'RegistrationController@processTrial');
		Route::get('/registration/measurements', function () {return view('registration/measurements');});
		Route::post('/registration/measurements','RegistrationController@postMeasurement');
		/* Route::get('/registration/question/{id?}', 'RegistrationController@collectAnswers');
		Route::post('/registration/question/{id?}', 'RegistrationController@collectAnswers'); */
		Route::get('/program', 'RegistrationController@program');

		Route::get('/program/chart','ProgramController@getChart');

		Route::get('/program/chart-ajax','ProgramController@postChartAjax');
			Route::post('/program/chart-ajax','ProgramController@postChartAjax');
				Route::post('/program/mini-chart','ProgramController@miniChartAjax');
				Route::get('/program/mini-chart','ProgramController@miniChartAjax');

				//Chart Ajax according to month
				Route::post('/program/chart-ajax-month','ProgramController@chartAjaxMonth');

				//Chart Ajax according to Year
				Route::post('/program/chart-ajax-year','ProgramController@chartAjaxYear');

				//Chart Ajax according to Week
				Route::post('/program/chart-ajax-week','ProgramController@chartAjaxWeek');


		Route::get('/program/overview', 'HomeController@overview');
		Route::get('/program/recipe/{id}','ProgramController@recipe');
		Route::get('/program/recipe-lounge/{id?}','ProgramController@recipeLounge');
		Route::get('/program/food/{id}','ProgramController@food');
		Route::get('/program/workout/{id}','ProgramController@workout');
		Route::get('/program/mindset/{id}','ProgramController@mindset');
		Route::get('/program/exercise-room/{category?}','ProgramController@exerciseRoom');
		Route::post('/program/exercise-room','ProgramController@saveData');

		Route::get('/program/playlists','ProgramController@getPlaylist');

		Route::get('/program/workout-prep','ProgramController@workoutPrep');
		Route::get('/program/event-ready','ProgramController@eventReady');
		Route::get('/program/shopping-list','ProgramController@shoppingList');

		Route::get('/measurement', 'MeasurementController@index');
		Route::post('/measurement', 'MeasurementController@saveMeasurement');

		Route::get('/account', function () {return view('account/account');});

		Route::get('/account', 'AccountController@getAccount');
		Route::post('/account', 'AccountController@postAccount');
		Route::get('/account/program-options', 'AccountController@programOptions');
		Route::post('/account/program-options', 'AccountController@saveProgramOptions');
		Route::get('/account/program-reset', 'AccountController@programReset');
		Route::post('/account/program-reset', 'AccountController@saveProgramReset');
		Route::get('/account/program-reset-jumpstart', 'AccountController@saveProgramResetJumpstart');

		Route::post('/personal-info','AccountController@updatePersonalinfo');
		Route::post('/goal-update','AccountController@updateGoal');
		Route::post('/preference-update','AccountController@updatePreference');
		Route::post('/cancel-subscription','AccountController@cancelSubscription');
		Route::post('/jumpstart','AccountController@jumpstart');

		Route::get('/account/billing','AccountController@getBilling');
		Route::post('/account/billing','AccountController@postBilling');

		Route::get('/account/renew','AccountController@getRenew');
		Route::post('/account/renew','AccountController@postRenew');

		Route::put('/user/update_email_preference', 'RegistrationController@updateEmailPreference');




	});

	Route::auth();
});


//Cron job Monthly


Route::post('/email/daily', 'EmailController@dailyEmail');

Route::post('/emailtest/dailytest', 'EmailController@dailyEmailTest');

Route::post('/email/weekly', 'EmailController@weeklyEmail');

Route::post('/suspended-list','AccountController@suspendedAccount');

Route::post('/expire-card','AccountController@expireCardSoon');

Route::get('/db','TestController@index');

Route::get('/encode/{months?}','RegistrationController@getBaseEncode');
