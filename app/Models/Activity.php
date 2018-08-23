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
use App\Models\Utility;
use App\Exceptions\customValidationException;

class Activity extends Model
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
	* @return (JSON) - Returns shopping cart items or NULL
	*/
	/*public function All_Licenses()
	{
		$Licenses = DB::select('CALL licenses_Retrieve();');
				
		return $Licenses;
	}*/
	
	
	/**
	* Description: Insert new activity record
	*
	* @param (void)
	*
	* @return (Void) -
	*/
	public function Add_Activity($type, $entity, $username, $comment)
	{
		//Variables
		$Utility = new Utility();
		
		try {
		//User Framework transaction controll
		DB::beginTransaction();
		
		$result = DB::insert('CALL activities_Insert(?,?,?,?);', array($type, $entity, $username, $comment));
		
		//var_dump($result); die();
		if($result==true)
		{
			//$Shopping_cart_ID = DB::select('SELECT LAST_INSERT_ID()');
			//$Shopping_cart_ID = $Shopping_cart_ID[0]->{"LAST_INSERT_ID()"};
		}
		else
		{
			//throw some error
			throw new customValidationException("some error");
		}
		
		DB::commit();
		}
		catch (QueryException $e)
		{
        	var_dump($e);
		}
		catch (Exception $e)
		{
			// something went wrong elsewhere, handle gracefully
			var_dump($e);
		}
				
		return /*last inserted cart id*/;
	}

}
