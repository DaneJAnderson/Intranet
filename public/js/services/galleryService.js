App.service('galleryService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
	/*[Description]*/
	/*Provides services for the user such as login in an out, etc.*/
	
	/*[Attributes]*/
	//this.Amount = null;
	
	/*[Methods]*/

	/**
	*	@Description:	Request all active galleries
	*
	*	@param:	(Void) - 
	*
	*	@return: result (JSONARRAY) - Galleries
	*/
	this.getGalleries = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'galleries')
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


	/**
	*	@Description:	Gets article by the article ID
	*
	*	@param:	(Integer) id - the ID number of the article
	*
	*	@return: result (JSONOBJECT) - The article
	*/
	/*this.getArticleByID = function (article_id)
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'article/'+article_id)
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
    }*/

}]);