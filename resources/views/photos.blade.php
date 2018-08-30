@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div n1g-controller="productController" n1g-init="product_id = @{{$product_id}};">
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

					<li class="portfolio-item2" data-id="id-0" data-type="cat-item-4">
						<div>
							<span class="image-block block2 img-hover">
							<a class="image-zoom" href="images/g1.jpg" rel="prettyPhoto[gallery]">
							
									<img src="images/g1.jpg" class="img-responsive" alt="Conceit">
									<div class="port-info">
											<h5>View Project</h5>
											<p>Add Some Description</p>
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