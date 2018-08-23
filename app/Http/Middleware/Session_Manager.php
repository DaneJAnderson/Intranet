<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Models\Utility;
use App\Exceptions\customValidationException;

class Session_Manager
{
	var $app_name = "COK_License_Manager";
	var $signedIn=false;
	var $sessionId="";
	var $sid="";
	var $date;//current date
	var $time;//current time(should be date and time)
	var $last_access_time;//last_access_time
	var $failed;//stores whether login was failed
	var $id;//stores logged in member/user id
	var $cookiename="COK_Meeting";//default cookie name if not set from $_SESSION['cookiename']
	var $session_expiry=900; //set to 15 mins 900
	//DB variables
	var $db_servername = "";
	var $db_username = "";
	var $db_password = "";
	var $db_name =  "";
	//LDAP seetings
	var $hostname = "192.168.110.18";
	var $encryption_key = "c61cb6eaeafdd46e648018a54236300b";
	var $initial_value  = "c61cb6eaeafdd46e";


	public function __construct()
	{
		$this->date			= gmdate("Y-m-d", time());
		$this->time			= date("H:i:s A",time());
		$this->sessionId	= $this->app_name."_".\Session::getId();
		$this->sid = $this->sessionId;
	}
	
	
	 /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		//Perform Action
		$logged = $this->checkSession($request);

		if($logged===false)
		{
			if($request->is('API/*'))
			{
				throw new customValidationException("Please log in");
			}
			else
			{
				return redirect('login');
			}
		}
		else
		{
			$sid = $this->get_custom_SID();
		}
		
