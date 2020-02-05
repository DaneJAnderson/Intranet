
<style >
 .thumbs{
	width: 200px !important;
	height: 150px !important;	
}
 .thumbsSlide{
	width: 200px !important;
	/* margin-right: 5px !important; */
	margin-left: 15px !important;
		
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
	text-shadow: -1px -1px 0 rgba(59, 2, 73, 0.5), 
	1px -1px 0 rgba(59, 2, 73, 0.5),
	 -1px 1px 0 rgba(59, 2, 73, 0.5),
     1px 1px 0 rgba(59, 2, 73, 0.5) !important;
     
	 color: white;
}


.bgColorbb {
	/* background-color: #ffb500; */
	/* background-color: #ffa089; */
	/* background-color: #ff887a; */
	background-image: linear-gradient(to right, violet,orange,yellow,#ffd11a,#ffd11a,yellow,orange,violet);
}
.textSmallx {

	font-size: x-small;
}

.upcoming {
    margin-left: 30px;
	/* background: red; */
  }

@media screen and (max-width: 1190px) {
  .upcoming {
    margin-left: -30px;
	/* background: blue; */
  }
}

@media screen and (min-width: 1200px) {
  .upcoming {

	margin-left: 12% !important;
  	
	/* background: blue; */
  }
}

.upComColor {
	background-color: rgb(0, 0, 204,0.6);
	color: white !important;
}


</style>

{{-- ng-if="Birthdays.length>0" --}}
<div class="bgColorbb">
    <div  class="banner_bottom bgimg " style=" padding-top: 20px; padding-bottom: 20px;">
		<div class="banner_bottom_in">
			<h3 class="tittle-w3ls we textShadowbb" style="color: white;">Staff Birthday Listing</h3>
		

		{{-- --------------------------- Staff Celebrating Birthdays Today  --------------------------- --}}
		
	

	<div  class="row col-12" ng-if="Birthdays.length > 0">

			<p >
				<h2 class="textShadowbb">All the staff here at COK would like to say a big Happy birthday to you on your special day.
				</h2>
			</p> 
			<br/><br/>	
		<p >
			<h2 class="textShadowbb ">Celebrating Birthday Today.
			</h2>
		</p>
		
		{{-- -------------------------------- Staff ----------------------------------- --}}
<center>
	<div style="width:110% !important; margin-left:-5%;">
			<div ng-repeat="Birthday in Birthdays" ng-class="{'col-sm-offset-3':  Birthdays.length ==1 || (Birthdays.length%2 != 0 && $index == Birthdays.length-1)}" class="col-sm-6  thumbnail mr">	
			    <div class="bdayImage">
				 <img class="bdayImage img-rounded" ng-if="Birthday.sex==0" src="images/Male_worker.png" alt="male pic" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="images/Male_worker.png" />

				  <img class="bdayImage img-rounded" ng-if="Birthday.sex==1" src="images/Female_worker.png" alt="female pic" ng-src="@{{getBirthdayImage(Birthday.image, Birthday.sex)}}" on-error-src="images/Female_worker.png" />				
				  <div class="p-1 upComColor text-center ">
					<span style="font-size:large">@{{Birthday.first_name+' '+Birthday.last_name}} </span>
					{{-- <br/>Birthday:  <span ng-bind="convertToDate(Birthday.dob) | date:'d MMMM'"></span> --}}
					<br/><span class=" text-white text-left "> Department: <span ng-bind="Birthday.department" ng-if="Birthday.department" ></span></span>
				   </div>
			    </div>
						<br/><br/>
			</div>
		</div>
		</center>
		
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

<div id="carouselBday" class="carousel slide col-xs-12 col-md-11" data-ride="carousel">
	<div class="carousel-inner " role="listbox">

		{{-- UpcomingBirthday --}}

		{{-- First Thumb Slide --}}
		<div class="item active">
								{{-- style="margin-left: 30px;" --}}
			<div class="row upcoming" >
			
				<div ng-repeat="birthday1 in UpcomingBday1st | limitTo : 4" class="col-xs-3 thumbsSlide thumbnail mr">

					<img ng-if="birthday1.sex==0" class="thumbs img-rounded" src="images/Male_worker.png"
					ng-src="@{{getBirthdayImage(birthday1.image, birthday1.sex)}}"
					 on-error-src="images/Male_worker.png"
					alt="pic">

					<img ng-if="birthday1.sex==1" class="thumbs img-rounded" src="images/Female_worker.png"
					ng-src="@{{getBirthdayImage(birthday1.image, birthday1.sex)}}"
					 on-error-src="images/Female_worker.png"
					alt="pic">
					<div  class="p-1 upComColor text-center ">@{{birthday1.first_name+' '+birthday1.last_name}}		
					<br/>Birthday:  <span ng-bind="convertToDate(birthday1.dob) | date:'d MMMM'"></span>
						<br/><span class=" text-white text-left textSmallx"> Department: <span ng-bind="substring(birthday1.department)" ng-if="birthday1.department" ></span></span>
					</div>
				</div>

				</div>
			</div>
		
			{{-- Second Thumb Slide --}}
		<div ng-if="UpcomingBday2nd.length  > 0" class="item">
										{{-- style="margin-left: 30px; " --}}
				<div class="row upcoming" >
				
					<div ng-repeat="birthday2 in UpcomingBday2nd | limitTo : 4" class="col-xs-3 thumbsSlide thumbnail mr">
						
					<img ng-if="birthday2.sex==0" class="thumbs img-rounded" src="images/Male_worker.png"
					ng-src="@{{getBirthdayImage(birthday2.image, birthday2.sex)}}"
					 on-error-src="images/Male_worker.png"
					alt="pic">

					<img ng-if="birthday2.sex==1" class="thumbs img-rounded" src="images/Female_worker.png"
					ng-src="@{{getBirthdayImage(birthday2.image, birthday2.sex)}}"
					 on-error-src="images/Female_worker.png"
					alt="pic">
					<div class="p-1 upComColor text-center ">@{{birthday2.first_name+' '+birthday2.last_name}} 
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

@include('home_include.loginPopup')
{{-- @include('home_include.updateBday') --}}

</div>	
	</div>	
</div>

