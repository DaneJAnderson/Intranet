App.controller('suggestionController', ['$scope', '$http', '$rootScope', '$window', 'userService', 'APP_Config', function($scope, $http, $rootScope, $window, userService, APP_Config)
{
	
	$scope.suggest = function (form)
	{
        // $scope.subject = "";
        // $scope.suggestion = "";

        if(form.$valid){        
       
     
		userService.suggestion($scope.subject, $scope.suggestion).then(function(data)
		{
            console.log(data);

            if(data.data){                
               
                $scope.subject = "";
                $scope.suggestion = "";
                sweetAlert("Thank You", "", "success");
            }
            else
			 if(data.status == 419)
			{
				sweetAlert("Oops...", ""+data.data.Error, "warning");
			}			
			
        });
        
    }

	};
	

}]);