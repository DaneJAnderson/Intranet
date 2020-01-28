<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Staff_Details;
// use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Models\Utility;
// use App\Exceptions\customValidationException;
// use Exception;

class staffBirthdayController extends Controller
{
    public function getAllStaff(){
     
        $Staff_Details = new Staff_Details();
		$Staff_details = $Staff_Details->getAllStaff();
		
		return response()->json($Staff_details);
    } 


    public function updatestatus(Request $request){

        $id = $request->input('id');
        $status = $request->input('status');

         $Staff_Details = new Staff_Details();
		 $Staff_details = $Staff_Details->updateStaffBday($id, $status);
		
		 return response()->json($Staff_details);
		

    }

    public function edit_bday_staff(Request $request) {

        $staff = $request->only(['id','username', 'fname', 'lname', 'gender', 'jobTitle', 'dept','dob']);
        
        $Staff_Details = new Staff_Details();
		$Staff_details = $Staff_Details->editStaffBday($staff);
		
		return response()->json($Staff_details);
        
    }

    public function retrieve_bday_staff(Request $request) {
        
        $id = $request->input('id');
        $Staff_Details = new Staff_Details();
		$Staff_details = $Staff_Details->retrieveStaffBday($id);
		
		return response()->json($Staff_details);
    }


}
