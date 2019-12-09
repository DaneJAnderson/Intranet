App.service('userService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
	/*[Description]*/
	/*Provides services for the user such as login in an out, etc.*/
	
	/*[Attributes]*/
	//this.Amount = null;
	
	/*[Methods]*/

	/**
	*	@Description:	
	*
	*	@param:	user_id (Integer) - The user id
	*
	*	@return: 
	*/
    /*this.test = function ()
	{
		this.Amount = 0;
		this.Value = 0;
	}*/
	

	/**
	*	@Description:	Gets users login information 
	*
	*	@param:	username (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object
	*/
	this.getLoginStatus = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'login_status')
		     .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.status});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.status});
						}
				    );
		
		return deferred.promise; //return the promise
    }


    /**
	*	@Description:	Logs out a user 
	*
	*	@param:	 (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object
	*/
	this.postLogOut = function ()
	{
		var deferred = $q.defer();
		
		$http.post(APP_Config.App_API_URL+'logout', "",
					{
						withCredentials: true,
						headers:
						{
							'Content-Type': undefined
						}
					})
			 .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					)
		     .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				   );
		
		return deferred.promise; //return the promise
    }



	/**
	*	@Description:	Send log in request 
	*
	*	@param:	username (String) - The username
	*	@param:	password (String) - The password
	*
	*	@return: result (Boolean)/(JSON Object) - True of the log in was sucessful or JSON obection with the error message.
	*/
    this.postLogIn = function (username, password)
	{
		var deferred = $q.defer();
		var Form_Data_Object = new FormData();
		Form_Data_Object.append('username', username);
		Form_Data_Object.append('password', password);
		
		$http.post(APP_Config.App_API_URL+'login', Form_Data_Object,
					{
						withCredentials: true,
						headers:
						{
							'Content-Type': undefined
						}
					})
			 .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					)
		     .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				   );
		
		return deferred.promise; //return the promise
    }


    /**
	*	@Description:	Get user info 
	*
	*	@param:	 (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object or NULL
	*/
	this.getUserInfo = function (username)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'getUser?username='+username)
		     .then(
						function(data, status)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				    );
		
		return deferred.promise; //return the promise
    }


     /**
	*	@Description:	Get user info 
	*
	*	@param:	 (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object or NULL
	*/
	this.getUsersInfo = function (username)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'getUsers')
		     .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				    );
		
		return deferred.promise; //return the promise
    }


    /**
	*	@Description:	Get user info 
	*
	*	@param:	 (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object or NULL
	*/
	this.getLoggInUserInfo = function (username)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'login_status')
		     .then(
						function(data, status)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				    );
		
		return deferred.promise; //return the promise
    }


    /**
	*	@Description:	Get user info along with all licenses that this user holds
	*
	*	@param:	 (Void) - 
	*
	*	@return: result (JSON Object) - User Session Object or NULL
	*/
	this.getLicenseUserReport = function (username)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'getLicenseUserReportByUsername?username='+username)
		     .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				    );
		
		return deferred.promise; //return the promise
    }


    /**
	*	@Description:	Gets users with current birthdays
	*
	*	@param:	username (Void) - 
	*
	*	@return: result (JSONARRAY) - Users
	*/
	this.getCurrentBirthdays = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'current_birthdays')
		     .then(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
					  )
		   	  .catch(
						function(data)
						{
							return deferred.resolve({"status":data.status, "data":data.data});
						}
				    );
		
		return deferred.promise; //return the promise
    }
	
	
}]);