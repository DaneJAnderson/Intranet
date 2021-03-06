
App.service('documentsService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
    this.getDocumentTypes = function ()
	{
		var deferred = $q.defer();
		
		
		$http.get(APP_Config.App_API_URL+'document_types')
		   //.success(
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
		console.log(deferred.promise);
		return deferred.promise; //return the promise
    };
	
	
	this.getDocumentByTypes = function (id)
	{
		var deferred = $q.defer();			
		
		$http.get(APP_Config.App_API_URL+'documents?type='+id)
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


    this.getDocumentBySubTypes = function (id, type)
	{
		var deferred = $q.defer();
		 

		$http.get(APP_Config.App_API_URL+'documents_by_subtypes?type='+id+'&subtype='+type)
		   .then(
				function(data, status)
				{
					return deferred.resolve({"status":data.status, "data":data.data});
				}
			)
			.error(
				function(data)
				{
					return deferred.resolve({"status":data.status, "data":data.data});
				}
			);
		
		return deferred.promise; //return the promise
    };
	
}]);







	 	
	 //$http.defaults.headers.common["Content-Type"] = "text/plain";
	 //$http.defaults.headers.common["Access-Control-Allow-Origin"] =  "*" ;