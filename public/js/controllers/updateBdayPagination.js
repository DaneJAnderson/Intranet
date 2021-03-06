  App.controller('PaginationDemoCtrl',['$scope','$log','$rootScope','userService', function ($scope, $log, $rootScope, userService) {

    // ------------------- Edit Service Call --------------- //
    // $scope.editStaff = function(id) {

    //   userService.editBdayStaff(id).then(function(data)
    //   {
    //      console.log(data.data);
         
    //   });     

    // };
  
    // ------------------- Delete Service Call --------------------- //
    $scope.deleteStaff = function(id) {

      sweetAlert({
        title: "Are you sure you want to delete this Staff?",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      },
      function(){

          // Remainder Change Status to 3
        var status = 3;

      var x = document.getElementById("deleteBS_"+id); 
  
       x.innerHTML = "";
           
      userService.updateStatus(id, status).then(function(data)
      {
         console.log(data.data);
      });  
        swal("Deleted!", "Staff has been deleted successfully", "success");
      });      
         

    };

  
  //---------------------------------- Status Service Call -------------------- //
    $scope.status = function(id) {

      var x = document.getElementById("status_"+id); 
     // console.log(x);
     var status = 1;

     if(x.innerHTML == "Disabled"){
      x.innerHTML = "Active";
      x.setAttribute("style", "font-weight:bold;color:green; padding-right:26px;");
      status = 1;
     } else {
      x.innerHTML = "Disabled";
      x.setAttribute("style", "font-weight:bold;color:grey");
      status = 2;
    }

      userService.updateStatus(id, status).then(function(data)
      {
         console.log(data.data);
      });     

    };
  
  
$scope.getAllBdayStaff = function () { 

  userService.getAllStaff().then(function(data)
{
    
    // console.log(data.data);
    $scope.allStaff = data.data; 

    //  Search All Staff Members
    $scope.search = function (text) {
      
     // $scope.searchText
      if ( text != undefined && text.length > 1) {        
       
        $scope.itemsPerPage = $scope.allStaff.length;
        
      } else {
        $scope.itemsPerPage = 10;
      }
      
  };
          
    $scope.resetAll = function()
    {
        $scope.filteredList = $scope.allStaff ; 
        $scope.Id = '';
        $scope.Name = '';
    };
    
    
    $scope.add = function()
    {
        $scope.allStaff.push({EmpId : $scope.Id, name : $scope.Name});
        $scope.resetAll();  
    };  
   

   $scope.resetAll();  

  $rootScope.viewby = 10;  
  $scope.totalItems = $scope.allStaff.length;
  $scope.currentPage = 1;
  $scope.itemsPerPage = $scope.viewby;
  $scope.maxSize = 5; //Number of pager buttons to show

  $scope.setPage = function (pageNo) {
    $scope.currentPage = pageNo;
  };

  $scope.pageChanged = function() {
  //  console.log('Page changed to: ' + $scope.currentPage);
  };

$scope.setItemsPerPage = function(num) {
  $scope.itemsPerPage = num;
  $scope.currentPage = 1; //reset to first page
};

});

};


// ----------------------------------- Suggestion Box ---------------------------------//

$scope.getSuggestions = function() {

    //alert('Working!!'); return;

    userService.getSuggestions().then(function(data)
{
    
    // console.log(data.data);
    $scope.allSuggestions = data.data; 

    //  Search All Staff Members
    $scope.search = function (text) {
      
     // $scope.searchText
      if ( text != undefined && text.length > 1) {        
       
        $scope.itemsPerPage = $scope.allSuggestions.length;
        
      } else {
        $scope.itemsPerPage = 10;
      } 
      
  };


  $rootScope.viewby = 10;  
  $scope.totalItems = $scope.allSuggestions.length;
  $scope.currentPage = 1;
  $scope.itemsPerPage = $scope.viewby;
  $scope.maxSize = 5; //Number of pager buttons to show

  $scope.setPage = function (pageNo) {
    $scope.currentPage = pageNo;
  };

  $scope.pageChanged = function() {
  //  console.log('Page changed to: ' + $scope.currentPage);
  };

$scope.setItemsPerPage = function(num) {
  $scope.itemsPerPage = num;
  $scope.currentPage = 1; //reset to first page
};


$scope.accordion = function (id){

var panel = document.getElementById('suggest_'+id);

panel.previousElementSibling.classList.toggle("active");


if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 

};

// ----------------------------- Response to Suggestion Textarea -------------------//

// Response Button
$scope.respond = function (id){

  var panel = document.getElementById('textarea_'+id);
  var panel2 = document.getElementById('suggest_'+id);     
      panel2.style.maxHeight = "100%"; 

if (panel.style.display == 'none') {
       // panel.style.display = 'block';
        $("#textarea_"+id).slideDown();
      } else {
        $("#textarea_"+id).slideUp();
      //  panel.style.display = 'none';
      }

      // $scope.response = userService.getSuggestionResponse(id).data;

      // var panel2 = document.getElementById('suggest_'+id);     
      // panel2.style.maxHeight = "100%";    

};

//------------- Suggesion-Box Response Output --------------//


$scope.saveResponse = function(id){   

 var response = document.getElementById('response_'+id).value;
 
  userService.sentSuggestionResponse(id, response).then(function(data)
  {
      console.log(data.data);

  });

};




});




$scope.deleteSuggest = function(id) {

  sweetAlert({
    title: "Are you sure you want to delete this Suggestion?",
    text: "",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){

      // Remainder Change Status to 3
    

  var x = document.getElementById("deleteSuggest_"+id); 

   x.innerHTML = "";
       
  userService.updateSuggestion(id).then(function(data)
  {
     console.log(data.data);
  });  
    swal("Deleted!", "Suggestion has been deleted successfully", "success");
  });      
     

};





    
};




// ------------------------------------------------------------------------------------//

    }]);

//  Select Page Amount 
    App.directive('convertToNumber', function() {
      return {
        require: 'ngModel',
        link: function(scope, element, attrs, ngModel) {
          ngModel.$parsers.push(function(val) {
            return parseInt(val, 10);
          });
          ngModel.$formatters.push(function(val) {
            return '' + val;
          });
        }
      };  
  });


   /* Search Text in all 3 fields */
   function searchUtil(item,toSearch)
   {
       /* Search Text in all 3 fields */
       return ( item.name.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.Email.toLowerCase().indexOf(toSearch.toLowerCase()) > -1 || item.EmpId == toSearch ) ? true : false ;
   } 
