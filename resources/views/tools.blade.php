@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div n1g-controller="homeController" style="padding-top: 50px;">
<!--content-->
	
	<!--/projects-->
	<div class="banner_bottom proj">
		<div class="wrap_view">
			<h3 class="tittle-w3ls">Websites and Apps</h3>
			<div class="inner_sec">
				<ul class="portfolio-categ filter">
					<li class="port-filter all active">
						<a href="#">All</a>
					</li>
					<!--li class="cat-item-1">
						<a href="#" title="Category 1">Category 1</a>
					</li>
					<li class="cat-item-2">
						<a href="#" title="Category 2">Category 2</a>
					</li>
					<li class="cat-item-3">
						<a href="#" title="Category 3">Category 3</a>
					</li>
					<li class="cat-item-4">
						<a href="#" title="Category 4">Category 4</a>
					</li-->
				</ul>


				<ul class="portfolio-area" style="">

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="https://www.cuna.org/cpdonline/" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/CUNA.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Cuna forms</h5>
									<p>Yearly forms</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>document_types" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Documents.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Documents</h5>
									<p>Member and Policy documents, etc</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-4" style="margin-bottom: 25px;">
						<div>
							<span class="image-block img-hover">
							<a class="image-zoom" href="http://192.168.110.239/License_Manager/public/login" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/License_Manager.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>License Manager</h5>
									<p>License Maintenance</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-1" data-type="cat-item-2" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://192.168.110.239/Meeting/" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/meeting_scheduler.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Meeting Scheduler</h5>
									<p>Make meeting room request</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://intranew/COK_HR_MIS/public/" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Personal_informaption.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Personal information Form</h5>
									<p>Yearly forms</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://intranew/queuing_system/" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Queueing_System.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Queueing System</h5>
									<p>MSO and front desk application</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="https://mail.cokcu.com" target="_blank" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/WebMail.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Webmail</h5>
									<p>Internal email system</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<div class="clearfix"></div>
				</ul>
				<!--end portfolio-area -->

			</div>

		</div>
	</div>

	<!--//projects-->
	
<!--content-->
</div>
@endsection