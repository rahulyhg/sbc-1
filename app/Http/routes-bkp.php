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



Route::get('/testEmail','RegistrationController@testEmail');

Route::group(['middleware' => ['web']], function () {

	Route::get('/fb_redirect', 'RegistrationController@facebookRedirect');
	Route::get('/fb_callback', 'RegistrationController@facebookCallback');

	Route::get('/', function () {return view('welcome');});
	
	Route::get('/freemonth', 'RegistrationController@setOneMonthTrial');
	Route::get('/KRxvHuEXZCfHWoAw3QPjK8PLKUWM','RegistrationController@setUnlimitedMonthTrial');
	
	Route::get('/trial/{months?}','RegistrationController@getTrialView');

	Route::get('/about', function () {return view('about');});
	Route::get('/privacy-policy', function () {return view('privacy-policy');});
	Route::get('/home', 'HomeController@index');
	Route::get('/registration/question/{id?}', 'RegistrationController@collectAnswers');
	Route::post('/registration/question/{id?}', 'RegistrationController@collectAnswers');
	Route::get('/decision', 'RegistrationController@showDecision'); // decision page
	Route::get('/send_results_email/{email?}', 'RegistrationController@sendResultsEmail'); // send results email page
	Route::get('/signup_step_2/{email?}/{answers?}', 'RegistrationController@signUpStep2'); // send results email page

	
	Route::group(['middleware' => 'auth'], function () {

		Route::get('/registration/register_complete', 'RegistrationController@registrationComplete');

		Route::get('/registration/payment', 'RegistrationController@payment');
		Route::post('/registration/process_payment', 'RegistrationController@processPayment');
		Route::get('/registration/measurements', function () {return view('registration/measurements');});
		Route::post('/registration/measurements','RegistrationController@postMeasurement');
		/* Route::get('/registration/question/{id?}', 'RegistrationController@collectAnswers');
		Route::post('/registration/question/{id?}', 'RegistrationController@collectAnswers'); */
		Route::get('/program', 'RegistrationController@program');
		
		Route::get('/program/overview', function () {return view('program/overview');});
		Route::get('/program/recipe/{id}','ProgramController@recipe');
		Route::get('/program/workout/{id}','ProgramController@workout');
		Route::get('/program/mindset/{id}','ProgramController@mindset');

		# Temp recipe and exercise routes
		Route::get('/program/recipe/lunch', function () {return view('program/recipe/lunch');});
		Route::get('/program/recipe/snack', function () {return view('program/recipe/snack');});
		Route::get('/program/recipe/dinner', function () {return view('program/recipe/dinner');});

		Route::get('/program/workout', function () {return view('program/workout');});
		Route::get('/program/exercise', function () {return view('program/exercise');});
		# /Temp recipe and exercise routes
		
		Route::get('/measurement', 'MeasurementController@index');
		Route::post('/measurement', 'MeasurementController@saveMeasurement');
		
		Route::get('/account', function () {return view('account/account');});

		Route::put('/user/update_email_preference', 'RegistrationController@updateEmailPreference');



	});
	
	Route::auth();	
});




Route::get('/db','TestController@index');

Route::get('/encode/{months?}','RegistrationController@getBaseEncode');