@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | CEO Message')

@section('content')
<div n1g-controller="productController" n1g-init="product_id = @{{$product_id}};">
	<!--content-->
	<div class="content" style="padding-top: 150px; padding-bottom: 100px;">
		<center>
			<br/>
			<br/>
			<font style="font-family: 'Raleway', sans-serif; font-weight: bold; font-size: 48px; color: #737070;">
				CEO's Message
			</font>
			<br/>
			<br/>
			<video width="640" height="480" autoplay controls>
				<source src="<?php echo Config::get('constants.http_or_https').Config::get('constants.Storage_URL'); ?>videos/ceo_message_to_staff.mp4" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			<p style="color: black; ">
				<span class="glyphicon glyphicon-time">
				<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/clock_white.png" class="" alt="Conceit" style="width: 25px; height: 25px; background-color: transparent; padding: 0px;">
				October 3, 2018
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="glyphicon glyphicon-user">
				<font style="color: #ffb500; word-spacing: normal !important;">
					Ambassador Aloun Ndombet-Assamba, JP
				</font>
			</p>
		</center>
	</div>
	<!--End content-->
</div>
@endsection