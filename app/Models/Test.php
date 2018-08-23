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

class Product extends Model
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
	
	
    public function Products()
	{
		$Products = DB::select('CALL products_Retrieve();');
		return $Products;
	}
}
