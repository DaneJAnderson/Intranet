@extends('layouts.master')

@section('title', 'COK Sodality Credit Union &reg; | Home')

@section('content')
<div n1g-controller="productController" n1g-init="product_id = @{{$product_id}};">
	<!--content-->
	<div class="content noticeboard" style="padding-top: 150px; padding-bottom: 100px; padding-left: 75px; min-height: 1000px; padding-right: 75px;">
	<!--/projects-->
	<h3 class="tittle-w3ls" style="font-family: DK_Cool_Crayon; color: white;"><u>NOTICE BOARD</u></h3>
	<div class="inner_sec">
		<ul class="portfolio-categ filter">
			<li class="port-filter all active">
				<!--a href="#">All</a-->
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
					<!--img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/thumb_tac.png" class="" alt="Conceit" style="z-index: 10; width: 50px; height: 50px; background-color: transparent; padding: 0px; margin-bottom: -50px; margin-top: 0px; left: 250px;"-->
					<span class="image-block">
					<a class="image-zoom" href="http://intranew/COK_HR_MIS/public/" target="_blank" rel="prettyPhoto[gallery]">
						<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/Personal_informaption.png" class="img-responsive" alt="Conceit" style="background-color: white;">
						<div class="port-info" style="background-color: transparent;">
							<h5 style="color: #ffb500; font-family: DK_Cool_Crayon;">Personal Informaption form</h5>
							<p style="color: white; font-family: DK_Cool_Crayon;">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/clock_white.png" class="" alt="Conceit" style="width: 25px; height: 25px; background-color: transparent; padding: 0px;">
								July 31, 2018
							</p>
						</div>
					</a>
				</span>
				</div>
			</li>

			<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
				<div>
					<!--img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/thumb_tac.png" class="" alt="Conceit" style="width: 50px; height: 50px; background-color: transparent; padding: 0px; z-index: 100; position: absolute; margin-bottom: 0px; margin-top: -20px; left: 250px;"-->
					<span class="image-block">
					<a class="image-zoom" href="https://www.cuna.org/cpdonline/" target="_blank" rel="prettyPhoto[gallery]">
						<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/CUNA.png" class="img-responsive" alt="Conceit" style="background-color: white;">
						<div class="port-info" style="background-color: transparent;">
							<h5 style="color: #ffb500; font-family: DK_Cool_Crayon;">Cuna related</h5>
							<p style="color: white; font-family: DK_Cool_Crayon;">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/clock_white.png" class="" alt="Conceit" style="width: 25px; height: 25px; background-color: transparent; padding: 0px;">
								July 31, 2018
							</p>
						</div>
					</a>
				</span>
				</div>
			</li>

			<li class="portfolio-item2" data-id="id-2" data-type="cat-item-1" style="margin-bottom: 25px;">
				<div>
					<!--img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/thumb_tac.png" class="" alt="Conceit" style="width: 50px; height: 50px; background-color: transparent; padding: 0px; z-index: 100; position: absolute; margin-bottom: 0px; margin-top: -20px; left: 250px;"-->
					<span class="image-block">
					<a class="image-zoom" href="http://intranew/intranet/PDF/doc07166420180125163515.pdf" target="_blank" rel="prettyPhoto[gallery]">
						<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/increase_in_card_limit.png" class="img-responsive" alt="Conceit" style="background-color: white;">
						<div class="port-info" style="background-color: transparent;">
							<h5 style="color: #ffb500; font-family: DK_Cool_Crayon;">Debit card limit notice</h5>
							<p style="color: white; font-family: DK_Cool_Crayon;">
								<img src="http://<?php echo Config::get('constants.BASE_URL'); ?>images/clock_white.png" class="" alt="Conceit" style="width: 25px; height: 25px; background-color: transparent; padding: 0px;">
								July 31, 2018
							</p>
						</div>
					</a>
				</span>
				</div>
			</li>

			

			<div class="clearfix"></div>
		</ul>
		<!--end portfolio-area -->

	</div>
	<!--End content-->
</div>
@endsection