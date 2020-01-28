<style>
 #forms td { padding-right: 15px; padding-bottom: 10px; }
</style>
<div ng-controller="editPopupCtrl as $ctrl" class="modal-demo">
    <script type="text/ng-template" id="loginPopup.html">
        <div class="modal-header">
          <center>
            <h3 class="modal-title text-primary" id="modal-title">Update Staff Birthday Details</h3>
          </center>
        </div>
        <div class="modal-body" id="modal-body">
            <!-- <ul>
                <li ng-repeat="item in $ctrl.items">
                    <a href="#" ng-click="$event.preventDefault(); $ctrl.selected.item = item">@{{ item }}</a>
                </li>
            </ul> -->

            <table id="forms" width=100%>
              <tr>
            <td class="form-group">
                <label>Username</label>
                <input type="text" id="username" value="" ng-model="username" class="form-control" required />
              </td>
             
            <td class="form-group">            
                <label>First Name</label>
                <input type="text" id="fname" value="" ng-model="fname" class="form-control" required />              
              </td>
            </tr>

            <tr>
              <td class="form-group">
                <label>Last Name</label>
                <input type="text" id="lname" value="" ng-model="lname" class="form-control" required />
              </td>
              

              <td >   <label>Gender: </label>              
          <select id="gender" ng-model="gender" class="form-control">
              <option >Select Gender</option>
              <option value=0 >Male</option>
              <option value=1 >Female</option>
            </select> 
          </td>
            </tr>

              <tr>
              <td class="form-group">
                <label>Job Title</label>
                <input type="text" id="jobTitle" ng-model="jobTitle" class="form-control" required />
              </td>
            

              <td>
                <label>Department</label>
                <select id="dept" ng-model="dept" class="form-control">
                  <option readonly=true>Select Department</option>
                  <option value="Accounts" >Accounts</option>
                  <option value="Audit" >Audit</option>
                  <option value="Centralised Services Unit" >Centralised Services Unit</option>
                  <option value="CEO's Office" >CEO's Office</option>
                  <option value="COK Pension Fund" >COK Pension Fund</option>
                  <option value="Credit Administration" >Credit Administration</option>
                  <option value="Cross Roads Branch" >Cross Roads Branch</option>
                  <option value="Debt Management" >Debt Management</option>
                  <option value="Facilities" >Facilities</option>
                  <option value="Financial Services" >Financial Services</option>
                  <option value="Half Way Tree Branch" >Half Way Tree Branch</option>
                  <option value="Human Resources & Learning" >Human Resources & Learning</option>
                  <option value="Management Information Systems" >Management Information Systems</option>
                  <option value="Mandeville Branch" >Mandeville Branch</option>
                  <option value="Member Experience" >Member Experience</option>
                  <option value="Micro Finance" >Micro Finance</option>
                  <option value="Montego Bay Branch" >Montego Bay Branch</option>
                  <option value="Operations" >Operations</option>                  
                  <option value="Portmore Branch" >Portmore Branch</option>
                  <option value="Registry" >Registry</option>
                  <option value="Remittance" >Remittance</option>
                  <option value="Risk & Compliance" >Risk & Compliance</option>
                  <option value="Sales & Marketing" >Sales & Marketing</option>
                  <option value="Securities Administration" >Securities Administration</option>
                  <option value="Strategic Planning" >Strategic Planning</option>
                  
                </select> 
              </td>
            </tr>
            </table>
              
              <p class="form-group">
             
                <table  >
                  <tr>
                    <td ><label>D.O.B:</label> </td>
                    <td class="col-md-12 pull-left">   @include('home_include.dobpicker')  </td>


                </tr>
                </table>             
                </p> <br/>

              <p class="form-group">
                <button ng-click="selectFile()">Upload Photo</button>
                <img  style="margin-left: 50px; width:200px; height:150px;" ng-src="@{{image_source}}" >
                <input type="file" id="photo" class="ng-hide" onchange="angular.element(this).scope().setFile(this)" accept="image/*">
              </p>
              
           <!-- Selected: <b>@{{ $ctrl.selected.item }}</b> -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" type="button" ng-click="$ctrl.update()">Update</button>
            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
        </div>
    </script>
    

    {{-- <button type="button" class="btn btn-default" ng-click="$ctrl.open()">Open me!</button> --}}

    {{-- <div  class="col-md-2 col-xs-12" style="width:80px !important; height: 60px !important; margin-top: 30px"  ng-click="$ctrl.open()">
        <img class="thumbs img-rounded" style="width:100px !important; height: 80px !important;"  src="images/addBday.png" alt="pic">
    </div> --}}

    <div class="col-xs-1" >
        

        <button  ng-click="createStaff()" type="button" class="btn btn-primary">
             <span class="glyphicon glyphicon-plus"></span>
       </button> 
     </div> 
   
    <div ng-show="$ctrl.selected">Selection from a modal: @{{ $ctrl.selected }}</div>
    <div class="modal-parent">
    </div>
{{-- </div> --}}




