<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Staff_Details;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// use App\Http\Requests;

class domainConnectController extends Controller
{
    
    function logIn(Request $request)
    {
        
        $auth = $request->only(['username','password']);
           
        $Admins = new Staff_Details();

        $admin_groups = $Admins->getAdmin(); 

        if( $auth["username"] && $auth["password"])
        {
            $res =  $this->checkLogin($auth["username"], $auth["password"], $admin_groups);
             return $res;
        }            
        
    }


    // ------------------------------------------ Begin LDAP ----------------------// 
	function checkLogin($username, $password, $admin_groups)
	{
        
        //Variables
        $hostname = "192.168.110.18";
		$results_response = false;
		$Members = array();        
        
        $ldap_connection = ldap_connect($hostname)or die("Could not connect to LDAP server.");
        

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
    
    		// 
    
			if (TRUE === ldap_bind($ldap_connection, "COK\\".$username, $password))
			{
				$ldap_base_dn = 'DC=cokcu,DC=local';
				$search_filter = '(&(objectCategory=person)(samaccountname=*))'; 
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
					
					//  return response()->json(array($username,$password));
					
					for ($x=0; $x<$entries['count']; $x++)
					{
						if (!empty($entries[$x]['givenname'][0]) && !empty($entries[$x]['dn'][0]) && !empty($entries[$x]['sn'][0]) && !empty($entries[$x]['mail'][0])  && !empty($entries[$x]['memberof'][0]) )
						{
					$ad_users[strtoupper( trim($entries[$x]['samaccountname'][0]))] = 
					array(
					'email' => strtolower(trim($entries[$x]['mail'][0])),
					'first_name' => trim($entries[$x]['givenname'][0]),
					'last_name' => trim($entries[$x]['sn'][0]));
	
				     $Member = array(
					'username' => trim($entries[$x]['samaccountname'][0]),
					'email'=> trim($entries[$x]['mail'][0]),
					'first_name'=> trim($entries[$x]['givenname'][0]),
					'last_name'=>  trim($entries[$x]['sn'][0]),
					'Roles'=> $entries[$x]['memberof'],
					'Branches'=> $entries[$x]['dn']);

							array_push($Members, $Member);
							
						}
					}
				}
				ldap_unbind($ldap_connection); // Clean up after ourselves.
			}
			else
			{
				return 0;
			}
			
			 

			foreach($Members as $Member)
			{
				

				if($Member["username"] == $username)
				{					

					$results_response = true;
					
					$role = 0;
					
					if(count($Member["Roles"])>0)
					{
						for($a = 0; $a <= count($Member["Roles"])-1; $a++)
						{
							
							 for($c = 1; $c < count($admin_groups); $c++)
							//for($c = count($admin_groups); $c < -1; $c--)
							{
								$userRole = explode(',',$Member["Roles"]["".$a.""]);
								$roles = explode(',',$admin_groups[$c]->Domain_Controller);

								

								

								if($userRole[0] == $roles[0])
								//if(strpos($admin_groups[$c]["Domain_Controller"], $Member["Roles"]["".$a.""])!==false)
								{  

									 return response()->json(['auth'=>1,'status'=>200]);

								
									if(intval($admin_groups[$c]->access_level)>$role)
									// if(intval($admin_groups[$c]["access_level"])>$role)
									{
										
										$role = intval($admin_groups[$c]->access_level);
										
									}
								}

							}
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

					return 1;
				}
			}
		}
		

		return 0;
	}





}
