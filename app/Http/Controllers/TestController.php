<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class TestController extends Controller
{
	/**
	* Test DB connection.
	*
	* @return Response
	*/
	public function index()
	{
		$users = DB::table('users')->get();
		
		foreach ($users as $user) {
			echo $user->name . '<br>';
		}
		
		return view('welcome');
	}
}
