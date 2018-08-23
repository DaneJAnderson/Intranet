App.controller('headerController', ['$scope', '$http', '$rootScope', 'APP_Config', 'userService', 'licenseService', function($scope, $http, $rootScope, APP_Config, userService, licenseService)
{
	$rootScope.utilityService.console_log("START - headerController");
	
	/*[Description]*/


	/*[Variables]*/
	$scope.OverUsedLicense = 0;
	$scope.ExpiredLicense = 0;
	$scope.SoonToExpiredLicense = 0;
	$rootScope.notifications = [];


	
	/*[Methods]*/
	
	/**
	*	@Description: 
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.Logout = function ()
	{
		$rootScope.utilityService.console_log("START - Logout");
		
		userService.postLogOut().then(function(data)
		{
			$rootScope.utilityService.console_log(data);
			if(data.status == 200)
			{
				location.assign(APP_Config.App_URL+'login');
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
		
		$rootScope.utilityService.console_log("STOP - Logout");
	}


	/**
	*	@Description: Get the Logged in user infromation
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getUserInfo = function ()
	{
		$rootScope.utilityService.console_log("START - getUserInfo");
		
		userService.getLoggInUserInfo().then(function(data)
		{
			$rootScope.utilityService.console_log(data);
			if(data.status == 200)
			{
				$scope.user_info = data.data[0];
				$rootScope.user_info = data.data[0];
				$rootScope.utilityService.console_log($scope.user_info)
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
		
		$rootScope.utilityService.console_log("STOP - getUserInfo");
	}


	/**
	*	@Description: Get Distinct License User
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getLicenseReport = function ()
	{
		$rootScope.utilityService.console_log("START - getLicenseReport");

		$("#Reload_License").hide();
		
		licenseService.getLicenseReport().then(function(data)
		{
			$rootScope.utilityService.console_log("License Report Data:");
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$("#Reload_License").hide();

				$scope.LicenseReport = data.data;

				for(var a = 0; a<$scope.LicenseReport.length; a++)
				{
					//Calculate expired and over use licenses
					if($scope.LicenseReport[a].LicenseUsers.length>$scope.LicenseReport[a].volume)
					{
						
						$scope.OverUsedLicense += 1;
					}

					var todaysDate = new Date();

					if(new Date($scope.LicenseReport[a].renewal_date) <= todaysDate)
					{
						$scope.ExpiredLicense += 1;
					}

					//Calculate and assign License that soon to expire.
					var today = new Date();
					var priorDate = new Date().setDate(today.getDate()+30);
					priorDate = new Date(priorDate);

					if((new Date($scope.LicenseReport[a].renewal_date) >= today) && (new Date($scope.LicenseReport[a].renewal_date) <= priorDate))
					{
						$scope.SoonToExpiredLicense += 1;
					}



					//Set the header notifications
					if(($scope.LicenseReport[a].LicenseUsers.length/$scope.LicenseReport[a].volume)*100>90)
					{
						
						$scope.OverUsedLicense += 1; 


						var notification =
						{
							type: 'usage',
							license: $scope.LicenseReport[a]
						};

						$rootScope.notifications.push(notification);
					}

					var todaysDate = new Date();

					if(new Date($scope.LicenseReport[a].renewal_date) <= todaysDate)
					{
						var notification =
						{
							type: 'expiry',
							license: $scope.LicenseReport[a]
						};

						$rootScope.notifications.push(notification);
					}

				}
			}
			else if(data.status == 419)
			{
				$("#Reload_License").show();
			}
			else
			{
				$("#Reload_License").show();
			}
		});
		
		$rootScope.utilityService.console_log("STOP - getLicenseReport");
	}

	
	
	/*[Globals]*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables
		$scope.getUserInfo();
		$scope.getLicenseReport();
		
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	$rootScope.utilityService.console_log("STOP - headerController");
}]);