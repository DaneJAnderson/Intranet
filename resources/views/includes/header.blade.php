<!--header-->

<div class="header " n1g-controller="headerController">
	<div class="top_header " id="home">
		<!-- Fixed navbar -->
		<nav class="navbar bg-primary navbar-default navbar-fixed-top" style1="background-image: url('images/strip.png'); ">
			<div class="nav_top_fx_w3ls_agileinfo ">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          			</button>
					<div class="logo-w3layouts-agileits">
						<img src="http://<?php echo Config::get('constants.BASE_URL').'/images/cok_50_logo_128x128.png' ?>" style="width: 60px; height: 60px; vertical-align: middle; display: inline-block;"/>
						<span style="vertical-align: middle;  display: inline-block; margin-top: 10px; margin-right: 10px;">
							<h1> <a class="navbar-brand textShadow" href="http://<?php echo Config::get('constants.BASE_URL'); ?>" style="color: #ffb500;"><!--i class="fa fa-clone" aria-hidden="true" style="color: #ffb500;"--></i> COK Sodality <span class="desc" style="margin-top: 10px;">Invest in your future today!</span></a></h1>
						</span>
					</div>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<div class="nav_right_top">
						<ul class="nav navbar-nav navbar-right">
							<!--li><a class="request" href="contact.html">Send Request</a></li-->

						</ul>
						<ul class="nav navbar-nav textShadow">
							<li class=""><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>" >Home</a></li>
							<li><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>about">About COK</a></li>
							<li><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>noticeboard">Notice Board</a></li>
							<li><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>tools">Tools</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quick Links <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="http://<?php echo Config::get('constants.BASE_URL'); ?>document_types">Documents</a></li>
									<li><a href="http://intranew/queuing_system" target="_blank">Queueing System</a></li>
									<li><a href="https://mail.cokcu.com" target="_blank">WebMail</a></li>


								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>
	</div>
</div>

<!--header-->