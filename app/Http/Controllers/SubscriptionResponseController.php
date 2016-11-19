<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubscriptionResponse;

class SubscriptionResponseController extends Controller
{

	public function save(Request $request)
	{
		$input = $request->all();
		try {
			$response = SubscriptionResponse::create($this->mapResponse($input));
			$subscription = \App\Subscription::whereAuthorizenetSubscriptionId($response->subscription_id)
															->first();
			if((int)$response->code == 1 && ($subscription)) {
				$dateTime = new \Carbon\Carbon($subscription->renewal_date,'UTC');
				$subscription->renewal_date = $dateTime->addMonth();
				$subscription->save();
			}

		} catch (Exception $e) {
			$errrorDettail = 'Subscription Response Line No' . $e->getLine() . ' File Name' .
			$e->getFile() . ' Message ' . $e->getMessage(); 
			\Log::error($errrorDettail);
		}
		

	}

	private function mapResponse($input)
	{
		$map = [
			'code'                => $input['x_response_code'],
			'reason_code'         => $input['x_response_reason_code'],
			'auth_code'           => $input['x_auth_code'],
			'trans_id'            => $input['x_trans_id'],
			'reason_text'         => $input['x_response_reason_text'],
			'subscription_id'     => $input['x_subscription_id'],
			'subscription_paynum' => $input['x_subscription_paynum'],
			'meta'                => $input
 		];

 		return $map;
	}
}