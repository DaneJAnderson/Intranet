@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div ng-controller="documentsController" ng-init="document_type_id = {{$id}};" style="margin-left: 100px; margin-top: 100px; margin-right: 100px;">
	<!--content-->
	<div class="content">
		<br/>
		<div class="documents_header">
			<center>
				Documents
			</center>
		</div>
		<br/>
		<center>
			<input type="text" ng-model="search_field" class="search" placeholder="search"/>
		</center>
		<br/>
		<div class="row">
			<div class="col-xs-12 col-md-3 documents" ng-repeat="document in documents" ng-if="filterDocuments(document.name)" style="height: 150px;">
				<center>
					<a href="http://<?php echo Config::get('constants.Storage_URL'); ?>documents/@{{document.file}}" style="text-decoration: none;">
						<img ng-if="document.format == 1" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/pdf.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 2" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/word.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 3" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/excel.png" style="width: 100px; height: 100px;"/>
						<img ng-if="document.format == 4" ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/link.png" style="width: 100px; height: 100px;"/>
					</a>
					<br/>
					<font ng-if="document.name.length > 41" style="font-weight: bold; margin-left: -10px;">
						@{{document.name.substring(0, 39)}}...
					</font>
					<font ng-if="document.name.length < 41" style="font-weight: bold; margin-left: -10px;">
						@{{document.name}}
					</font>
				</center>
			</div>
		</div>
	</div>
	<!--End content-->
</div>
@endsection