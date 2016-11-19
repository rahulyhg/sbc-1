<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\Measurement;
use Carbon\Carbon;
use App\User;

class MeasurementController extends Controller
{

    /**
     * Show measurements form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{	
        $weight_last = Auth::user()->measurements->sortBy('date')->last();
        if (!empty($weight_last)) {$weight = $weight_last->weight;} else {$weight = Auth::user()->weight;}
		$weight_unit = Auth::user()->weight_unit;
		
		if($weight_unit == 'lb'){
        	$weight = convert_to_lb($weight);
        }
        else {
        	$weight = round_kg($weight);
        }
		
		return view('measurement', compact('weight', 'weight_unit'));
	}
	
	/**
     * Process measurement.
     *
     * @param  Request  $request
     * @return Response
     */
    public function saveMeasurement(Request $request)
	{	
		// Validate and process measurement...
     	$this->validate($request, [
			'weight' => 'required|numeric',
		]);
		
		$date = Carbon::now()->toDateString();
		
		$weight = $request->weight;
		
		$weight_unit = $request->weight_unit;
		if($weight_unit == 'lb'){
			$weight_log = convert_to_kg_decimal($request->weight);
		} else {
			$weight_log = $weight;
		}

		$measurement = Measurement::firstOrNew(array('user_id' => Auth::user()->id, 'date' => $date));
		$measurement->fill(['weight' => $weight_log, 'date' => $date]);
		Auth::user()->measurements()->save($measurement);
		
		session()->flash('status', 'Weight has been saved');
		
		return view('measurement', compact('weight', 'weight_unit'));
	}
	
	
}
