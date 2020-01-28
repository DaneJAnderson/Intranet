<?php
/**
*   Author: Dane J Anderson   
*   Companp: COK Sodality Credit union
*   License: 
*   License URL: 
*/
namespace App\Models;

use DB;
use File;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utility;
use App\Exceptions\customValidationException;

class Staff_Details extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
    /**
    * @Description: Get staff details for birthdays today
    *
    * @param (void)
    *
    * @return (JSONARRAY) - Returns staff details array
    */
    public function Current_Birthdays()
    {
        // Dane staff birthday 
        $Staff_details = DB::select('CALL get_staff_birthdays();');
        // $Staff_details = DB::select('CALL staff_details_BirthdaysToday_Retrieve();');
                
        return $Staff_details;
    }

    public function getAllStaff()
    {
        // Dane staff birthday 
        $Staff_details = DB::select('CALL get_all_birthday_staff();');
        // $Staff_details = DB::select('CALL staff_details_BirthdaysToday_Retrieve();');
                
        return $Staff_details;
    }

    // Update Staff Status 
    public function updateStaffBday($id, $status)
    { 
       // $Staff_details = DB::select('CALL update_status_birthday('.$id.','.$status.');');   

       $Staff_details = DB::update("update staff_details set status = $status where id = ?", [$id]);         
        return $Staff_details;
    }

    public function editStaffBday($staff)
    {   
         
         $username = $staff['username'];
         $fname = $staff['fname'];
         $lname = $staff['lname'];
         $fullname = $staff['fname']." ".$staff['lname'];
         $gender = $staff['gender'];
         $dob = $staff['dob'];
         $dept = $staff['dept'];
         $jobTitle = $staff['jobTitle'];
         $id = $staff['id'];    
       
        $Staff_details = DB::update("update staff_details set username = '$username', first_name = '$fname',last_name = '$lname', sex = '$gender', department = '$dept', job_title = '$jobTitle', dob = '$dob', full_name = '$fullname' where id = ?", [$id]);
        
        return $Staff_details;
         
    }

    public function retrieveStaffBday($id)
    { 
        $Staff_details = DB::select("SELECT *FROM staff_details where id = ?", [$id]);               
        return $Staff_details;
    }

}
