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
		var page = '';
		
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
    };


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
    };


    /**
	*	@Description:	Gets users with current birthdays
	*
	*	@param:	username (Void) - 
	*
	*	@return: result (JSONARRAY) - Users
	*/

/*
	DANE Birthday Staff
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
	};
	
	this.getAllStaff = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'birthday_staff_manager')
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
	};

	// Post Data to Staff Birthday staff_details.status table 

	// --------------------- Update Status ------------------------------ //

	this.updateStatus = function (id, status)
	{
		var deferred = $q.defer();

	 var headers =  { 'Content-Type' : 'application/json' };
	 data = {'id': id, 'status': status};
	$http.post(APP_Config.App_API_URL+'updatestatus', data, headers)
		.then(
			function(data, status)
			{
				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(
			function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};
	// --------------------- Update Status ------------------------------ //

	this.updateSuggestion = function (id)
	{
		var deferred = $q.defer();

	 var headers =  { 'Content-Type' : 'application/json' };
	 data = {'id': id};
	$http.post(APP_Config.App_API_URL+'suggestionbox/updates', data, headers)
		.then(
			function(data, status)
			{
				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(
			function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};
	
// ------------------------- Edit Birthday Staff ----------------------- //

	this.editBdayStaff = function (staff)
	{
		var deferred = $q.defer();

		var headers =  {  
			headers: {'Content-Type': undefined },
			transformRequest: angular.identity }; // Needed to Upload files to Server.
	$http.post(APP_Config.App_API_URL+'edit_bday_staff', staff, headers)
		.then(function(data, status)
			{			
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};
	
// ------------------------- Create Birthday Staff ----------------------- //

	this.createBdayStaff = function (Data)
	{
		var deferred = $q.defer();

 	var headers =  {  
        headers: {'Content-Type': undefined },
		transformRequest: angular.identity }; // Needed to Upload files to Server.
		
	$http.post(APP_Config.App_API_URL+'create_bday_staff', Data, headers)
		.then(function(data, status)
			{			
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};
	
	// ------------------------- Delete Birthday Staff ----------------------- //
	this.retrieveBdayStaff = function (id)
	{
		var deferred = $q.defer();

 	var headers =  { 'Content-Type' : 'application/json' };
	$http.post(APP_Config.App_API_URL+'retrieve_bday_staff', {'id': id}, headers)
		.then(function(data, status)
			{				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};

	this.suggestion = function (subject, suggestion) {
		
		var deferred = $q.defer();

 	var headers =  { 'Content-Type' : 'application/json' };
	$http.post(APP_Config.App_API_URL+'suggestionbox/creates', {'subject':subject, 'suggestion': suggestion}, headers)
		.then(function(data, status)
			{				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise;
	};

	this.getSuggestions = function () {
		
		var deferred = $q.defer();

 	var headers =  { 'Content-Type' : 'application/json' };
	$http.get(APP_Config.App_API_URL+'suggestionbox/retrieves', headers)
		.then(function(data, status)
			{				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise;
	};

	
	this.loginBdayStaff = function (auth)
	{
		var deferred = $q.defer();

	 var headers =  { 'Content-Type' : 'application/json' };
	 
	 var Form_Data_Object = new FormData();
	 Form_Data_Object.append('username', auth.username);
	 Form_Data_Object.append('password', auth.password);

	
	 // Test login To be removed.
	// return {'auth':1,'status':200};
	  
	 $http.post(APP_Config.App_API_URL+'domainconnect', Form_Data_Object,
	 {
		 withCredentials: true,
		 headers:
		 {
		 'Content-Type': undefined
		 },transformRequest: angular.identity 
	 }).then(function(data, status)
			{				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				sweetAlert("Oops...", "Username and Password incorrect", "warning");
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise; //return the promise
	};
	


	//-------------------------- Suggestion-Box Response Button --------------------------//

	this.sentSuggestionResponse = function (id, response) {
		
		var deferred = $q.defer();

	//	console.log(response);

 	var headers =  { 'Content-Type' : 'application/json' };
	$http.post(APP_Config.App_API_URL+'suggestionbox/suggest_response',{'id':id, 'response':response}, headers)
		.then(function(data, status)
			{				
				return deferred.resolve({"status":status, "data":data.data});
			}
		)
		.catch(function(data, status)
			{
				return deferred.reject({"status":status, "data":data.data});
			}
		);
		
		return deferred.promise;

			// return {"data": 'test response'};

	};

	
}]);