App.controller('documentTypesController', ['$scope', '$http', '$rootScope', '$window', 'documentsService', 'APP_Config', function($scope, $http, $rootScope, $window, documentsService, APP_Config)
{
	console.log("START - documentTypesController");
	/*________________________________________________________[Description]________________________________________________________________*/
	
	
	/*_________________________________________________________[Variables]_________________________________________________________________*/
	
	
	
	/*__________________________________________________________[Methods]__________________________________________________________________*/
	
	/**
	*	@Description: 
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.goToDocuments = function (id)
	{
		console.log("START - goToDocuments");
		location.assign(APP_Config.App_URL+'documents/'+id);
		console.log("STOP - goToDocuments");
	}
	
	
	/*_____________________________________________________________________________________________________________________________________*/
	angular.element(document).ready(function ()
	{
		console.log("START - angular ready");
		
		//Variables
		//console.log("product_id: "+$scope.product_id);
		
		
		documentsService.getDocumentTypes().then(function(data)
		{
			console.log(data);
			$scope.document_types = data;
			
			if(data.status == 200)
			{
				$scope.document_types = data.data;
				
				if(jQuery.isEmptyObject($scope.document_types))
				{
					sweetAlert("Oops...", "No document types listed", "warning");
				}
			}
			else if(data.status == 419)
			{
				sweetAlert("Oops...", ""+data.data.Error, "warning");
			}
			else
			{
				//sweetAlert("Oops...", "An unexpect error occured, our engineers will be working to get it resolved. Please try again later", "error");
			}
		});
		
		console.log("STOP - angular ready");
    });
	
	console.log("STOP - documentTypesController");
}]);