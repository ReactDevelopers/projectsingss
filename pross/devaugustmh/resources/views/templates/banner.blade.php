
    <!--home start-->
    
    <div id="home">
    <div class="headerLine"
	@if($banner_image)
	style="background-image: url({{asset('uplodes/banner/'.$banner_image->banner_image)}});"
    @endif
	>
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="{{\App::make('url')->to('/')}}">
							<img class="LogoImg" src="{{asset('images/logos/amhlogo.png')}}" alt="August Media Holdings Logo">
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu" style="text-align: center;">
						<ul id="menu">
							<li class="active" ><a href="#home">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#project">Projects</a></li>
							<li><a href="#news">News</a></li>
							<li class="last"><a href="#contact">Contact</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery">
                	<div class="posterLogo">
                 
                    </div>
				</div>
			</div>
		</div>
    </div>
		<div class="container">
			<div class="row">
				<div class="row footer">
					<div class="col-md-12">
						<h3>Connect with August Media</h3>
						<p>Subscribe to our newsletter or connect with us on Social Media to have all your questions answered. Stay up-to-date about AMH news, happenings, latest job openings, internships and requirements for animation services. <br>
					  </p>
						<div class="fr">
						<div id ="ajax_response"></div>
						<div id="subscribe_loading" style="display:none;"><img src="{{asset('images/loading.gif')}}"></div>
						<form role="form" method="post" onsubmit="javascript:return false;" action="" _ajax="1" id="subscribeform">
							<div style="display: inline-block;">
								{{ csrf_field() }}
								<input class="col-md-6 fEmail" name="subscribe_email" id="subscribe_email" placeholder="Enter Your Email"/>
								<a href="javascript:void(0);" id ="btnsubscribe" class="subS">Subscribe</a>
							</div>
						</form>
						</div>
					</div>
                    <div class="soc col-md-12">
                        <ul>
							<li><a href="https://www.facebook.com/AugustMediaHoldings"><i class="soc fa fa-facebook-square"></i></a></li>
							<li><a href="https://twitter.com/augustmediasg"><i class="soc fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/august-media-holdings-pte-ltd"><i class="soc fa fa-linkedin-square"></i></a></li>
							<li><a href="#"><i class="soc fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="soc fa fa-youtube-play"></i></a></li>
						</ul>
					</div>   
				</div>
		</div>
    </div>
    </div>