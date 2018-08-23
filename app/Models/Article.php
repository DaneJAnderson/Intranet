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

class Article extends Model
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
	* @Description: Get the lastest articles
	*
	* @param (void)
	*
	* @return (JSON) - Returns articles the lastest articles
	*/
	public function Lastest_Articles()
	{
		$Articles = DB::select('CALL articles_lastest_Retrieve();');
				
		return $Articles;
	}

	
	/**
	* @Description: Get the article by the ID
	*
	* @param (Integer) ID - The article ID
	*
	* @return (JSONOBJECT) - Returns article items or NULL
	*/
	public function Articles_by_ID($id)
	{
		$Articles = DB::select('CALL articles_byID_Retrieve(?);', array($id));
		
		if(count($Articles)>0)
		{
			$Articles = $Articles[0];
		}
		else
		{
			$Articles = NULL;
		}
				
		return $Articles;
	}
	
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
}
