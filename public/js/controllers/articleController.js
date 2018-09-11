App.controller('articleController', ['$scope', '$http', '$rootScope', 'articleService', function($scope, $http, $rootScope, articleService)
{
	$rootScope.utilityService.console_log("START - articleController");

	/*[Description]*/


	/*[Variables]*/
	$scope.Articles = [];
	$scope.Article = {};


	/*[Methods]*/
	
	/**
	*	@Description: Get top 10 lastest articles
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getLastestArticles = function ()
	{
		$rootScope.utilityService.console_log("START - getLastestArticles");
		
		articleService.getLastestArticles().then(function(data)
		{
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$scope.Articles = data.data;
			}
			else if(data.status == 419)
			{
				//sweetAlert("Oops...", ""+data.data.Error, "warning");
			}
			else
			{
				//sweetAlert("Oops...", "An unexpect error occured, our engineers will be working to get it resolved. Please try again later", "error");
			}
		});
		
		$rootScope.utilityService.console_log("STOP - getLastestArticles");
	}


	/**
	*	@Description: Get Distinct License User
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getArticleByID = function (article_id)
	{
		$rootScope.utilityService.console_log("START - getArticleByID");
		
		articleService.getArticleByID(article_id).then(function(data)
		{
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$scope.Article = data.data;

				$('#article_content').html(data.data.content);
				//$('#article_content').html($('#article_content').text());
			}
			else if(data.status == 419)
			{
				sweetAlert("Oops...", ""+data.data.Error, "warning");
			}
			else
			{
				sweetAlert("Oops...", "An unexpect error occured, our engineers will be working to get it resolved. Please try again later", "error");
			}
		});
		
		$rootScope.utilityService.console_log("STOP - getArticleByID");
	}
	
	
	
	/*_____________________________________________________________________________________________________________________________________*/

	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables


		$scope.getLastestArticles();
		$scope.getArticleByID($scope.id);
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - homeController");
}]);