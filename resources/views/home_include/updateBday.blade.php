@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | About COK ')

@section('content')

<div style="margin-left: 100px; margin-top: 150px; margin-right: 100px; margin-bottom: 100px;" > 
  
 
 {{-- <div ng-controller="TableCtrl">  --}}

<div ng-controller="PaginationDemoCtrl">

     <div class="row">
        <div class="col-xs-3">
          <input type="text" ng-model="newEmpId" class="form-control" placeholder="EmpId">
        </div>
        <div class="col-xs-3">
          <input type="text" ng-model="newName" class="form-control" placeholder="Name">
        </div>
        <div class="col-xs-4">
          <input type="email" ng-model="newEmail" class="form-control" placeholder="Email">
        </div> 
           <div class="col-xs-1">
               <button ng-click="add()" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
              </button> 
            </div> 
      </div>   
        
              
        {{-- <table class="table  table-hover data-table sort display">
             <thead>
                 <tr>
                     <th class="EmpId"> <a href="" ng-click="columnToOrder='EmpId';reverse=!reverse">EmpId 
                          
                         </a></th>
                     <th class="name"> <a href="" ng-click="columnToOrder='name';reverse=!reverse"> Name </a> </th>
                 <th class="Email"> <a href="" ng-click="columnToOrder='Email';reverse=!reverse"> Email </a> </th>
                     
                 </tr>
             </thead> 
             <tbody>
                 
    <tr ng-repeat="item in filteredList | filter:searchText |  orderBy:columnToOrder:reverse">
        <td>@{{item.EmpId}}</td>
        <td>@{{item.name}}</td>
        <td>@{{item.Email}}</td>
    </tr>
             </tbody>
        </table>         --}}

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
          
        <tr ng-repeat="staff in allStaff.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage))
        | filter:searchText |  orderBy:columnToOrder:reverse"> 
            {{-- Search Bug : if searchText.length > 1 let itemsPerPage = AllStaff.length --}}
          <td>@{{staff.username}}</td>          
          <td>@{{staff.first_name}}</td>          
           <td>@{{staff.last_name}}</td>
           <td  ng-if="staff.status == 1"  >
            <button ng-click="status(staff.id)" id=@{{'status_'+staff.id}} class="btn text-success"><b style="padding-right: 15px;">Active</b></button></td>
           <td  ng-if="staff.status != 1" >
            <button ng-click="status(staff.id)" id=@{{'status_'+staff.id}} class="btn text-success"><b >Disabled</b></button></td>
           <td ><span style="color:grey">       

        <button ng-click="editStaff(staff.id)" class="btn btn-info">Edit</button>
        <button ng-click="deleteStaff(staff.id)" class="btn btn-danger">Delete</button>
        </td>
        </tr>
    </tbody>
</table>   

  <ul style="float:right" uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" ng-change="pageChanged()"  boundary-link-numbers="true"
  items-per-page="itemsPerPage" 
  ></ul>
  
      <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" class="pagination-sm" items-per-page="itemsPerPage"></pagination>

    {{-- </div> --}}
        
</div> <!-- Ends Controller -->


 
</div>

    @endsection