App.controller('headerController', ['$scope', '$http', '$rootScope', 'APP_Config', 'categoryService', 'shoppingCartService', 'loginService', function($scope, $http, $rootScope, APP_Config, categoryService, shoppingCartService, loginService)
{
	//console.log("START - headerController");
	
	/*[Description]*/
	
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
		console.log("START - Logout");
		
		loginService.getLogout().then(function(data)
		{
			console.log(data);
			if(data.status == 200)
			{
				location.assign(APP_Config.App_URL+'home');
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
		
		console.log("STOP - Logout");
	}
	
	
	/**
	*	@Description: 
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.set_subcategories = function(Subcategories)
	{
		$scope.subcategories = Subcategories;
	}
	
	
	/*[Globals]*/
	angular.element(document).ready(function ()
	{
		console.log("START - angular ready");
		
		//Variables
		
		categoryService.getCategories().then(function(data)
		{
			$scope.categories = data;
		});
		
		
		$scope.shoppingCartService = shoppingCartService;
		
		$scope.shoppingCartService.initialize();
		
		$scope.shoppingCartService.getShoppingCart(1).then(function(data)
		{
			console.log(data);
			if(data.status == 200)
			{
				$scope.shoppingCart = data.data;
				
				$scope.shoppingCartService.Amount = $scope.shoppingCart.length;
				
				$scope.shoppingCartService.Value = 0;
				for(var a=0; a<$scope.shoppingCart.length; a++)
				{
					$scope.shoppingCartService.Value+=parseFloat($scope.shoppingCart[0].price);
				}
			}
			else if(data.status == 419)
			{
				//sweetAlert("Oops...", ""+data.data.Error, "warning");
			}
			else
			{
				sweetAlert("Oops...", "An unexpect error occured, our engineers will be working to get it resolved. Please try again later", "error");
			}
		});
		
		
		$rootScope.loginService.getLoginStatus().then(function(data)
		{
			console.log(data);
			if(data.status == 200)
			{
				$rootScope.LoginStatus = data.data;
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
		
		console.log("STOP - angular ready");
    });
	//console.log("STOP - headerController");
}]);