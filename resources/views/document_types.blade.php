@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div ng-controller="documentTypesController" style="margin-left: 100px; margin-top: 100px; margin-right: 100px; margin-bottom: 100px;">
	<!--content-->
	<div class="content">
		<br/>
		<div class="documents_header">
			<center>
				Document types
			</center>
		</div>
		<br/>
		<br/>
		<div class="row">
			<div class="col-xs-12 col-md-4 documents" ng-repeat="document_type in document_types" ng-click="goToDocuments(document_type.id)" style="height: 150px;">
				<center>
					<img ng-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/documents_types/clipboard.png" style="width: 100px; height: 100px;"/>
					<br/>
					<font style="font-weight: bold; margin-left: -10px;">
						@{{document_type.name}}
					</font>
				</center>
			</div>
		</div>
	</div>
	<!--End content-->
</div>
@endsection