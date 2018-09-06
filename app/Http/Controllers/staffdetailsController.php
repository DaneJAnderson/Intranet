<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Staff_Details;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Utility;
use App\Exceptions\customValidationException;
use Exception;
//use App\Http\Middleware\Session_Manager;

class staffdetailsController extends Controller
{
	public function getCurrentBirthdays(Request $request)
	{	
		//Variables
		$Staff_Details = new Staff_Details();

		$Staff_details = $Staff_Details->Current_Birthdays();
		
		return response()->json($Staff_details);
	}
}