@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Article')

@section('content')
<link href="http://<?php echo Config::get('constants.BASE_URL'); ?>css/single.css" rel="stylesheet" type="text/css" media="all" />
<div ng-controller="articleController" ng-init="id = {{$id}};">
	<!--content-->
	<div class="content">
		<div class="banner_inner_con" style="background: url(../images/banner2_.jpg)">
		</div>
		<div class="services-breadcrumb">
			<div class="inner_breadcrumb">

				<ul class="short">
					<li><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>">Home</a><span>|</span></li>
					<li>Article</li>
				</ul>
			</div>
		</div>
		<!--//banner_info-->
		<!-- /inner_content -->
		<div class="banner_bottom">
			<div class="container">
				<div class="col-md-9 technology-left">
					<div class="business">
						<div class=" blog-grid2">
							<img ng-if="Article.image == null" src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/banner2_.jpg" class="img-responsive" alt=""/>
							<img ng-src="http://<?php echo Config::get('constants.Storage_URL'); ?>images/articles/@{{Article.image}}" class="img-responsive" alt=""/>
							<div class="blog-text">
								<h5>@{{Article.title}}</h5>
								<p>
									@{{Article.content}}
								</p>
							</div>
						</div>

						<!--div class="comment-top">
							<h4>Comment</h4>
							<div class="media-left">
								<a href="#">
									<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/t1.jpg" alt="">
							  </a>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Richard Spark</h6>
								<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio,
									vestibulum in vulputate at, tempus viverra turpis.</p>
								<div class="media second">
									<div class="media-left">
										<a href="#">
										<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/t3.jpg" alt="">
								  </a>
									</div>
									<div class="media-body">
										<h6 class="media-heading">Joseph Goh</h6>
										<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio,
											vestibulum in vulputate at, tempus viverra turpis.</p>
										<div class="media">
											<div class="media-left">
												<a href="#">
										<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/t2.jpg" alt="">          
									 </a>
											</div>
											<div class="media-body">
												<h6 class="media-heading">Melinda Dee</h6>
												<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus
													odio, vestibulum in vulputate at, tempus viverra turpis.</p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="comment">
							<h3>Leave a Comment</h3>
							<div class="comment-bottom">
								<form action="#" method="post">
									<input type="text" name="Name" placeholder="Name" required="">
									<input type="email" name="Email" placeholder="Email" required="">

									<input type="text" name="Subject" placeholder="Subject" required="">

									<textarea name="Message" placeholder="Message..." required=""></textarea>

									<input type="submit" value="Send">
								</form>
							</div>
						</div-->
					</div>
				</div>
				<!-- technology-right -->
				<div class="col-md-3 technology-right-1">
					<div class="blo-top">
						<div class="tech-btm">
							<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/banner1.jpg" class="img-responsive" alt="" />
						</div>
					</div>
					<div class="blo-top">
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
							<h4>Lastest articles </h4>
							<div class="blog-grids" ng-repeat="article in Articles">
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
	</div>
	<!--End content-->
</div>
@endsection