@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
 
<style>
.suggestImage {
  background-image: url("../images/suggestion-box.png");
  /* background-color: #cccccc; */
  height: 200px;
  width: 200px;
  background-position: right;
  /* background-repeat: no-repeat; */
  background-size: cover;
  position: absolute;
 
}

.signin {
  color: #ff944d !important;
  
}
.signin:hover {
  color: orange !important;

}
</style>

<div ng-controller="suggestionController" class="row bg-primary" style="margin-top: 140px; margin-bottom: 50px;">

        <div class="suggestImage "></div>
    {{-- #f5f5f0 --}}

    
 
     <center><h2 style="color:orange"><span style="background:white;border-radius: 10px; padding: 10px;border: 1px solid #3385ff;">Suggestion Box</span></h2></center>
<br/>
    <h3 style="float:right; margin-right:10%;margin-top: -70px; "><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>suggestionbox/show_suggest"><i><u class="signin"> HR Signin </u></i></a></h3> 
     <br/><br/>
     
    
    <form name="suggestForm" style="margin-left:25%;" >

    <div class="container col-sm-8 col-xs-11">

      <div class="">    
          <label for="fname" class="text-white" style="padding: 5px;"><h3>Subject</h3></label>        
          <input type="text" ng-model="subject" class="form-control" id="fname" name="firstname" placeholder="What is this about ?" ng-required="true" required>        
      </div><br/>      
   
      <div class="">      
          <label for="subject" class="text-white" style="padding: 5px;"><h3>Suggestion</h3></label>       
          <textarea id="subject" ng-model="suggestion" class="form-control" name="subject" placeholder="Write your Suggestion.." style="height:200px" ng-required="true" required></textarea>        
      </div><br/>

      <div style="margin-right: 0px;" class="row pull-right">
        <input class="btn btn-success " ng-click="suggest(suggestForm)" type="submit" value="Submit">
      </div>
      <br/><br/><br/><br/>

    </div>
      </form>

    
    
</div>


    @endsection