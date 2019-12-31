@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')


<div ng-controller="documentsController" ng-init="document_type_id = {{$docData['id']}};" style="margin-left: 100px; margin-top: 100px; margin-right: 100px;">
	
	<!--content-->
	<div class="content">
		<br/>
		{{-- documents_header --}}
		<br/><br/>
			<center>
				<div >
				<span class="documentTypeHead shadow-lg ">
				{{$docData['docType']}}
				</span>
			</div>
			</center>
		
		<br/>
		<center>
			<input type="text" ng-model="search_field" class="search documentSearch" placeholder="   Search.."/>
		</center>
		
		<div id="stickyDocType">
			 <h3 >{{strtoupper($docData['docType'])}} </h3> </div>
		<br/><br/>
		<br/><br/>

		

		<div class="row">
			<div class="col-xs-12 col-md-3 documents" ng-repeat="document in documents" ng-if="filterDocuments(document.name)" style="height: 160px;">
				<a href="http://<?php echo Config::get('constants.Storage_URL'); ?>documents/@{{document.file}}" download>
					<span class="glyphicon glyphicon-download" style="float: right; font-weight: bold; font-size: 24px; margin-top: 10px;"></span></p>
				</a>
				<center>
					<a ng-if="document.format != 5" href="http://<?php echo Config::get('constants.Storage_URL'); ?>documents/@{{document.file}}" style="text-decoration: none;">
						<img ng-if="document.format == 1" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/pdf.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 2" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/word.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 3" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/excel.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 4" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/link.png" style="width: 100px; height: 100px;"/>
					</a>
					<a ng-if="document.format == 5" href="http://<?php echo Config::get('constants.BASE_URL'); ?>documents/@{{document_type_id}}/@{{document.id}}" style="text-decoration: none;">
						<img ng-if="document.format == 5" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/folder.png" style="width: 100px; height: 100px;"/>
					</a>
					<br/>
					<font ng-if="document.name.length >= 40" style="font-weight: bold; margin-left: -10px; ">
						@{{document.name.substring(0, 40)}}...					
					</font>
					<font ng-if="document.name.length < 40" style="font-weight: bold; margin-left: -10px; ">
						@{{document.name}}
					</font>
				</center>
			</div>
		</div>
	</div>
	<!--End content-->
</div>
<br/><br/>
@endsection