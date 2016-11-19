<?php 
namespace App;

class SubscriptionResponse extends \Eloquent 
{
	protected $fillable = ['code', 'reason_code', 'auth_code', 'trans_id', 'reason_text', 'subscription_id', 'subscription_paynum', 'meta'];

	protected $table = 'subscriptions_response';

	public function setMetaAttribute($value)
	{
		$this->attributes['meta'] = json_encode($value, true);
	}
}