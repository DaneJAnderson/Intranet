App.controller('homeController', ['$scope', '$http', '$rootScope', 'articleService', function($scope, $http, $rootScope, articleService)
{
	$rootScope.utilityService.console_log("START - homeController");

	/*[Description]*/


	/*[Variables]*/
	$scope.Articles = [];



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
	
	
	
	/*_____________________________________________________________________________________________________________________________________*/

	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables


		$scope.getLastestArticles();
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - homeController");
}]);