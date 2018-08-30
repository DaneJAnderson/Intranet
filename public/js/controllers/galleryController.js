App.controller('galleryController', ['$scope', '$http', '$rootScope', 'galleryService', function($scope, $http, $rootScope, galleryService)
{
	$rootScope.utilityService.console_log("START - galleryController");

	/*[Description]*/


	/*[Variables]*/
	$scope.Galleries = [];


	/*[Methods]*/
	
	/**
	*	@Description: Get top 10 lastest articles
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getGalleries = function ()
	{
		$rootScope.utilityService.console_log("START - getGallies");
		
		galleryService.getGalleries().then(function(data)
		{
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$scope.Galleries = data.data;
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
		
		$rootScope.utilityService.console_log("STOP - getGallies");
	}

	/*_____________________________________________________________________________________________________________________________________*/

	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables


		$scope.getGalleries();
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - galleryController");
}]);