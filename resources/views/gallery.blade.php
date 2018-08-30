@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div ng-controller="galleryController">
	<!--content-->
	<div class="content" style="padding-top: 50px; padding-bottom: 50px;">
	
		<!--/ab-->
	<div class="banner_bottom">
		<div class="container">
			<h3 class="tittle-w3ls">Gallery</h3>
			<div class="inner_sec_info_wthree_agile">
				<!--/projects-->
				<ul class="portfolio-categ filter">
					<li class="port-filter all active">
						<a href="#">All</a>
					</li>
				</ul>

				<ul class="portfolio-area">

					<li ng-repeat="Gallery in Galleries" class="portfolio-item2" data-id="id-0" data-type="cat-item-4">
						<div>
							<span class="image-block block2 img-hover">
								<a class="image-zoom" href="http://<?php echo Config::get('constants.BASE_URL'); ?>gallery/@{{Gallery.id}}" rel="prettyPhoto[gallery]">
									<img ng-src="http://<?php echo Config::get('constants.Storage_URL'); ?>images/galleries/@{{Gallery.image}}" on-error-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" class="img-responsive" alt="Conceit">
									<div class="port-info">
										<h5>@{{Gallery.name}}</h5>
										<p>Updated: @{{utilityService.get_date_string(Gallery.created_at)}}</p>
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
		<!--//projects-->

	</div>
	<!--End content-->

</div>
@endsection