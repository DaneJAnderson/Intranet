<?php
/**
*	Author: Gavin Palmer
*	Author URL: http://www.dynamicevolution.technology
* 	Companp: COK Sodality Credit union
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

class Gallery extends Model
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
	* @Description: Get the active Galleries
	*
	* @param (void)
	*
	* @return (JSON) - Returns active Galleries 
	*/
	public function Galleries()
	{
		$Galleries = DB::select('CALL galleries_Retrieve();');
				
		return $Galleries;
	}
}
