@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | About COK ')

@section('content')

<div style="margin-left: 100px; margin-top: 150px; margin-right: 100px; margin-bottom: 100px;" > 
  
 


<div ng-controller="PaginationDemoCtrl">

  @include('home_include.editBirthday')

     <div class="row">
 
      </div>   
 

<br/><br/>

{{--  ----------------- Search and Record Amount Bar ---------------- --}}
<table width="100%">
<tr>

 <th>
<span>   
  View <select ng-model="viewby" ng-change="setItemsPerPage(viewby)" convert-to-number>
      <option>3</option>
      <option>5</option>
      <option>10</option>
      <option>20</option>
      <option>30</option>
      <option>40</option>
      <option>50</option>   
    </select> records at a time. </span>
</th>
<th style="float:right;">
    <div class="input-group">
        <input class="form-control" ng-model="searchText" placeholder="Search" type="search" ng-change="search(searchText)" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-search"></span>
        </span>
      </div>
    </th>
</tr>
</table>
    {{-- ------------------------------------------------- --}}
    
    <br/><br/>

    <table class="table  table-hover data-table sort display">
        <thead bgColor="#fff4e8">
            <tr>
                <th class="EmpId"> <a href="" ng-click="columnToOrder='username';reverse=!reverse">Username   </a></th>
                <th class="EmpId"> <a href="" ng-click="columnToOrder='first_name';reverse=!reverse">First Name          </a></th>
                <th class="name"> <a href="" ng-click="columnToOrder='last_name';reverse=!reverse"> Last Name </a> </th>
            <th class="Email"> <a href="" ng-click="columnToOrder='status';reverse=!reverse"> Status </a> </th>
            <th class="Email"> <a href="" ng-click="columnToOrder='Email';reverse=!reverse"> Action </a> </th>
                
            </tr>
        </thead> 
        <tbody>
          
        <tr  ng-repeat="staff in allStaff.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage))
        | filter:searchText |  orderBy:columnToOrder:reverse" id=@{{'deleteBS_'+staff.id}}> 

          <td>@{{staff.username}}</td>          
          <td>@{{staff.first_name}}</td>          
           <td>@{{staff.last_name}}</td>
           <td  ng-if="staff.status == 1"  >
            <button ng-click="status(staff.id)" id=@{{'status_'+staff.id}} class="btn text-success"><b style="padding-right: 15px;">Active</b></button></td>
           <td  ng-if="staff.status != 1" >
            <button ng-click="status(staff.id)" id=@{{'status_'+staff.id}} style="color:grey" class="btn"><b >Disabled</b></button></td>
           <td >      

        <button ng-click="editbday(staff.id)" class="btn btn-info">Edit</button>
        <button ng-click="deleteStaff(staff.id)" class="btn btn-danger">Delete</button>
        </td>
        </tr>
    </tbody>
</table>   

  <ul style="float:right" uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" ng-change="pageChanged()"  boundary-link-numbers="true"
  items-per-page="itemsPerPage" ></ul>
  
      <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" class="pagination-sm" items-per-page="itemsPerPage"></pagination>

        
</div> <!-- Ends Controller -->
</div>

 
</div>

    @endsection