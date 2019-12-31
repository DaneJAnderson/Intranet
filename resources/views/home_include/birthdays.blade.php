
<style >
 .thumbs{
	width: 200px !important;
	height: 150px !important;	
}
 .bdayImage{
	width: 350px !important;
	height: 250px !important;	
}
.mr {	
	background: transparent !important;
	border: none !important;
}
#carouselBday .item {
	background: none !important;
}
.slidebb {
	width: 100% !important;	
}
#carouselBday .carousel-inner{
	padding: 0px 20px 0px 20px !important;
}
#carouselBday  .carousel-control:hover,#carouselBday  .carousel-control{
	background: transparent !important;
}
.textShadowbb {
	/* text-shadow: -1px -1px 0 #000, 
	1px -1px 0 #000,
	 -1px 1px 0 #000,
	 1px 1px 0 #000 !important; */
	 color: white;
}
.bgColorbb {
	/* background-color: #ffb500; */
	/* background-color: #ffa089; */
	background-color: #ff887a;
}
.textSmallx {

	font-size: x-small;
}

</style>

{{-- ng-if="Birthdays.length>0" --}}
    <div  class="banner_bottom bgimg bgColorbb" style=" padding-top: 20px; padding-bottom: 20px;">
		<div class="banner_bottom_in">
			<h3 class="tittle-w3ls we " style="color: white;">Staff Birthday Listing</h3>
		

		{{-- --------------------------- Staff Celebrating Birthdays Today  --------------------------- --}}
		
	

	<div  class="row col-12" ng-if="Birthdays.length > 0">

			<p >
				<h2 class="textShadowbb">All the staff here at COK would like to say a big Happy birthday to you on your special day.
				</h2>
			</p> 
			<br/><br/>	
		<p >
			<h2 class="textShadowbb">Celebrating Birthday Today.
			</h2>
		</p>
		
		{{-- -------------------------------- Staff ----------------------------------- --}}

			<div ng-repeat="Birthday in Birthdays" ng-class="{'col-xs-offset-3':  Birthdays.length ==1 || (Birthdays.length%2 != 0 && $index == Birthdays.length-1)}" class="col-sm-6  thumbnail mr">	
			<div class="bdayImage">
				<img class="bdayImage img-rounded" ng-if="Birthday.sex==0" src="images/Male_worker.png" alt="male pic" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="images/Male_worker.png" />

				<img class="bdayImage img-rounded" ng-if="Birthday.sex==1" src="images/Female_worker.png" alt="female pic" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="images/Female_worker.png" />				
				<div class="p-1 bg-primary text-center ">
					<span style="font-size:large">@{{Birthday.first_name+' '+Birthday.last_name}} </span>
					{{-- <br/>Birthday:  <span ng-bind="convertToDate(Birthday.dob) | date:'d MMMM'"></span> --}}
					<br/><span class=" text-white text-left "> Department: <span ng-bind="Birthday.department" ng-if="Birthday.department" ></span></span>
				</div>
			</div>

			</div>
		
	</div>

		</div>
				
		{{-- --------------------- Upcoming BirthDays Thumbnails  Carousel -------------------------------- --}}
<br/><br/>

<div ng-if="UpcomingBday1st.length > 0" class="row col-12 slidebb container-fluid">

				<p >
					<h2 class="textShadowbb text-center">Upcoming Birthdays .
					</h2>
				</p>
<br/><br/>

<div id="carouselBday" class="carousel slide col-xs-12 col-md-10" data-ride="carousel">
	<div class="carousel-inner " role="listbox">

		{{-- UpcomingBirthday --}}

		{{-- First Thumb Slide --}}
		<div class="item active">
			<div class="row">
			
				<div ng-repeat="birthday1 in UpcomingBday1st | limitTo : 4" class="col-xs-3  thumbnail mr">

					<img ng-if="birthday1.sex==0" class="thumbs img-rounded" src="images/Male_worker.png"
					ng-src="@{{getBirthdayImage(birthday1.image, birthday1.sex)}}"
					 on-error-src="images/Male_worker.png"
					alt="pic">

					<img ng-if="birthday1.sex==1" class="thumbs img-rounded" src="images/Female_worker.png"
					ng-src="@{{getBirthdayImage(birthday1.image, birthday1.sex)}}"
					 on-error-src="images/Female_worker.png"
					alt="pic">
					<div  class="p-1 bg-primary text-center">@{{birthday1.first_name+' '+birthday1.last_name}}		
					<br/>Birthday:  <span ng-bind="convertToDate(birthday1.dob) | date:'d MMMM'"></span>
						<br/><span class=" text-white text-left textSmallx"> Department: <span ng-bind="substring(birthday1.department)" ng-if="birthday1.department" ></span></span>
					</div>
				</div>

				</div>
			</div>
		
			{{-- Second Thumb Slide --}}
		<div ng-if="UpcomingBday2nd.length  > 0" class="item">
				<div class="row">
				
					<div ng-repeat="birthday2 in UpcomingBday2nd | limitTo : 4" class="col-xs-3 thumbnail mr">
						
					<img ng-if="birthday2.sex==0" class="thumbs img-rounded" src="images/Male_worker.png"
					ng-src="@{{getBirthdayImage(birthday2.image, birthday2.sex)}}"
					 on-error-src="images/Male_worker.png"
					alt="pic">

					<img ng-if="birthday2.sex==1" class="thumbs img-rounded" src="images/Female_worker.png"
					ng-src="@{{getBirthdayImage(birthday2.image, birthday2.sex)}}"
					 on-error-src="images/Female_worker.png"
					alt="pic">
					<div class="p-1 bg-primary text-center">@{{birthday2.first_name+' '+birthday2.last_name}} 
						<br/>Birthday:  <span ng-bind="convertToDate(birthday2.dob) | date:'d MMMM'"></span>
						<br/><span class=" text-white text-left textSmallx"> Department: <span ng-bind="substring(birthday2.department)" ng-if="birthday2.department" ></span></span>
					</div>
					</div>

		        </div>

	    </div>
		<a class="left carousel-control" href="#carouselBday" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
			</a> 
		<a class="right carousel-control" href="#carouselBday" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
			</a> 
  </div>
  
</div>

<div  class="col-md-2 col-xs-12" style="width:80px !important; height: 60px !important; margin-top: 30px"  onclick="alert('Whats up!!')">
	<img class="thumbs img-rounded" style="width:100px !important; height: 80px !important;"  src="images/addBday.png" alt="pic">
</div>
</div>	
    </div>








	<!-- <div ng-repeat="Birthday in Birthdays" class="gallery-item gallery-item_add_on">
					@{{Birthday.first_name+' '+Birthday.last_name}}
					<br/>
					<font style="font-size: 14px;">
						department: @{{Birthday.department}}
					</font>
					<br/>
					<img src="http://<?php // echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="http://<?php // echo Config::get('constants.BASE_URL'); ?>images/icons/image_not_available.png" alt="" />
				</div>

				<div class="gallery-thumbnails" style="">
					<a ng-repeat="Birthday in Birthdays" href="#">
						<img ng-if="Birthday.sex==0" src="images/Male_worker.png" alt="" />
						<img ng-if="Birthday.sex==1" src="images/Female_worker.png" alt="" />
					</a>
				</div> -->