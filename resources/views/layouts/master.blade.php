<!--
	Autthor:	Gavin Palmer
	Date   :	May 1st, 2018
	Company:	COK Sodality Credit Union
	Project:	COK Intranet 2018
-->
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<!--meta  tag-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=10" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<!--meta  tag-->
<!--css-->
<!-- <link rel="stylesheet" href="/css/app.css"> -->

<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/All_Styles(COK_Intranet).css" rel="stylesheet" type="text/css">
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>

<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/Home.css" rel="stylesheet" type="text/css" media="all" />

<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/header.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/document.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/font-awesome.css" rel="stylesheet">
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/prettyPhoto.css" rel="stylesheet">
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/prism.css" rel="stylesheet">
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/semantic.ui.min.css" rel="stylesheet">
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/pignose.gallery.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,300,300i,400,400i,500,500i,600,600i,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700" rel="stylesheet">
<!--css-->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/jquery.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/jquery-2.2.3.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/bootstrap.js"></script>


<!--Sweet alert-->
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/sweetalert/css/sweetalert.css" rel="stylesheet">
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/sweetalert/js/sweetalert.min.js"></script>
<!-- End sweet alert-->
<!-- Favicon
============================================ -->
<link rel="shortcut icon" type="image/x-icon" href="http://<?php echo Config::get('constants.BASE_URL').'/images/cok_50_logo_128x128.png' ?>">

<!-- =============== <?php echo Config::get('constants.App_name')?> =============== -->

<!-- JS Files
============================================ -->

<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/All_Scripts(COK_Intranet).js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/easing.js"></script>
<!--script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/move-top.js"></script-->
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/jquery.quicksand.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/script.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/jquery.prettyPhoto.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/jquery.latest.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/semantic.ui.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/prism.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/pignose.gallery.min.js"></script>

<!-- Angular App
============================================ -->
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/angular.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/angular-ui-router.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/angular-animate.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/ui-bootstrap-tpls-2.5.0.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/angular-sanitize.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>vendors/angular/js/angular-touch.min.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/App.js"></script>
<!-- Angular Controllers
============================================ -->
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/homeController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/articleController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/documentsController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/documentTypesController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/galleryController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/photosController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/documentsSubtypesController.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/bdayLoginPopup.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/updateBdayPagination.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/editbdayPopup.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/dobpicker.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/controllers/suggestionController.js"></script>
<!-- Angular Factories
============================================ -->
<!--script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/factories/eventsFactory.js"></script-->
<!-- Angular Services
============================================ -->
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/services/utilityService.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/services/userService.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/services/articleService.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/services/documentsService.js"></script>
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/services/galleryService.js"></script>
<!-- Angular Directives
============================================ -->
<script src="http://<?php echo Config::get('constants.BASE_URL'); ?>js/directives/OnErrorSrc.js"></script>
<title> @yield('title') </title>
</head>
<body ng-app="App">

	<!--div ui-view></div-->
	<div style="display:none">
	<!--?php
		include(Config::get('constants.BASE_URL').'google_adsense.php');
		include(Config::get('constants.BASE_URL').'analyticstracking.php');
	?-->
	</div>
	@include('includes.header')
	
	<!-- Add your site or application content here -->
	@yield('content')
	
	@include('includes.footer')
	
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});

		jQuery(document).ready(function ($) {
			$(".scroll, .navbar li a, .footer li a").click(function (event) {
				if(this.hash){
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			}
			});
		});

		$(function() {
			$('.gallery').pignoseGallery({
				thumbnails: '.gallery-thumbnails'
			});
		});

		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			/*$().UItoTop({
				easingType: 'easeOutQuart'
			});*/

		});
	</script>
</body>
</html>