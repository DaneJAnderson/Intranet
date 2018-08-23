App.controller('documentsController', ['$scope', '$http', '$rootScope', '$window', 'documentsService', 'utilityService', 'APP_Config', function($scope, $http, $rootScope, $window, documentsService, utilityService, APP_Config)
{
	console.log("START - documentsController");
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
		location.assign(APP_Config.App_API_URL+'documents.php?type_id='+id);
		console.log("STOP - goToDocuments");
	}
	
	
	/**
	*	@Description: 
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.filterDocuments = function (name)
	{
		console.log("START - filterDocuments");
		if($scope.search_field == "" || $scope.search_field==null || typeof($scope.search_field) == "undefined")
		{
			return true;
		}
		
		if(name.toLowerCase().indexOf($scope.search_field.toLowerCase()) != -1)
		//if(name.indexOf($scope.search_field) != -1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/*_____________________________________________________________________________________________________________________________________*/
	angular.element(document).ready(function ()
	{
		console.log("START - angular ready");
		
		//Variables
		//console.log("product_id: "+$scope.product_id);
		
		//var id = utilityService.get("type_id");
		var id = $scope.document_type_id;
		
		
		documentsService.getDocumentByTypes(id).then(function(data)
		{
			console.log(data);
			$scope.documents = data;
			
			if(data.status == 200)
			{
				$scope.documents = data.data;
				
				if(jQuery.isEmptyObject($scope.documents))
				{
					sweetAlert("Oops...", "No documents found", "warning");
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
	
	console.log("STOP - documentsController");
}]);