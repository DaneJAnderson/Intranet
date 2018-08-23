App.controller('footerController', ['$scope', '$http', '$rootScope', 'updates', function($scope, $http, $rootScope, updates)
{
	console.log("START - footerController");
	
	updates.getUpdates().then(function(data)
    {
		console.log(data);
		$scope.updates = data;
	});
	
	console.log("STOP - footerController");
}]);