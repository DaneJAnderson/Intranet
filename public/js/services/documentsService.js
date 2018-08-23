App.service('documentsService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
    this.getDocumentTypes = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'document_types')
		   .success(
				function(data, status)
				{
					return deferred.resolve({"status":status, "data":data});
				}
			)
			.error(
				function(data, status)
				{
					return deferred.resolve({"status":status, "data":data});
				}
			);
		
		return deferred.promise; //return the promise
    }
	
	
	this.getDocumentByTypes = function (id)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'documents?type='+id)
		   .success(
				function(data, status)
				{
					return deferred.resolve({"status":status, "data":data});
				}
			)
			.error(
				function(data, status)
				{
					return deferred.resolve({"status":status, "data":data});
				}
			);
		
		return deferred.promise; //return the promise
    }
	
}]);