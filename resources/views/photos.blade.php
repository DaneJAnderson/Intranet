@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Photos')

@section('content')

<script>
function Show_Photo()
{
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'fast',
			slideshow:5000,
			theme:'light_rounded',
			show_title:false,
			overlay_gallery: false
	});	
}
</script>



<div ng-controller="photosController" ng-init="document_type_id = 2;">
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

					<li ng-repeat="Photo in Photos" class="portfolio-item2" data-id="id-0" data-type="cat-item-4">
						<div>
							<span class="image-block block2 img-hover">
								<a class="image-zoom" href="http://<?php echo Config::get('constants.Storage_URL'); ?>images/photos/@{{Photo.image}}" rel="prettyPhoto[gallery]">
									<img ng-src="http://<?php echo Config::get('constants.Storage_URL'); ?>images/photos/@{{Photo.image}}" on-error-src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" class="img-responsive" alt="Conceit" on1load="Show_Photo();">
									<!--div class="port-info">
										<h5>@{{Photo.name}}</h5>
										<p>Updated: @{{utilityService.get_date_string(Gallery.created_at)}}</p>
									</div-->
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