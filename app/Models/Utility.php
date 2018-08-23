<?php
/**
*	Author: Gavin Palmer
*	Author URL: http://www.gp-tech-co.com
*	License: 
*	License URL: 
*/
namespace App\Models;

use DB;
use File;
use Storage;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
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
	
	
	/** -Gavin Palmer || October 2016
	*	@Discription:	Returns a reletively less risky values to be used in query
	*	
	*	@param (String) data - The data you are converting
	*
	*	@return (String) output
	*/
	function Clean_Data($data)
	{
		$data = trim($data); //Remove white spaces
		$data = stripslashes($data); //Remove slashes that form quoted strins
		$data = htmlspecialchars($data); //Converts HTML characters
		
		return $data;
	}

	
    /** -Gavin Palmer || October 2016
	*	@Discription:	Returns True if all critiria is met, false otherwise.
	*	
	*	@param (String) data - The data you are converting
	*
	*	@return (Boolean) output
	*/
	function Validate_isset_and_not_empty($variable)
	{
		if(isset($variable))
		{
			if(!empty($variable))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
}
