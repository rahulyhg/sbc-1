<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active','authorizenet_ref_id','authorizenet_subscription_id','authorizenet_subscription_status','card_last_four','card_exp_date','purchase_date','updated_at','customer_address_id','customer_payment_profile_id','customer_profile_id','credit_card_type','renewal_date','price','trial_months', 'is_valid'
    ];
    
	/**
     * A subscription is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
    
}
