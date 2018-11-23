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

class Document extends Model
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
	public function Document_Types()
	{
		$Document_Types = DB::select('CALL document_types_Retrieve();');
				
		return $Document_Types;
	}

	
	/**
	* @Description: Get the article by the ID
	*
	* @param (Integer) ID - The article ID
	*
	* @return (JSONOBJECT) - Returns article items or NULL
	*/
	public function Document_by_Types($id)
	{
		$Documents = DB::select('CALL documents_byType_Retrieve(?);', array($id));
		
		return $Documents;
	}


	/**
	* @Description: Get the article by subteypes
	*
	* @param (Integer) ID - The article ID
	*
	* @return (JSONOBJECT) - Returns article items or NULL
	*/
	public function Document_by_SubTypes($id, $subtype)
	{
		$Documents = DB::select('CALL documents_bySubType_Retrieve(?,?);', array($id, $subtype));
		
		return $Documents;
	}
}
