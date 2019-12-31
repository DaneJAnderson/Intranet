<?php
/**
*   Author: Gavin Palmer
*   Author URL: http://www.dynamicevolution.technology
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
}
