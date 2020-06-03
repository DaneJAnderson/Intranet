@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | About COK ')

@section('content')

<style>
  .accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
  }
  
  .active, .accordion:hover {
    background-color: #ffe0cc;
    color: blue;
  }
  
  .accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
  }
  
  .active:after {
    content: "\2212";
  }
  
  .panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    
  }
  </style>

<div style="margin-left: 100px; margin-top: 150px; margin-right: 100px; margin-bottom: 100px;" >  


<div ng-controller="PaginationDemoCtrl"  ng-init="getSuggestions()">    

  <center><h2 style="color:orange"> Suggestions  </h2></center>

<br/><br/>

{{--  ----------------- Search and Record Amount Bar ---------------- --}}
<table width="70%" class="pull-right">
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
    
    <br/><br/><br/>

    <table class="table  table-hover data-table sort display">
        <thead bgColor="#fff4e8">
            <tr>
                <th class=""> <a href="" ng-click="columnToOrder='created_at';reverse=!reverse">Date </a></th>
                <th width="70%" class=""><center> <a href=""  ng-click="columnToOrder='subject';reverse=!reverse">Suggestions </a></center></th>               
            <th > <a href="" class="pull-right" style="margin-right:20px !important;" ng-click="reverse=!reverse"> Action </a> </th>
                
            </tr>
        </thead> 
        <tbody>
          
        <tr  ng-repeat="suggest in allSuggestions.slice(((currentPage-1)*itemsPerPage), ((currentPage)*itemsPerPage))
        | filter:searchText |  orderBy:columnToOrder:reverse" id=@{{'deleteSuggest_'+suggest.id}}> 
          
        <td >@{{  suggest.created_at | date:'MM/dd/yyyy @ h:mma'}}</td>
        <td width="50%"><button  class="accordion" ng-click="accordion(suggest.id)">@{{suggest.subject}} </button>         
        <div class="panel"  id=@{{'suggest_'+suggest.id}}><p style="width:100%; color:black !important; padding: 0px 10px 10px 10px; background: #f5f5f5"><br/> @{{suggest.suggestion}} </p>
          
          <button  class=" pull-right btn btn-info" style="margin-bottom: 10px;" ng-click="respond(suggest.id)">Response </button>
        <div id=@{{'textarea_'+suggest.id}} style="padding: 0px 0px 0px 0px; display: none">
          <textarea class="shadow " id=@{{'response_'+suggest.id}} style="min-width:100%; height: 20vh; resize:none; outline: none" >@{{suggest.response}}</textarea>
          <button style="margin-left: 50%" class="accordio btn btn-success" ng-click="saveResponse(suggest.id)">Save </button><br/><br/>
        </div>

        </div>
        </td>
         
        <td>   
        <button ng-click="deleteSuggest(suggest.id)"  class="btn btn-danger pull-right">Delete</button>
        </td>
        </tr>
    </tbody>
</table>   

  <ul style="float:right; " uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" ng-change="pageChanged()"  boundary-link-numbers="true"
  items-per-page="itemsPerPage" ></ul>
  
      <pagination  total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" class="pagination-sm" items-per-page="itemsPerPage"></pagination>

        
</div> <!-- Ends Controller -->
</div>

 
</div>

    @endsection