		//Complete user request
        return $next($request);
    }
	
	
	/*
	Initializes session defaults
	*/
	function sessionDefaults()
	{
		$sid = $this->sessionId;
		
		$_SESSION[$sid]['user_id']=NULL;
		$_SESSION[$sid]['username']='Guest';
		$_SESSION[$sid]['first_name']='Guest';
		$_SESSION[$sid]['last_name']='Guest';
		$_SESSION[$sid]['email']=NULL;
		$_SESSION[$sid]['branch_id']=0;
		$_SESSION[$sid]['role_id']=0;
		$_SESSION[$sid]['logged']=false;
	}


	/** -Gavin Palmer || March 2016
	*	@Description:	checks if a sesion is set, and return a boolean for the result.
	*	
	*	@param void
	*
	*	@return (boolean)$request->session()->get('key', 'default');
	*/
	function checkSession($request)
	{
		$sid = $this->sessionId;
		
		if($request->session()->has($sid))
		{
			$Session_Object = $request->session()->get($sid);
			
			if($Session_Object[0]['logged']===true)
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


	/** -Gavin Palmer || March 2016
	*  @Discription: check username and password for giving access and sets the session variables if the 
	*  the infromation is correct. additionally the function will return a boolean for the attempt.
	* 
	*  @param (String) $username - Supplied username
	*  @param (String) $password - Supplied password
	*
	*  @return (boolean) 
	*/
	function checkLogin($request, $username, $password, $admin_groups, $user_roles)
	{
		//Variables
		$results_response = false;
		$Members = array();
		//$this->setSession($row["id"], $row["username"], $row["role"]);
		//$this->failed = true;
		
		$ldap_connection = ldap_connect($this->hostname);
		if (FALSE === $ldap_connection)
		{
			$line_items = array();
			$line_item = array('Error' => "Unable to connect to server");
			array_push($line_items, $line_item);
			$json_encoded_out = json_encode($line_items);
			return $json_encoded_out;
			
		}
		else
		{
			// We have to set this option for the version of Active Directory we are using.
			ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
			ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.
			
			//echo "COK\\".$username."-".$password;die();
			if (TRUE === ldap_bind($ldap_connection, "COK\\".$username, $password))
			{
				$ldap_base_dn = 'DC=cokcu,DC=local';
				$search_filter = '(&(objectCategory=person)(samaccountname=*))'; //(&(objectCategory=person)(samaccountname=*))
				$attributes = array();
				$attributes[] = 'givenname';
				$attributes[] = 'mail';
				$attributes[] = 'samaccountname';
				$attributes[] = 'sn';
				$attributes[] = 'memberOf';
				$attributes[] = 'OU';
				$attributes[] = 'dc';
				$result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter, $attributes);
				if (FALSE !== $result)
				{
					$entries = ldap_get_entries($ldap_connection, $result);
					//var_dump($entries); die();
					//echo json_encode($entries); die();
					for ($x=0; $x<$entries['count']; $x++)
					{
						//echo $x."<br/>";
						//var_dump($entries[$x]); //die();
						//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
						//echo json_encode($entries[$x]); die();
						/*if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						{
							$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array('email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0]));
							$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
							array_push($Members, $Member);
							//$roles = explode(",", strtolower(trim($entries[$x]['memberOf'])));
						}*/

						//Updated March 2018
						//if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						
						if (!isset($entries[$x]['givenname']))
						{
							$entries[$x]['givenname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['givenname']))
							{
								$entries[$x]['givenname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['mail']))
						{
							$entries[$x]['mail'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['mail']))
							{
								$entries[$x]['mail'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['samaccountname']))
						{
							$entries[$x]['samaccountname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['samaccountname']))
							{
								$entries[$x]['samaccountname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['sn']))
						{
							$entries[$x]['sn'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['sn']))
							{
								$entries[$x]['sn'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['memberof']))
						{
							$entries[$x]['memberof'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['memberof']))
							{
								$entries[$x]['memberof'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['OU']))
						{
							$entries[$x]['OU'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['OU']))
							{
								$entries[$x]['OU'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['dc']))
						{
							$entries[$x]['dc'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['dc']))
							{
								$entries[$x]['dc'] = array("0"=>"");
							}
						}

						
						//echo json_encode($entries[$x]); die();

						$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array(/*'email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0])*/);
						$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
						array_push($Members, $Member);
					}
				}
				//ldap_unbind($ldap_connection); // Clean up after ourselves.
			}
			else
			{
				return 0;
			}
			
			//$Members = json_encode($Members);
			
			foreach($Members as $Member)
			{
				//var_dump($Member);
				//echo "[".$Member["username"]."]<br/>";
				if($Member["username"] == $username)
				{
					$results_response = true;
					//var_dump($Member);
					
					$admin_group_id = 0;
					if(count($Member["Roles"])>0)
					{
						for($a = 0; $a <= count($Member["Roles"])-2; $a++)
						{
							//echo "Role: ".$a;
							//Set role code
							for($c = 0; $c < count($admin_groups); $c++)
							{
								//echo "admin grounp: ".$c;
								//var_dump($admin_groups[$c]);
								//var_dump($Member["Roles"]["".$a.""]);
								//echo "=>";
								//var_dump($admin_groups[$c]["Domain_Controller"]);
								//var_dump(strpos("mmm".$admin_groups[$c]["Domain_Controller"],$Member["Roles"]["".$a.""]));

								if(strpos($admin_groups[$c]["Domain_Controller"], $Member["Roles"][$a])!==false)
								{
									//echo "[true]<br/>______________<br/>";
									if(intval($admin_groups[$c]["access_level"])>$admin_group_id)
									{
										$admin_group_id = intval($admin_groups[$c]["access_level"]);
									}
								}
								else
								{
									//echo "[false]<br/>______________<br/>";
								}
							}
						}
					}

					if($admin_group_id==0)
					{
						$this->setSession($request, NULL, "Guest", "Guest", "Guest", NULL, 0, 0, 0, 0);
						throw new customValidationException("You do not have access to this application. Please contact your administrator.");
					}


					$role_id = 0;
					if(count($user_roles)>0)
					{
						$role_id = $user_roles[0]->{'role_id'};
					}

					
					$branch_id = 0;
					if(count($Member["Branches"])>0)
					{
						if(strpos($Member["Branches"],"OU=MIS Staff")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Head Office")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Cross Roads")!=false)
						{
							$branch_id = 1;
						}
					}

					$password = openssl_encrypt($password, "AES256", $this->encryption_key, $options = 0, $this->initial_value);
					
					$this->setSession($request, NULL, $Member["username"], $Member["first_name"], $Member["last_name"], NULL, $branch_id, $admin_group_id, $password, $role_id);
					return 1;
				}
			}
		}
		
		$this->setSession($request, NULL, "Guest", "Guest", "Guest", NULL, 0, 0, 0, 0);
		return 0;
	}


	/** -Gavin Palmer || March 2016
	*  @Discription: This is a simple LDAP login check to see id the username and password matches
	* 
	*  @param (String) $username - Supplied username
	*  @param (String) $password - Supplied password
	*
	*  @return (boolean) 
	*/
	function simpleLogIn($username, $password)
	{
		//Variables
		//$this->failed = true;
		
		$ldap_connection = ldap_connect($this->hostname);
		if (FALSE === $ldap_connection)
		{
			$line_items = array();
			$line_item = array('Error' => "Unable to connect to server");
			array_push($line_items, $line_item);
			$json_encoded_out = json_encode($line_items);
			return $json_encoded_out;
		}
		else
		{
			// We have to set this option for the version of Active Directory we are using.
			ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
			ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.
			
			if (TRUE === ldap_bind($ldap_connection, $this->ldap_username, $this->ldap_password))
			{
				return true;
				ldap_unbind($ldap_connection); // Clean up after ourselves.
			}
			else
			{
				return false;
			}
		}
		return false;
	}


	/** -Gavin Palmer || March 2018
	*  @Discription: Get active Directory user 
	* 
	*  @param (String) $username - Supplied username
	*  @param (String) $password - Supplied password
	*  @param (String) $search_username - The  user being searched for.
	*
	*  @return (JSON Object) 
	*/
	function getUser($username, $password, $search_username)
	{
		//Variables
		$results_response = false;
		$Members = array();
		//$this->setSession($row["id"], $row["username"], $row["role"]);
		//$this->failed = true;
		
		$ldap_connection = ldap_connect($this->hostname);
		if (FALSE === $ldap_connection)
		{
			$line_items = array();
			$line_item = array('Error' => "Unable to connect to server");
			array_push($line_items, $line_item);
			$json_encoded_out = json_encode($line_items);
			return $json_encoded_out;
			
		}
		else
		{
			// We have to set this option for the version of Active Directory we are using.
			ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
			ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.
			
			//echo "COK\\".$username."-".$password;die();
			if (TRUE === ldap_bind($ldap_connection, "COK\\".$username, $password))
			{
				$ldap_base_dn = 'DC=cokcu,DC=local';
				$search_filter = '(&(objectCategory=person)(samaccountname=*))'; //(&(objectCategory=person)(samaccountname=*))
				$attributes = array();
				$attributes[] = 'givenname';
				$attributes[] = 'mail';
				$attributes[] = 'samaccountname';
				$attributes[] = 'sn';
				$attributes[] = 'memberOf';
				$attributes[] = 'OU';
				$attributes[] = 'dc';
				$result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter, $attributes);
				if (FALSE !== $result)
				{
					$entries = ldap_get_entries($ldap_connection, $result);
					//var_dump($entries); die();
					//echo json_encode($entries); die();
					for ($x=0; $x<$entries['count']; $x++)
					{
						//echo $x."<br/>";
						//var_dump($entries[$x]); //die();
						//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
						//echo json_encode($entries[$x]); die();
						/*if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						{
							$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array('email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0]));
							$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
							array_push($Members, $Member);
							//$roles = explode(",", strtolower(trim($entries[$x]['memberOf'])));
						}*/

						//Updated March 2018
						//if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						
						if (!isset($entries[$x]['givenname']))
						{
							$entries[$x]['givenname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['givenname']))
							{
								$entries[$x]['givenname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['mail']))
						{
							$entries[$x]['mail'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['mail']))
							{
								$entries[$x]['mail'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['samaccountname']))
						{
							$entries[$x]['samaccountname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['samaccountname']))
							{
								$entries[$x]['samaccountname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['sn']))
						{
							$entries[$x]['sn'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['sn']))
							{
								$entries[$x]['sn'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['memberof']))
						{
							$entries[$x]['memberof'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['memberof']))
							{
								$entries[$x]['memberof'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['OU']))
						{
							$entries[$x]['OU'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['OU']))
							{
								$entries[$x]['OU'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['dc']))
						{
							$entries[$x]['dc'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['dc']))
							{
								$entries[$x]['dc'] = array("0"=>"");
							}
						}

						
						//echo json_encode($entries[$x]); die();

						$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array(/*'email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0])*/);
						$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
						array_push($Members, $Member);
					}
				}
				ldap_unbind($ldap_connection); // Clean up after ourselves.
			}
			else
			{
				return 0;
			}
			
			//$Members = json_encode($Members);
			
			foreach($Members as $Member)
			{
				//var_dump($Member);
				//echo "[".$Member["username"]."]<br/>";
				if($Member["username"] == $search_username)
				{
					$results_response = true;
					//var_dump($Member);
					
					$role = 0;
					if(count($Member["Roles"])>0)
					{
						for($a = 0; $a <= count($Member["Roles"])-2; $a++)
						{
							//echo "Role: ".$a;
							//Set role code
							/*for($c = 0; $c < count($admin_groups); $c++)
							{
								//echo "admin grounp: ".$c;
								//var_dump($admin_groups[$c]);
								//var_dump($Member["Roles"]["".$a.""]);
								//echo "=>";
								//var_dump($admin_groups[$c]["Domain_Controller"]);
								//var_dump(strpos("mmm".$admin_groups[$c]["Domain_Controller"],$Member["Roles"]["".$a.""]));

								if(strpos($admin_groups[$c]["Domain_Controller"], $Member["Roles"][$a])!==false)
								{
									//echo "[true]<br/>______________<br/>";
									if(intval($admin_groups[$c]["access_level"])>$role)
									{
										$role = intval($admin_groups[$c]["access_level"]);
									}
								}
								else
								{
									//echo "[false]<br/>______________<br/>";
								}
							}*/
						}
					}
					
					$branch_id = 0;
					if(count($Member["Branches"])>0)
					{
						if(strpos($Member["Branches"],"OU=MIS Staff")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Head Office")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Cross Roads")!=false)
						{
							$branch_id = 1;
						}
					}

					//$password = openssl_encrypt($password, "AES256", $this->encryption_key, $options = 0, $this->initial_value);
					
					//$this->setSession(NULL, $Member["username"], $Member["first_name"], $Member["last_name"], NULL, $branch_id, $role, );
					return $Member;
				}
			}
		}
		
		throw new customValidationException("User not found");
	}


	/** -Gavin Palmer || March 2018
	*  @Discription: Get active Directory user 
	* 
	*  @param (String) $username - Supplied username
	*  @param (String) $password - Supplied password
	*  @param (String) $search_username - The  user being searched for.
	*
	*  @return (JSON Object) 
	*/
	function getUsers($username, $password)
	{
		//Variables
		$results_response = false;
		$Members = array();
		//$this->setSession($row["id"], $row["username"], $row["role"]);
		//$this->failed = true;
		
		$ldap_connection = ldap_connect($this->hostname);
		if (FALSE === $ldap_connection)
		{
			$line_items = array();
			$line_item = array('Error' => "Unable to connect to server");
			array_push($line_items, $line_item);
			$json_encoded_out = json_encode($line_items);
			return $json_encoded_out;
			
		}
		else
		{
			// We have to set this option for the version of Active Directory we are using.
			ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
			ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0); // We need this for doing an LDAP search.
			
			//echo "COK\\".$username."-".$password;die();
			if (TRUE === ldap_bind($ldap_connection, "COK\\".$username, $password))
			{
				$ldap_base_dn = 'DC=cokcu,DC=local';
				$search_filter = '(&(objectCategory=person)(samaccountname=*))'; //(&(objectCategory=person)(samaccountname=*))
				$attributes = array();
				$attributes[] = 'givenname';
				$attributes[] = 'mail';
				$attributes[] = 'samaccountname';
				$attributes[] = 'sn';
				$attributes[] = 'memberOf';
				$attributes[] = 'OU';
				$attributes[] = 'dc';
				$result = ldap_search($ldap_connection, $ldap_base_dn, $search_filter, $attributes);
				if (FALSE !== $result)
				{
					$entries = ldap_get_entries($ldap_connection, $result);
					//var_dump($entries); die();
					//echo json_encode($entries); die();
					for ($x=0; $x<$entries['count']; $x++)
					{
						//echo $x."<br/>";
						//var_dump($entries[$x]); //die();
						//echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
						//echo json_encode($entries[$x]); die();
						/*if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						{
							$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array('email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0]));
							$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
							array_push($Members, $Member);
							//$roles = explode(",", strtolower(trim($entries[$x]['memberOf'])));
						}*/

						//Updated March 2018
						//if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) //&& !empty($entries[$x]['mail'][0]) && !empty($entries[$x]['samaccountname'][0]) && !empty($entries[$x]['sn'][0]) && 'Shop' !== $entries[$x]['sn'][0] && 'Account' !== $entries[$x]['sn'][0])
						
						if (!isset($entries[$x]['givenname']))
						{
							$entries[$x]['givenname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['givenname']))
							{
								$entries[$x]['givenname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['mail']))
						{
							$entries[$x]['mail'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['mail']))
							{
								$entries[$x]['mail'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['samaccountname']))
						{
							$entries[$x]['samaccountname'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['samaccountname']))
							{
								$entries[$x]['samaccountname'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['sn']))
						{
							$entries[$x]['sn'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['sn']))
							{
								$entries[$x]['sn'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['memberof']))
						{
							$entries[$x]['memberof'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['memberof']))
							{
								$entries[$x]['memberof'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['OU']))
						{
							$entries[$x]['OU'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['OU']))
							{
								$entries[$x]['OU'] = array("0"=>"");
							}
						}

						if (!isset($entries[$x]['dc']))
						{
							$entries[$x]['dc'] = array("0"=>"");
						}
						else
						{
							if (empty($entries[$x]['dc']))
							{
								$entries[$x]['dc'] = array("0"=>"");
							}
						}

						
						//echo json_encode($entries[$x]); die();

						$ad_users[strtoupper(trim($entries[$x]['samaccountname'][0]))] = array(/*'email' => strtolower(trim($entries[$x]['mail'][0])),'first_name' => trim($entries[$x]['givenname'][0]),'last_name' => trim($entries[$x]['sn'][0]),'last_name' => trim($entries[$x]['sn'][0])*/);
						$Member = array('username' => trim($entries[$x]['samaccountname'][0]), 'email'=> trim($entries[$x]['mail'][0]), 'first_name'=>trim($entries[$x]['givenname'][0]), 'last_name'=> trim($entries[$x]['sn'][0]), 'Roles'=> $entries[$x]['memberof'], 'Branches'=> $entries[$x]['dn']);
						array_push($Members, $Member);
					}
				}
				ldap_unbind($ldap_connection); // Clean up after ourselves.
			}
			else
			{
				return 0;
			}
			
			//$Members = json_encode($Members);
			
			foreach($Members as $Member)
			{
				//var_dump($Member);
				//echo "[".$Member["username"]."]<br/>";
				//if($Member["username"] == $search_username)
				//{
					$results_response = true;
					//var_dump($Member);
					
					$role = 0;
					if(count($Member["Roles"])>0)
					{
						for($a = 0; $a <= count($Member["Roles"])-2; $a++)
						{
							//echo "Role: ".$a;
							//Set role code
							/*for($c = 0; $c < count($admin_groups); $c++)
							{
								//echo "admin grounp: ".$c;
								//var_dump($admin_groups[$c]);
								//var_dump($Member["Roles"]["".$a.""]);
								//echo "=>";
								//var_dump($admin_groups[$c]["Domain_Controller"]);
								//var_dump(strpos("mmm".$admin_groups[$c]["Domain_Controller"],$Member["Roles"]["".$a.""]));

								if(strpos($admin_groups[$c]["Domain_Controller"], $Member["Roles"][$a])!==false)
								{
									//echo "[true]<br/>______________<br/>";
									if(intval($admin_groups[$c]["access_level"])>$role)
									{
										$role = intval($admin_groups[$c]["access_level"]);
									}
								}
								else
								{
									//echo "[false]<br/>______________<br/>";
								}
							}*/
						}
					}
					
					$branch_id = 0;
					if(count($Member["Branches"])>0)
					{
						if(strpos($Member["Branches"],"OU=MIS Staff")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Head Office")!=false)
						{
							$branch_id = 1;
						}
							
						if(strpos($Member["Branches"],"OU=Cross Roads")!=false)
						{
							$branch_id = 1;
						}
					}

					//$password = openssl_encrypt($password, "AES256", $this->encryption_key, $options = 0, $this->initial_value);
					
					//$this->setSession(NULL, $Member["username"], $Member["first_name"], $Member["last_name"], NULL, $branch_id, $role, );
					return $Members;
				//}
			}
		}
		
		return array();
	}
	

	
	/**
	*  @Discription: Sets the session variabble for user an array
	*
	*  @param (String) $username - Username
	*  @param (Integer) $role - Role, the access level of user
	*
	*  @return (Void) 
	*/
	function setSession($request, $user_id, $username, $first_name, $last_name, $email, $branch_id, $admin_group_id, $password, $role_id)
	{
		$sid = $this->sessionId;
		$sesson_details = array('user_id' => intval($user_id), 'username' => $username, 'first_name'=>$first_name, 'last_name'=>$last_name, 'email'=>$email, 'branch_id'=> $branch_id, 'role_id' => intval($role_id), 'admin_group_id' => intval($admin_group_id), 'logged' => true, 'password' => $password);
		$request->session()->flush();
		$_SESSION[$sid] = $sesson_details;
		$request->session()->push($sid, $sesson_details);
	}
	
	
	/**
	*	@Description:	Logout a user, removes there session and  restarts the session timer
	*
	*	@param (Void)
	*
	*	@return (Void) 
	*/
	function logout($request)
	{
		$sid = $this->sessionId;
		$request->session()->flush();
	}
	
	
	/**
	*	@Description:
	*
	*	@param (Void)
	*
	*	@return (Void) 
	*/
	function get_custom_SID()
	{
		return $this->sessionId;
	}
	
	
	/**
	*	@Description:
	*
	*	@param (Void)
	*
	*	@return (Void) 
	*/
	function get_Session_Object($request)
	{
		$Session_Object = $request->session()->get($this->sessionId);
		$Session_Object = (Object)($Session_Object);
		return $Session_Object;
	}
}
