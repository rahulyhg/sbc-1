<?php

	setlocale(LC_MONETARY, 'en_US.UTF-8');
	
	function uppercase($data) {
		return strtoupper($data);
	}
	
	function convert_to_kg_decimal($lb) {
		return $lb * 0.453592;
	}
	
	function convert_to_lb($kg) {
		return round($kg * 2.20462, 1);
		// return round(($kg * 2.20462) * 2) / 2; // round to the nearest to .5 lb
	}

	function convert_to_cm($feet,$inch)
	{
		$inch = ($feet * 12) + $inch;
    	return (int) round($inch / 0.393701);
	}

	function convert_to_pound($oz){
		return ceil($oz/16);
	}

	function convert_to_kg($lb)
	{
		return round(0.45359237*$lb,4);
	}

	function round_kg($kg)
	{
		return round($kg, 1);
		// return round($kg * 2) / 2; // round to the nearest to .5 kg
	}

	function detectCardType($number)
	{
	    $number=preg_replace('/[^\d]/','',$number);
	    if (preg_match('/^3[47][0-9]{13}$/',$number))
	    {
	        return 'American Express';
	    }
	    elseif (preg_match('/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',$number))
	    {
	        return 'Diners Club';
	    }
	    elseif (preg_match('/^6(?:011|5[0-9][0-9])[0-9]{12}$/',$number))
	    {
	        return 'Discover';
	    }
	    elseif (preg_match('/^(?:2131|1800|35\d{3})\d{11}$/',$number))
	    {
	        return 'JCB';
	    }
	    elseif (preg_match('/^5[1-5][0-9]{14}$/',$number))
	    {
	        return 'MasterCard';
	    }
	    elseif (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/',$number))
	    {
	        return 'Visa';
	    }
	    else
	    {
	        return 'Unknown';
	    }
	}	