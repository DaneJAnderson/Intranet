    App.controller('ListController',['$uibModal','$log','$document','$scope','$rootScope', function ($uibModal, $log, $document, $scope, $rootScope) {
    
        var $list = this;
        $list.items = ['item1', 'item2', 'item3'];
      
        $list.animationsEnabled = true;
      
        $list.open = function (size, parentSelector) {
          var parentElem = parentSelector ? 
            angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
          var modalInstance = $uibModal.open({
            animation: $list.animationsEnabled,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: 'updateBday.html',
            controller: 'updateBdayCtrl',
            controllerAs: '$list',
            size: size,
            appendTo: parentElem,
            resolve: {
              items: function () {
                return $list.items;
              }
            }
          });
      
          modalInstance.result.then(function (selectedItem) {
            $list.selected = selectedItem;
          }, function () {
            // $log.info('Modal dismissed at: ' + new Date());
          });
        };     
     
       
  

  // Receive parent Call birthday 
  $rootScope.$on('bdayUpdateP', function(event, data) {
    
$list.open('lg');

$scope.curPage = 1,
  $scope.itemsPerPage = 3,
  $scope.maxSize = 5;
    
this.Itemss = itemsDetails;    
  
  $scope.numOfPages = function () {
    return Math.ceil(itemsDetails.length / $scope.itemsPerPage);
    
  };
  
    $scope.$watch('curPage + numPerPage', function() {
    var begin = (($scope.curPage - 1) * $scope.itemsPerPage),
    end = begin + $scope.itemsPerPage;
    
 $scope.filteredItems = itemsDetails.slice(begin, end);
    
    console.log(itemsDetails.slice(begin, end));
     
  });


});

      }]);
      
      // Please note that $uibModalInstance represents a modal window (instance) dependency.
      // It is not the same as the $uibModal service used above.
      
      angular.module('App').controller('updateBdayCtrl', function ($uibModalInstance, items) {
        var $list = this;
        $list.items = items;
        $list.selected = {
          item: $list.items[0]
        };
      
        $list.login = function () {
          $uibModalInstance.close($list.selected.item);
        };
      
        $list.cancel = function () {
          $uibModalInstance.dismiss('cancel');
        };
      });
      
      // Please note that the close and dismiss bindings are from $uibModalInstance.
      
      angular.module('App').component('updateBdayCtrl', {
        templateUrl: 'updateBday.html',
        bindings: {
          resolve: '<',
          close: '&',
          dismiss: '&'
        },
        controller: function () {
          var $list = this;
      
          $list.$onInit = function () {
            $list.items = $list.resolve.items;
            $list.selected = {
              item: $list.items[0]
            };
          };
      
          $list.ok = function () {
            $list.close({$value: $list.selected.item});
          };
      
          $list.cancel = function () {
            $list.dismiss({$value: 'cancel'});
          };
        }
      });


  var itemsDetails = [
    { itemCode : 100,
      itemName : 'ONE',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 7,
      restrictStock : 16,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 102,
      itemName : 'TWO',
      itemDescription : 'Hey Hie',
      uom : 'GALLONS',
      available : 'YES',
      openStock : 8,
      restrictStock : 15,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 103,
      itemName : 'THREE',
      itemDescription : 'Hey Hie',
      uom : 'GALLONS',
      available : 'YES',
      openStock : 0,
      restrictStock : 15,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 104,
      itemName : 'FOUR',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 0,
      restrictStock : 15,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 105,
      itemName : 'FIVE',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 0,
      restrictStock : 14,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 106,
      itemName : 'SIX',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 0,
      restrictStock : 5,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 107,
      itemName : 'SEVEN',
      itemDescription : 'Hey Hie',
      uom : 'GALLONS',
      available : 'YES',
      openStock : 0,
      restrictStock : 5,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 108,
      itemName : 'EIGHT',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 5,
      restrictStock : 0,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 109,
      itemName : 'NINE',
      itemDescription : 'Hey Hie',
      uom : 'GALLONS',
      available : 'YES',
      openStock : 5,
      restrictStock : 0,
      threshold : 0,
      active : 'YES'
      },
    { itemCode : 110,
      itemName : 'TEN',
      itemDescription : 'Hey Hie',
      uom : 'FEET',
      available : 'YES',
      openStock : 77,
      restrictStock : 0,
      threshold : 0,
      active : 'YES'
      }
  ];

  