@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/single.css" rel="stylesheet" type="text/css" media="all" />
<div ng-controller="homeController">
<!--content-->
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<!--li data-target="#myCarousel" data-slide-to="3" class=""></li-->
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Vision</h3>
						<p>
							To be the leader in all markets we serve; by being a member-focused, financially sound, profitable and <b style="color: #ffb500;">technology-driven</b> organization with a highly competent and motivated team.
						</p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="http://<?php echo Config::get('constants.BASE_URL'); ?>about">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="http://<?php echo Config::get('constants.BASE_URL'); ?>about" class="two scroll ">About COK</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<!--h3>COK Health fair 2018</h3>
						<p>You deserve the best</p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="single.html">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="portfolio.html" class="two scroll ">Portfolio</a>
							</div>
							<div class="clearfix"> </div>
						</div-->
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<!--h3>Giving back you the commity</h3-->
						<p>Blast Off 2018</p>
						<!--div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="single.html">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="portfolio.html" class="two scroll ">Portfolio</a>
							</div>
							<div class="clearfix"> </div>
						</div-->
					</div>
				</div>
			</div>
			<!--div class="item item4">
				<div class="container">
					<div class="carousel-caption">

						<h3>Best Business Thinking</h3>
						<p>You deserve the best</p>
						<div class="top-buttons">
							<div class="bnr-button">
								<a class="act" href="single.html">Read More</a>
							</div>
							<div class="bnr-button">
								<a href="#portfolio" class="two scroll ">Portfolio</a>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div-->
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->

	<div class="row">
		<div class="col-md-9">
			<!--/banner_bottom-->
			<div class="banner_bottom" style="">
				<div class="banner_bottom_in" style="margin-left: auto; margin-right: auto; width: 90%;">
					<h3 class="tittle-w3ls we">COK colourfully celebrated black history, reggae and Jamaica.</h3>

					<p>
						It was a beautiful affair at the Cross Roads branch of COK Sodality Co-operative Credit Union last Friday as staff members - including.
						<a href="http://www.loopjamaica.com/taxonomy/term/56731"> Read on loop</a>
					</p>


					<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/GsBZBH7Qc1.jpg" class="img-responsive" alt="">
				</div>
			</div>
			<!--//banner_bottom-->
		</div>
		<div class="col-md-3" style="padding-top: 98px; padding-bottom: 98px;">
			<!-- technology-right -->
			<div class="col-md-3 technology-right-1" style="width: 100%;">
				<div class="blo-top" style="display: none;">
					<div class="tech-btm">
						<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/banner1.jpg" class="img-responsive" alt="" />
					</div>
				</div>
				<div class="blo-top" style="display: none;">
					<div class="tech-btm">
						<h4>Thanks for reading</h4>
						<p>Continue by reading some more articles.</p>
						<!--div class="name">
							<form action="#" method="post">
								
								<input type="email" name="Email" placeholder="Email" required="">
								<div class="button">

									<input type="submit" value="Subscribe">

								</div>
							</form>
						</div-->

						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="blo-top1">
					<div class="tech-btm">
						<h4>Lastest Updates</h4>
						<div class="blog-grids" ng-repeat="article in Articles | limitTo:4">
							<div class="blog-grid-left">
								<a ng-if="article.image == null" href="http://<?php echo Config::get('constants.BASE_URL'); ?>"><img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/g6.jpg" class="img-responsive" alt=""/></a>
								<a ng-if="article.image != null" href="http://<?php echo Config::get('constants.BASE_URL'); ?>"><img ng-src="http://<?php echo Config::get('constants.Storage_URL'); ?>images/articles/@{{article.image}}" class="img-responsive" alt=""/></a>
							</div>
							<div class="blog-grid-right">

								<h5><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>article/@{{article.id}}">@{{article.title}}</a> </h5>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>

			</div>
			<div class="clearfix"></div>
		</div>
	</div>


	<!--/banner_bottom-->
	<div ng-if="Birthdays.length>0" class="banner_bottom bgimg" style="background-color: #ffb500; padding-top: 20px; padding-bottom: 20px;">
		<div class="banner_bottom_in">
			<h3 class="tittle-w3ls we" style="color: white;">Staff Birthday Listing</h3>

			<p style="color: white;">
				All the staff here at COK would like to say a big Happy birthday to you on your special day.
			</p>
			
			<div class="gallery" style="background-color: transparent;">
				<div ng-repeat="Birthday in Birthdays" class="gallery-item gallery-item_add_on">
					@{{Birthday.first_name+' '+Birthday.last_name}}
					<br/>
					<font style="font-size: 14px;">
						department: @{{Birthday.department}}
					</font>
					<br/>
					<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" alt="" />
				</div>

				<div class="gallery-thumbnails" style="">
					<a ng-repeat="Birthday in Birthdays" href="#">
						<img ng-if="Birthday.sex==0" src="images/Male_worker.png" alt="" />
						<img ng-if="Birthday.sex==1" src="images/Female_worker.png" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--//banner_bottom-->

	<!--/blog-->
	<div class="blog_sec">
		<h3 class="tittle-w3ls">Latest Updates</h3>
		<div class="col-md-6 banner-btm-left">
			<div class="banner-btm-top" ng-if="Articles[0]">
				<div class="banner-btm-inner a1">
					<div class="blog_date">

						<h4>@{{utilityService.get_date_string(Articles[0].updated_at)}}</h4>

					</div>
					<h6><a href="single.html">@{{Articles[0].title}}</a></h6>
					<p class="paragraph">@{{Articles[0].content.substring(0, 300)}}</p>
					<div class="clearfix"></div>
					<a href="http://<?php echo Config::get('constants.BASE_URL'); ?>article/@{{Articles[0].id}}" class="blog-btn">Know More</a>
				</div>
				<div class="banner-btm-inner a2">

				</div>
			</div>
			<div class="banner-btm-bottom" ng-if="Articles[2]">
				<div class="banner-btm-inner a3">

				</div>
				<div class="banner-btm-inner a4">
					<div class="blog_date">

						<h4>@{{utilityService.get_date_string(Articles[2].updated_at)}}</h4>

					</div>
					<h6><a href="single.html">@{{Articles[2].title}}</a></h6>
					<p class="paragraph">@{{Articles[2].content.substring(0, 300)}}</p>
					<div class="clearfix"></div>
					<a href="http://<?php echo Config::get('constants.BASE_URL'); ?>article/@{{Articles[2].id}}" class="blog-btn">Know More</a>
				</div>
			</div>
		</div>
		<div class="col-md-6 banner-btm-left">
			<div class="banner-btm-top" ng-if="Articles[1]">
				<div class="banner-btm-inner a1">
					<div class="blog_date">

						<h4>@{{utilityService.get_date_string(Articles[1].updated_at)}}</h4>

					</div>
					<h6><a href="single.html">@{{Articles[1].title}}</a></h6>
					<p class="paragraph">@{{Articles[1].content.substring(0, 300)}}</p>
					<div class="clearfix"></div>
					<a href="http://<?php echo Config::get('constants.BASE_URL'); ?>article/@{{Articles[1].id}}" class="blog-btn">Know More</a>
				</div>
				<div class="banner-btm-inner a5">

				</div>
			</div>
			<div class="banner-btm-bottom" ng-if="Articles[3]">
				<div class="banner-btm-inner a6">

				</div>
				<div class="banner-btm-inner a4">
					<div class="blog_date">

						<h4>@{{utilityService.get_date_string(Articles[3].updated_at)}}</h4>

					</div>
					<h6><a href="single.html">@{{Articles[3].title}}</a></h6>
					<p class="paragraph">@{{Articles[3].content.substring(0, 300)}}</p>
					<div class="clearfix"></div>
					<a href="http://<?php echo Config::get('constants.BASE_URL'); ?>article/@{{Articles[3].id}}" class="blog-btn">Know More</a>
				</div>
			</div>
		</div-->
		<div class="clearfix"></div>
	</div>

	<!--//blog-->

	
	<!--/bottom-->
	<div class="banner_bottom">
		<div class="container">
			<h3 class="tittle-w3ls">COK Giving back to the community
			</h3>
			<div class="inner_sec_info_wthree_agile">
				<div class="help_full">

					<div class="col-md-6 banner_bottom_left">
						<h4>Labour day projects</h4>
						<p>
							COK Sodality credit union has a long tradition of giving back to the sorrounding communities
							of our branches. On labour day there was no difference. to view more images from our labourday projects
							please click the link below.
						</p>
						<div class="ab_button">
							<a class="btn btn-primary btn-lg hvr-underline-from-left" href="#" role="button">Read More </a>
						</div>


					</div>

					<div class="col-md-6 banner_bottom_grid help">
						<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/labour_day_2014.jpg" alt=" " class="img-responsive">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--//bottom-->


	<!--/projects-->
	<div class="banner_bottom proj">
		<div class="wrap_view">
			<h3 class="tittle-w3ls">Departments</h3>
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

					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-4" style="margin-bottom: 25px;">
						<div>
							<span class="image-block img-hover">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/accounting.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/accounting.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Accounts</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-1" data-type="cat-item-2" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/atm.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/atm.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>ATM</h5>
									<p>Services</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/audit.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/audit.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Audit</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-3" data-type="cat-item-4" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/cambio.png" rel="prettyPhoto[gallery]">
								
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/cambio.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Cambio</h5>
									<p>Services</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-4" data-type="cat-item-3" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/centralised_services.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/centralised_services.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Centralised Services</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-5" data-type="cat-item-2" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/ceo.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/ceo.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>CEO's</h5>
									<p>Office</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-6" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Pensions.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Pensions.png" class="img-responsive" alt="Conceit">
							    <div class="port-info">
									<h5>COK Pension Fund</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Credit_and_Collections.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Credit_and_Collections.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Credit Administration</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Debt_Management.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Debt_Management.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Debt Management</h5>
									<p>unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/faciliies.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/faciliies.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Facilities</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Financial_Services.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Financial_Services.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Financial Services</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Human_Resource.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Human_Resource.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Human Resources & Learning</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/MIS.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/MIS.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Management Information Systems</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Member_Experience.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Member_Experience.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Member Experience</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/marketing.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/marketing.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Marketing</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Micro_Finance.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Micro_Finance.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Micro Finance</h5>
									<p>Unit</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Operations.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Operations.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Operations</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Registery.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Registery.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Registry</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Remittance.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Remittance.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Remittance</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Risk_and_Complience.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Risk_and_Complience.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Risk & Compliance</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Securities.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Securities.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Securities Administration</h5>
									<p>Department</p>
								</div>
							</a>
						</span>
						</div>
					</li>

					<li class="portfolio-item2" data-id="id-7" data-type="cat-item-1" style="margin-bottom: 25px;">
						<div>
							<span class="image-block">
							<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Strategic_Planning.png" rel="prettyPhoto[gallery]">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Strategic_Planning.png" class="img-responsive" alt="Conceit">
								<div class="port-info">
									<h5>Strategic Planning</h5>
									<p>committee</p>
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