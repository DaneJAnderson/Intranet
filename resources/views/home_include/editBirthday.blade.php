<style>
 #forms td { padding-right: 15px; padding-bottom: 10px; }
</style>
<div ng-controller="editPopupCtrl as $ctrl" class="modal-demo">
    <script type="text/ng-template" id="loginPopup.html">
        <div class="modal-header">
          <center>
            <h3 ng-if="ids" class="modal-title text-primary" id="modal-title">Update Staff Birthday Details</h3>
            <h3 ng-if="!ids" class="modal-title text-primary" id="modal-title">Add New Staff Birthday Details</h3>
          </center>
        </div>
        <form name="form" >
        <div class="modal-body" id="modal-body">
 
            <table id="forms" width=100%>
              <tr>
            <td class="form-group">
                <label>Username</label>
                <input type="text" name="usrname" id="username" value="" ng-model="username" class="form-control" ng-required="true" required/>
              </td>
             
            <td class="form-group">            
                <label>First Name</label>
                <input type="text" id="fname" value="" ng-model="fname" class="form-control" ng-required="true" required />              
              </td>
            </tr>

            <tr>
              <td class="form-group">
                <label>Last Name</label>
                <input type="text" id="lname" value="" ng-model="lname" class="form-control" ng-required="true" required />
              </td>
              

              <td >   <label>Gender: </label>              
          <select id="gender" ng-model="gender" class="form-control" ng-required="true" required>
              <option >Select Gender</option>
              <option value=0 >Male</option>
              <option value=1 >Female</option>
            </select> 
          </td>
            </tr>

              <tr>
              <td class="form-group">
                <label>Job Title</label>
                <input type="text" id="jobTitle" ng-model="jobTitle" class="form-control" ng-required="true" required />
              </td>
            

              <td>
                <label>Department</label>
                <select id="dept" ng-model="dept" class="form-control" ng-required="true" required>
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
              <!----------------------------  Photo Upload ---------------------->
                <button class="btn" style="border: 1px solid grey;" ng-click="selectFile()">Upload Photo</button>
                <img  class="img-thumbnail" style="margin-left: 50px; width:200px; height:150px;" ng-src="@{{image_source}}" >
                <input type="file" id="photo" class="ng-hide" onchange="angular.element(this).scope().setFile(this)" accept="image/*">
              </p>
 
        </div>
        <div class="modal-footer">                                                  <!--$ctrl.update()  -->
            <input type="submit" value="Update" ng-if="ids" class="btn btn-success"  ng-click="$ctrl.validate(form,'update')"/>
                                                                            <!--$ctrl.create()  -->
            <input type="submit" value="Create" ng-if="!ids" class="btn btn-success" type="button" ng-click="$ctrl.validate(form,'create')" />
            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
        </div>
      </form>
    </script>    

    <div  >        

        <button style="margin-top: 0px" ng-click="createStaff()" type="button" class="btn btn-primary pull-left">
             <span class="glyphicon glyphicon-plus "></span>
       </button> <h5 class="pull-left" style="padding-left: 7px;margin-top: 9px;" > Add New Staff</h5>
     </div>
 
    <div class="modal-parent">
    </div>

<!-- </div> -->





