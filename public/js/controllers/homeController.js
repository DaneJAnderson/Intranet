App.controller('homeController', ['$scope', '$http', '$rootScope', 'articleService', 'userService', 'APP_Config', function($scope, $http, $rootScope, articleService, userService, APP_Config)
{
	$rootScope.utilityService.console_log("START - homeController");

	/*[Description]*/


	/*[Variables]*/
	$scope.Articles = [];
	$scope.Birthdays = [];


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
	*	@Description: Get users with current birthdays
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getCurrentBirthdays = function ()
	{
		$rootScope.utilityService.console_log("START - getCurrentBirthdays");
		
		userService.getCurrentBirthdays().then(function(data)
		{
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$scope.Birthdays = data.data;

				setTimeout(function()
				{
					$('.gallery').pignoseGallery({
						thumbnails: '.gallery-thumbnails'
					});
				}, 1000);
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
		
		$rootScope.utilityService.console_log("STOP - getCurrentBirthdays");
	}



	/**
	*	@Description: Returns image SRC
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getBirthdayImage = function (image, sex)
	{
		$rootScope.utilityService.console_log("START - getBirthdayImage");
		
		if(image == null || image == 'null' || image == '')
		{
			if(sex==0)
			{
				return 'images/Male_worker.png';
			}
			else
			{
				return 'images/Female_worker.png';
			}
		}
		else
		{
			return APP_Config.App_Storage_URL+'images/profile_images/'+image;
		}
		
		$rootScope.utilityService.console_log("STOP - getBirthdayImages");
	}
	
	
	
	/*_____________________________________________________________________________________________________________________________________*/

	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables


		$scope.getLastestArticles();
		$scope.getCurrentBirthdays();
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - homeController");
}]);