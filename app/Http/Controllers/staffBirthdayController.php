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

    $staff = $request->only(['id','username', 'fname', 'lname', 'gender', 'jobTitle', 'dept','dob','file']);
        
        
    $filename ="";
        if ($request->hasFile('file')) {
 
           $path = storage_path();
           // $path = public_path();
                    
          $file = $request->file('file');    
           $ext = $file->getClientOriginalExtension();

          $filename =  $staff['username'].'.'.$ext;
          $originName = $file->getClientOriginalName();

          $url = $file->move($path.'\app\public\images\profile_images',$filename);

                // return response()->json($url);
            }

		$Staff_Details = new Staff_Details();
        $Staff_details = $Staff_Details->editStaffBday($staff,$filename);
		return response()->json($Staff_details);
        
    }

    public function create_bday_staff(Request $request) {

        
  $staff = $request->only(['id','username', 'fname', 'lname', 'gender', 'jobTitle', 'dept','dob','file']);
           
               
            $filename ="";
         //  $Files = $request->all();

         if ($request->hasFile('file')) {
 
           $path = storage_path();
           // $path = public_path();
                    
          $file = $request->file('file');    
           $ext = $file->getClientOriginalExtension();

          $filename =  $staff['username'].'.'.$ext;
          $originName = $file->getClientOriginalName();

          $url = $file->move($path.'\app\public\images\profile_images',$filename);

                // return response()->json($url);
            }
        $Staff_Details = new Staff_Details();
		 $Staff_details = $Staff_Details->createStaffBday($staff,$filename); 
    }

    public function retrieve_bday_staff(Request $request) {
        
        $id = $request->input('id');
        $Staff_Details = new Staff_Details();
		$Staff_details = $Staff_Details->retrieveStaffBday($id);
		
		return response()->json($Staff_details);
    }


}
