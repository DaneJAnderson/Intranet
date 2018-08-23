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
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
	* Description: 
	*
	* @param - (Void): 
	*
	* @return (Viod) - 
	*/
	public function test()
	{
		
				
		return "test()";
	}
}
