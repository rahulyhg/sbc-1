<?php 

use Config;
use Exception;

class TaxCloud 
{

	protected $clinet = null;

	protected $userId = null;

	protected $cartId = null;

	public function __construct()
	{

	}

	public function getClient()
	{

	}

	public function verifyAddress($address, $city, $state, $zipCode, $address2, $meta = array())
	{
		$param = [
			'Address1' => $address,
			'Address2' => $address2,
			'city'	   => $city,
			'state'    => $state,
			'zip4'     => $zip,
			'zip5'     => null,			
		];
		try {
			$this->client->verifYAddress($param);
		} catch(Exception $e) {
			$err[] = "Error encountered while verifying address ".$address->getAddress1().
                " ".$address->getState()." ".$address->getCity()." "." ".$address->getZip5().
                " ".$e->getMessage();
            $errorDetail = 'Tax Cloud Verify Address: Message '. $e->getMessage() . ', File '. $e->getFile();
            $errorDetail .= ', Line No '. $e->getLine();
            Log::error($errorDetail);
            $this->setError($err); 
		}
	}

	public function lookupTaxes($cartItems, $origin = arrray(), $exemptCert = array(), $destination = null)
	{

		$params = [
			"apiLoginID"  => $this->_getApiId(),
            "apiKey"      => $this->_getApiKey(),
            "customerID"  => $this->getCustomerId(),
            "cartID"      => $this->getCartId(),
            "cartItems"   => $cartItems,
            "origin"      => $origin,
            "destination" => $destination,
            "exemptCert"  => $exemptCert
            "deliveredBySeller" => false,
		];

		try {
			
			return $this->client->lookup($params);
		} catch(Exception $e) {
			$errorDetail = 'looking up taxes: Message '. $e->getMessage() . ', File '. $e->getFile();
            $errorDetail .= ', Line No '. $e->getLine();
            Log::error($errorDetail);
			$err[] = "Error encountered looking up tax amount ". $e->getMessage();
			$this->setError($error);
		}
	}

	private function setError($errors)
	{
		$this->isError = true;
		$this->errors =  $errors; 
	}

}