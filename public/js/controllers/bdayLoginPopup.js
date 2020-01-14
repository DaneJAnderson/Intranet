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
  
  angular.module('App').controller('bdayLoginCtrl', ['$uibModalInstance','items', '$rootScope','$scope','APP_Config', function ($uibModalInstance, items, $rootScope, $scope, APP_Config) {
    var $ctrl = this;
    $ctrl.items = items;
    $ctrl.selected = {
      item: $ctrl.items[0]
    };
   
  
    $ctrl.login = function () {   
       
      $uibModalInstance.close($ctrl.selected.item);
      window.location.href = APP_Config.App_URL+'birthday/updates';


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