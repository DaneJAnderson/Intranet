
//  Initial start-up
App.controller('editPopupCtrl', function ($uibModal, $log, $document, $scope, userService, $rootScope) {
    var $ctrl = this;    
    // $ctrl.items = ['item1', 'item2', 'item3'];  
    $ctrl.animationsEnabled = true;

    // Edit Staff Detail 
    $scope.editbday = function(id) {
      
      $ctrl.items = [{'id':id}, 'item2', 'item3'];
      $ctrl.open();

     };

    $scope.createStaff = function() {
      
      $ctrl.items = [{'id':null}, 'item2', 'item3'];
      $ctrl.open();

     };

 
  
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
  
  // Actual Popup Page Controller
  angular.module('App').controller('bdayLoginCtrl', ['$uibModalInstance','items', '$rootScope','$scope','APP_Config','userService', function ($uibModalInstance, items, $rootScope, $scope, APP_Config,userService) {
    var $ctrl = this;
    $ctrl.items = items;
    $ctrl.selected = {
      item: $ctrl.items[0]
    };
   

    $scope.selectFile = function(){
   
      document.getElementById("photo").click();
   };

   
   $scope.setFile = function(element) {
    $scope.currentFile = element.files[0];
     var reader = new FileReader();
  
    reader.onload = function(event) {
      $scope.image_source = event.target.result;
      $scope.$apply();
  
    };
    // when the file is read it triggers the onload event above.
    reader.readAsDataURL(element.files[0]);
  };


  var id = items[0].id;
  userService.retrieveBdayStaff(id).then(function(data)
      {

         // Populate Birthday Popup Edit Fields
          $scope.username = data.data[0].username;
          $scope.fname = data.data[0].first_name;
          $scope.lname = data.data[0].last_name;          
          document.getElementById("gender").value = data.data[0].sex;
          $scope.gender = document.getElementById("gender").value;
          $scope.jobTitle = data.data[0].job_title;
          $scope.dept = data.data[0].department;

        // document.getElementById("username").value = data.data[0].username;
        //  document.getElementById("fname").value = data.data[0].first_name;
        //  document.getElementById("lname").value = data.data[0].last_name;         
        //  document.getElementById("jobTitle").value = data.data[0].job_title;
        //  document.getElementById("dept").value = data.data[0].department;
        
        $rootScope.$broadcast('dob', data.data[0].dob) ;
        
         
      }); 
  
    $ctrl.update = function () {   
       
      var bdate = document.getElementById('dob').value;

      var dob = new Date(bdate);

      $uibModalInstance.close($ctrl.selected.item);   
      
      var staff =  {'id':id, 'username': $scope.username, 'fname': $scope.fname,'lname': $scope.lname, 'gender': $scope.gender, 'jobTitle': $scope.jobTitle, 'dept': $scope.dept, 'dob': dob};
      
     // window.location.href = APP_Config.App_URL+'birthday/edit_bday_staff';
  
     userService.editBdayStaff(staff).then(function(data)
      {
         console.log(data.data);
         
      });
      
    };
  
    $ctrl.cancel = function () {
      $uibModalInstance.dismiss('cancel');
    };
  }]);




























  
  // // Please note that the close and dismiss bindings are from $uibModalInstance.
  
  // angular.module('App').component('bdayLoginCtrl', {
  //   templateUrl: 'loginPopup.html',
  //   bindings: {
  //     resolve: '<',
  //     close: '&',
  //     dismiss: '&'
  //   },
  //   controller: function () {
  //     var $ctrl = this;
  
  //     $ctrl.$onInit = function () {
  //       $ctrl.items = $ctrl.resolve.items;
  //       $ctrl.selected = {
  //         item: $ctrl.items[0]
  //       };
  //     };
  
  //     $ctrl.ok = function () {
  //       $ctrl.close({$value: $ctrl.selected.item});
  //     };
  
  //     $ctrl.cancel = function () {
  //       $ctrl.dismiss({$value: 'cancel'});
  //     };
  //   }
  // });