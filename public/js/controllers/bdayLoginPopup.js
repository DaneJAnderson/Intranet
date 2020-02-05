App.controller('ModalDemoCtrl', function ($uibModal, $log, $document) {
    var $ctrl = this;
    $ctrl.items = ['item1', 'item2', 'item3'];
  
    $ctrl.animationsEnabled = true;
  
    $ctrl.open = function (size, parentSelector) {
      var parentElem = parentSelector ? 
        angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
      var modalInstance = $uibModal.open({
        animation: $ctrl.animationsEnabled,
        ariaLabelledBy: 'modal-title',
        ariaDescribedBy: 'modal-body',
        templateUrl: 'loginPopup.html',
        controller: 'bdayLoginCtrl',
        controllerAs: '$ctrl',
        size: size,
        appendTo: parentElem,
        resolve: {
          items: function () {
            return $ctrl.items;
          }
        }
      });
  
      modalInstance.result.then(function (selectedItem) {
        $ctrl.selected = selectedItem;
      }, function () {
        // $log.info('Modal dismissed at: ' + new Date());
      });
    };
  
  });
  
  // Please note that $uibModalInstance represents a modal window (instance) dependency.
  // It is not the same as the $uibModal service used above.
  
  angular.module('App').controller('bdayLoginCtrl', ['$uibModalInstance','items', '$rootScope','$scope','APP_Config','userService', function ($uibModalInstance, items, $rootScope, $scope, APP_Config,userService) {
    var $ctrl = this;
    $ctrl.items = items;
    $ctrl.selected = {
      item: $ctrl.items[0]
    };

    $ctrl.pressEnter =function(key) {

      if(key.which ===13){$ctrl.login();}
      
    };
     
    $ctrl.login = function () {   
       

      var auth = { 'username':$scope.loginName, 'password': $scope.loginPwd };

      // window.location.href = APP_Config.App_URL+'birthday/updates';

      userService.loginBdayStaff(auth).then(function(data)
      {
         
         console.log(data);
         
			$scope.response = data.data.auth;
			
			if(data.data.status == 200)
			{
				if($scope.response=="1")
				{
          window.location.href = APP_Config.App_URL+'birthday/updates';
					//location.assign(APP_Config.App_API_URL+'birthday/updates');
				}
				else
				{
					sweetAlert("Oops...", "Username and Password incorrect", "warning");
				}
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

      $uibModalInstance.close($ctrl.selected.item);
      //window.location.href = APP_Config.App_URL+'birthday/updates';


      // Call to Parent HomeController (birthday)
      // $rootScope.$emit('bdayUpdate', 'i am Data');      
    };
  
    $ctrl.cancel = function () {
      $uibModalInstance.dismiss('cancel');
    };
  }]);
  
  // Please note that the close and dismiss bindings are from $uibModalInstance.
  
  angular.module('App').component('bdayLoginCtrl', {
    templateUrl: 'loginPopup.html',
    bindings: {
      resolve: '<',
      close: '&',
      dismiss: '&'
    },
    controller: function () {
      var $ctrl = this;
  
      $ctrl.$onInit = function () {
        $ctrl.items = $ctrl.resolve.items;
        $ctrl.selected = {
          item: $ctrl.items[0]
        };
      };
  
      $ctrl.ok = function () {
        $ctrl.close({$value: $ctrl.selected.item});
      };
  
      $ctrl.cancel = function () {
        $ctrl.dismiss({$value: 'cancel'});
      };
    }
  });