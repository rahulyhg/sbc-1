<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Carbon\Carbon;
use Session;
use DB;
use Redirect;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/registration/register_complete';    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {           
        $validator_array=[
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birthdate_month' => 'required',
            'birthdate_day' => 'required',
            'birthdate_year' => 'required',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        /*Age validation code*/        
        if(!empty($data['birthdate_year']) && !empty($data['birthdate_month']) && !empty($data['birthdate_day']))
        {            
            $dt = new Carbon();
            $before = $dt->subYears(18)->format('Y-m-d');
            $data['dob']=Carbon::create($data['birthdate_year'], $data['birthdate_month'], $data['birthdate_day'])->format('Y-m-d');            
            $validator_array['dob']='required|date|before:'.$before;
        }
        /*Age validation code ends*/        
        
		return Validator::make($data, $validator_array);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $new_user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'dob' => Carbon::create($data['birthdate_year'], $data['birthdate_month'], $data['birthdate_day'])->format('Y-m-d'),
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        
        return $new_user;        
    }
/*Logout overidden to clear session and redirect to login page*/    
    public function logout()
    {                        
        Auth::logout();
        Session::set('AUTHORIZE_TRIAL_MONTHS', "0");
        Session::flush();
        return Redirect::to('/login');
    }    
}
