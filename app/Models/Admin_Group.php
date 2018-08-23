<?php
/**
*	Author: Gavin Palmer
*	Author URL: http://www.dynamicevolution.technology
*	License: 
*	License URL: 
*/
namespace App\Models;

use DB;
use File;
use Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utility;
use App\Exceptions\customValidationException;

class Admin_Group extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
    protected $fillable =
	[
        'id'
    ];
	
    /**
	* Description: Get all active licenses
	*
	* @param (void)
	*
	* @return (Array) - Returns shopping cart items or NULL
	*/
	public function All_Admin_Groups()
	{
		$All_Admin_Groups = DB::select('CALL admin_groups_Retrieve();');
				
		return $All_Admin_Groups;
	}


	 /**
	* Description: Get the User role ID if the user has a special role access
	*
	* @param (void)
	*
	* @return (Array) - Returns shopping cart items or NULL
	*/
	public function UserRole($username)
	{
		$roles = DB::select('CALL user_roles_ByID_Retrieve(?);', array($username));
		
		return $roles;
	}
}
