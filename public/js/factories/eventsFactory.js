App.factory('events', ['$http','$q', 'APP_Config',function($http,$q, APP_Config)
{
	var events = {};//empty oject that will store multiple function
	
	//get all events
    events.getEvents = function()
	{
		  var deferred = $q.defer();
		  $http.get(APP_Config.App_API_URL+'events')
		  	   .success(
							function(data)
							{
								deferred.resolve(data);
							}
						)
			   .error(
					  		function()
							{
			   					return deferred.reject();
		  					}
					 );
		
		  return deferred.promise; //return the promise
    };
	
    return events; //return the event object
}]);