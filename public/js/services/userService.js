App.service('userService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
    /*Description*/
	/*Provide a set of user related functions and services*/
	
	/*Attributes*/
	//this.test;
	
	/*Methods*/
	
	/**
	* Description: Get the shipping addresses for the logged in client
	*
	* @param (Void): 
	*
	* @return (JSON) - Returns list of addresses
	*/
	this.getAddresses = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'addresses')
		     .success(
						function(data, status)
						{
							return deferred.resolve({"status":status, data});
						}
					  )
		   	  .error(
						function(data, status)
						{
							return deferred.resolve({"status":status, data});
						}
				    );
		
		return deferred.promise; //return the promise
    }
	
	
	
	
}]);