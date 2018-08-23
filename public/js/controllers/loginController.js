App.controller('loginController', ['$scope', '$http', '$rootScope', '$window', 'userService', 'APP_Config', function($scope, $http, $rootScope, $window, userService, APP_Config)
{
	$rootScope.utilityService.console_log("START - loginController");
	/*Description*/
	/*This contoller manager to interaction between the user and the login access*/
	
	
	/*Variables*/
	$scope.username = null;
	$scope.password = null;
	
	
	/*[Methods]*/
	
	/**
	*	@Description: Validate the form then request login
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.login = function ()
	{
		$rootScope.utilityService.console_log("START - $scope.login");
		
		/*Add Validation Here*/
		var username = $("#username").val();
		var password = $("#password").val();
		
		userService.postLogIn(username, password).then(function(data)
		{
			$rootScope.utilityService.console_log(data);
			if(data.status == 200)
			{
				location.assign(APP_Config.App_URL+'');
			}
			else if(data.status == 419)
			{
				sweetAlert("Oops...", ""+data.data.Error, "warning");
			}
			else if(data.data.Error.indexOf("Invalid credentials") != -1)
			{
				sweetAlert("Oops...", "Incorrect Username and Password\n\n Please try agin and ensure your account is not blocked.", "warning");
			}
			else
			{
				sweetAlert("Oops...", "An unexpect error occured, our engineers will be working to get it resolved. Please try again later", "error");
			}
		});
		
		
		$rootScope.utilityService.console_log("STOP - $scope.login");
	}
	
	
	/*_____________________________________________________________________________________________________________________________________*/
	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - loginController");
}]);