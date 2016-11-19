<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_name', 'last_name', 'dob',  'gender', 'weight', 'weight_goal', 'height', 'email', 'phone', 'address1', 'address2', 'city', 'zip', 'optin', 'password','height_unit','weight_unit','notifications','country_id','state_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];    
    
 //   $table->string('email')->unique()->nullable();
        
    /**
     * A user can have many subscriptions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
    	return $this->hasMany('App\Subscription');
    }   
    
    /**
     * Return an active subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function active_subscription()
    {
    	//return $this->subscriptions()->where('active',1);
    	//return $this->subscriptions();
        $today = date('Y-m-d');

        $isCancelSubscription = $this->subscriptions()->where(function($query) use($today) {
            $query->where("active", "0")
                  ->where("renewal_date",">=",$today);
            })->orderBy('id', 'desc')->count();
        
        if($isCancelSubscription) return true;

        return $this->subscriptions()->where(function($query) use($today) {
            $query->where("active","1")
                  ->where("renewal_date",">=",$today);
            })->orderBy('id', 'desc')->count();
    }
    
    /**
     * A user can have many programs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programs()
    {
    	return $this->belongsToMany('App\Program')->withPivot('active','program_start');
    }
    
    /**
     * Return an active program.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function active_program()
    {
    	return $this->programs()->where('active',1);
    }
    
    /**
     * A user can have many questions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
    	return $this->belongsToMany('App\Question')->withPivot('answer')->withTimestamps();
    }    
    
    /**
     * A user can have many measurements.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function measurements()
    {
    	return $this->hasMany('App\Measurement');
    }


    public function subscription() {
        return $this->hasOne('App\Subscription')->where('active', 1)->whereIsValid(1);
    }

    public function suspendedSubscription()
    {
        return $this->hasOne('App\Subscription')->where('active', 3)->whereIsValid(0);
    }

    public function terminatedSubscription()
    {
        return $this->hasOne('App\Subscription')->where('active', 4)->whereIsValid(0);   
    }
}
