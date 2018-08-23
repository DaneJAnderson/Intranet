<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use App\Exceptions\customValidationException;
use App\Models\Admin_Group;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Middleware\Session_Manager;

class userController extends Controller
{
	/**
	* Description: 
	*
	* @param - 
	*
	* @return (VOID) - 
	*/
    public function postLogin(Request $request)
	{
		//Variables
		$Session_Manager = new Session_Manager();
		$Utility = new Utility();
		$Admin_Group = new Admin_Group();
		$Activity = new Activity();

		$username = $Utility->Clean_Data($request->input('username'));
		
		if(isset($username))
		{
			if(!empty($username))
			{
				$username=$Utility->Clean_Data($username);
			}
			else
			{
				throw new customValidationException("A valid username is required");
			}
		}
		else
		{
			throw new customValidationException("username required");
		}
		
		$password = $Utility->Clean_Data($request->input('password'));
		
		if(isset($password))
		{
			if(!empty($password))
			{
				$password=$Utility->Clean_Data($password);
			}
			else
			{
				throw new customValidationException("A valid password is required");
			}
		}
		else
		{
			throw new customValidationException("password required");
		}

		$Admin_Groups = $Admin_Group->All_Admin_Groups();
		$Admin_Groups = json_decode(json_encode($Admin_Groups), True);
		
		$User_Roles = $Admin_Group->UserRole($username);
		
		$login_response = $Session_Manager->checkLogin($request, $username, $password, $Admin_Groups, $User_Roles);
		//var_dump($login_response);die();
		
		if($login_response==1)
		{
			$Activity->Add_Activity(1,'NONE', $username, "Logged in");
			return response()->json($login_response);
		}
		else
		{
			throw new customValidationException($login_response);
		}
	}


	/**
	* Description: 
	*
	* @param - 
	*
	* @return (VOID) - 
	*/
    public function getUserbyID(Request $request)
	{
		//Variables
		$Session_Manager = new Session_Manager();
		$Utility = new Utility();
		$sid = $Session_Manager->get_custom_SID();
		$Session_Object = $Session_Manager->get_Session_Object($request);
		$search_username = $request->input('username');
		$Session_Object = (array) $Session_Object;
		$username = $Session_Object[0]['username'];

		//var_dump($Session_Object); die();
		
		if(isset($search_username))
		{
			if(!empty($search_username))
			{
				$search_username = $Utility->Clean_Data($search_username);
			}
			else
			{
				throw new customValidationException("A valid username is required");
			}
		}
		else
		{
			throw new customValidationException("username required");
		}

		if(isset($username))
		{
			if(!empty($username))
			{
				$username=$Utility->Clean_Data($username);
			}
			else
			{
				throw new customValidationException("A valid username is required");
			}
		}
		else
		{
			throw new customValidationException("username required");
		}

		
		$password = openssl_decrypt($Session_Object[0]['password'], "AES256", $Session_Manager->encryption_key, $options = 0, $Session_Manager->initial_value);

		$user = $Session_Manager->getUser($username, $password, $search_username);
		
		return response()->json($user);
	}


	/**
	* Description: 
	*
	* @param - 
	*
	* @return (VOID) - 
	*/
    public function getUsers(Request $request)
	{
		//Variables
		$Session_Manager = new Session_Manager();
		$Utility = new Utility();
		$sid = $Session_Manager->get_custom_SID();
		$Session_Object = $Session_Manager->get_Session_Object($request);
		$Session_Object = (array) $Session_Object;
		$username = $Session_Object[0]['username'];

		if(isset($username))
		{
			if(!empty($username))
			{
				$username=$Utility->Clean_Data($username);
			}
			else
			{
				throw new customValidationException("A valid username is required");
			}
		}
		else
		{
			throw new customValidationException("username required");
		}

		
		$password = openssl_decrypt($Session_Object[0]['password'], "AES256", $Session_Manager->encryption_key, $options = 0, $Session_Manager->initial_value);

		$users = $Session_Manager->getUsers($username, $password);
		
		return response()->json($users);
	}
	
	
	/**
	* Description: 
	*
	* @param - 
	*
	* @return (VOID) - 
	*/
    public function postLogout(Request $request)
	{
		//Variables
		$Session_Manager = new Session_Manager();
		
		$logout_response = $Session_Manager->logout($request);
		
		return response()->json($logout_response);
	}
	
	
	/**
	* Description: 
	*
	* @param - 
	*
	* @return (VOID) - 
	*/
    public function getLoginStatus(Request $request)
	{
		//Variables
		$Session_Manager = new Session_Manager();
		
		$session_object = $Session_Manager->get_Session_Object($request);
		
		return response()->json($session_object);
	}
}