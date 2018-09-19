App.controller('photosController', ['$scope', '$http', '$rootScope', 'galleryService', '$timeout', function($scope, $http, $rootScope, galleryService, $timeout)
{
	$rootScope.utilityService.console_log("START - photosController");

	/*[Description]*/


	/*[Variables]*/
	$scope.Gallery = {};
	$scope.Photos = [];
	$scope.gallery_id = $rootScope.utilityService.get('gallery_id');

	/*[Methods]*/
	
	/**
	*	@Description: Request all photos from a particular album
	*
	*	@param:
	*
	*	@return:
	*/
	$scope.getPhotos = function ($gallery_id)
	{
		$rootScope.utilityService.console_log("START - getPhotos");
		
		galleryService.getPhotosGalleryID($gallery_id).then(function(data)
		{
			$rootScope.utilityService.console_log(data);

			if(data.status == 200)
			{
				$scope.Photos = data.data;

				$timeout( function(){
		            lazy_load_images();
		        }, 5000 );
				
				//window.setTimeout(lazy_load_images(), 500);
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
		
		$rootScope.utilityService.console_log("STOP - getPhotos");
	}

	/*_____________________________________________________________________________________________________________________________________*/

	/*Globals*/
	angular.element(document).ready(function ()
	{
		$rootScope.utilityService.console_log("START - angular ready");
		
		//Variables


		$scope.getPhotos($scope.gallery_id);
		
		$rootScope.utilityService.console_log("STOP - angular ready");
    });
	
	$rootScope.utilityService.console_log("STOP - photosController");
}]);