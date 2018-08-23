App.service('articleService', ['$http', '$q', 'APP_Config', function($http, $q, APP_Config)
{
	/*[Description]*/
	/*Provides services for the user such as login in an out, etc.*/
	
	/*[Attributes]*/
	//this.Amount = null;
	
	/*[Methods]*/

	/**
	*	@Description:	Request the lasted articles
	*
	*	@param:	(Void) - 
	*
	*	@return: result (JSONARRAY) - top 10 of the lastest articles.
	*/
	this.getLastestArticles = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'last_articles')
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
	this.getArticleByID = function (article_id)
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
    }
		

	/**
	*	@Description:	Gets all active licenses
	*
	*	@param:	(Void) - 
	*
	*	@return: result (JSONARRAY) - list of featured videosallm active licenses
	*/
	/*this.getAllLicenses = function ()
	{
		var deferred = $q.defer();
		
		$http.get(APP_Config.App_API_URL+'getAllLicenses')
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