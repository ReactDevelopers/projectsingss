<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>AIPRO</title>
	<meta charset="utf-8">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/animations.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/fonts.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/main.css') !!}" class="color-switcher-link">
    
	
    <script src="{!! asset('js/vendor/modernizr-2.6.2.min.js') !!} "></script>
	

	<!--[if lt IE 9]>
        <script src="{!! asset('js/vendor/html5shiv.min.js') !!} "></script>
        <script src="{!! asset('js/vendor/respond.min.js') !!} "></script>
        <script src="{!! asset('js/vendor/jquery-1.12.4.min.js') !!} "></script>
	<![endif]-->

</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="./">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="theme_button">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div>
	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">
			<!-- template sections -->
			@include('layouts.top')
			
			<header class="page_header header_white toggler_xs_right section_padding_15">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell">
								<a href="./" class="logo top_logo">
									<img src="images/logo.png" alt="">
									<span class="logo_text">
										Association of <br>Independent<br>Producers
										<strong>Singapore</strong>
									</span>
								</a>
							</div>

							<div class="header_mainmenu display_table_cell text-center">
								<!-- main nav start -->
								<nav class="mainmenu_wrapper">
									<ul class="mainmenu nav sf-menu">
										<li class="active">
											<a href="index.html">Home</a>
										</li>
										
										<!--About Menu-->
										<li>
											<a href="#">About Us</a>
											<ul>
												
                                                <li>
													<a href="whoweare.html">Who we Are</a>
												</li>

												<li>
													<a href="whatwedo.html">What we Do</a>
												</li>
												
												<li>
													<a href="officebearers.html">Office Bearers</a>
												</li>

												<li>
													<a href="reports.html">Industry Reports</a>
												</li>
												
												<li>
													<a href="updates.html">AIPRO Updates</a>
												</li>

											</ul>
										</li>
										<!-- eof About Menu -->
										
										<!--  Members Menu  -->
										
										<li><a href="#">members</a>
										  <ul>
												
                                                <li>
													<a href="#">Members directory</a>
                                                    <ul>
                                                      <li>
                                                      <a href="allmembersA.html">Full Members</a>
                                                      </li>
                                                      <li>
                                                      <a href="allmembersB.html">Associate Members</a>
                                                      </li>
                                                    </ul>
												</li>

												<li>
													<a href="benefits.html">member benefits</a>
												</li>
												
												<li>
													<a href="criteria.html">membership criteria</a>
												</li>
                                                <li>
													<a href="codeofconduct.html">Code of Conduct</a>
												</li>
												<li>
													<a href="join.html">join aipro</a>
												</li>

											</ul>
										</li>
										
										<!-- eof Members Menu-->

	
										<!-- gallery -->
										<li><a href="#">Resources</a>
										  <ul>
												<!-- Gallery regular -->
												<li>
													<a href="#">Redeem Benefits</a>
													<ul>
														<li>
															<a href="finance.html">Insurance/ Finance</a>
														</li>
														<li>
															<a href="equipment.html">Equipment &amp; Accessories</a>
														</li>
                                                        <li>
															<a href="location.html">Studios &amp; Locations</a>
														</li>
                                                        <li> <a href="govschemes.html">Government Schemes</a> </li>
													</ul>
												</li>
												<!-- eof Gallery regular -->

												<!-- Gallery full width -->
												<li>
													<a href="#">Document Repository</a>
													<ul>
														<li>
															<a href="legalpersonnel.html">Personnel Agreements</a>
														</li>
														<li>
															<a href="legalcommercial.html">Commercial Agreements</a>
														</li>
														<li>
															<a href="treaties.html">Co-Production Treaties</a>
														</li>
													</ul>
												</li>
												<!-- eof Gallery full width -->

												<!-- Gallery extended -->
												<li>
													<a href="#">Events Calendar</a>
													<ul>
														<li>
															<a href="tradecalendar.html">Trade Shows &amp; Markets</a>
														</li>
														<li>
															<a href="pitches.html">Upcoming Pitches</a>
														</li>
														<li>
															<a href="masterclass.html">Seminars &amp; Masterclasses</a>
														</li>
													</ul>
												</li>
												<!-- eof Gallery extended -->

												<!-- Gallery carousel -->
												<li>
													<a href="#">Useful Contacts</a>
													<ul>
														<li>
															<a href="buyerslist.html">Broadcasters &amp; buyers</a>
														</li>
														<li>
															<a href="PRcontacts.html">Trade Publications</a>
														</li>
														<li>
															<a href="sggovcontacts.html">Government Agencies</a>
														</li>
													</ul>
												</li>
												<!-- eof Gallery carousel -->

												
											</ul>
										</li>
										<!-- eof Gallery -->

										<!-- blog -->
										<li>
											<a href="news.html">News</a>
										</li>
										<!-- eof blog -->

										<!-- contacts -->
										<li>
											<a href="connect.html">Connect</a>
										</li>
										<!-- eof contacts -->
									</ul>
								</nav>
								<!-- eof main nav -->
								<!-- header toggler -->
								<span class="toggle_menu">
									<span></span>
								</span>
							</div>

							<div class="header_right_buttons display_table_cell text-right hidden-xs">
								<a href="./#appointment" class="theme_button color1 two_lines bottommargin_0">sign in</a>
							</div>
						</div>
					</div>
				</div>
			</header>

			<section class="intro_section page_mainslider ds">
				<div class="flexslider" data-nav="false">
					<ul class="slides">

						<li>
							<img src="images/slide01.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="slide_description_wrapper">
											<div class="slide_description">
												<div class="intro-layer" data-animation="fadeInUp">
													<h2 class="text-uppercase">
														featured program 1
													</h2>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<h3 class="text-uppercase">
														now playing on amazon prime video
													</h3>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<a href="about.html" class="theme_button color2">find out more</a>
												</div>
											</div>
											<!-- eof .slide_description -->
										</div>
										<!-- eof .slide_description_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>

						<li>
							<img src="images/slide02.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="slide_description_wrapper">
											<div class="slide_description">
												<div class="intro-layer" data-animation="fadeInUp">
													<h2 class="text-uppercase">
														Featured Program 2
													</h2>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<h3 class="text-uppercase">
														now playing on netflix
													</h3>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<a href="about.html" class="theme_button color2">Find out More</a>
												</div>
											</div>
											<!-- eof .slide_description -->
										</div>
										<!-- eof .slide_description_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>

						<li>
							<img src="images/slide02.jpg" alt="">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="slide_description_wrapper">
											<div class="slide_description">
												<div class="intro-layer" data-animation="fadeInUp">
													<h2 class="text-uppercase">
														Featured Program 3
													</h2>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<h3 class="text-uppercase">
														now playing on BBC
													</h3>
												</div>
												<div class="intro-layer" data-animation="fadeInUp">
													<a href="about.html" class="theme_button color2">Find out More</a>
												</div>
											</div>
											<!-- eof .slide_description -->
										</div>
										<!-- eof .slide_description_wrapper -->
									</div>
									<!-- eof .col-* -->
								</div>
								<!-- eof .row -->
							</div>
							<!-- eof .container -->
						</li>

					</ul>
				</div>
				<!-- eof flexslider -->

			</section>

			<section class="ls ms section_padding_20 top_offset_content columns_margin_bottom_20">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInUp">
							<div class="ls with_padding big-padding bg_teaser rounded">
								<img src="images/story_bg.jpg" alt="">
								<div>
								  <h3 class="thin text-uppercase">WHO WE <br>
								    <strong>ARE</strong> </h3>
								  <p class="small-text bold darklinks">
							<a href="whoweare.html">About us</a>
						</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInUp">
							<div class="ls with_padding big-padding bg_teaser rounded">
								<img src="images/goals_bg.jpg" alt="">
								<div>
									<h3 class="thin text-uppercase">
										Our
										<br>
										<strong>goals</strong>
									</h3>
									<p class="small-text bold darklinks"><a href="whatwedo.html">WHAT WE DO</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12 to_animate" data-animation="fadeInUp">
							<div class="ls with_padding big-padding bg_teaser rounded">
								<img src="images/activists_bg.jpg" alt="">
								<div>
									<h3 class="thin text-uppercase">
										Our
										<br>
										<strong>MEMBERS</strong>
									</h3>
									<p class="small-text bold darklinks">
							<a href="allmembersA.html">PRODUCTION HOUSES</a>
						</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_150 section_padding_bottom_10 columns_margin_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="rounded overflow_hidden">
								<div class="with_padding gradient_bg_color heading_wrappper">
								  <h5 class="text-uppercase margin_0">small feature</h5>
								</div>

								<div class="with_padding with_background">

									<div class="widget widget_slider widget_featured_posts">

										<div class="owl-carousel" data-nav="true" data-loop="true" data-autoplay="true" data-items="1" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1">
											<ul>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/01.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Consetur sadscing elitr sed diam nonumy
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														12.08.2017
													</time>
												</a>
											</p>
													</div>
												</li>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/02.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Irmod tempor invidunt ut labore et dolore
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														08.05.2017
													</time>
												</a>
											</p>
													</div>
												</li>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/03.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Magna aliquyam erat, sed diam
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														01.08.2017
													</time>
												</a>
											</p>
													</div>
												</li>
											</ul>

											<ul>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/04.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Consetur sadscing elitr sed diam nonumy
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														12.08.2017
													</time>
												</a>
											</p>
													</div>
												</li>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/05.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Irmod tempor invidunt ut labore et dolore
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														08.05.2017
													</time>
												</a>
											</p>
													</div>
												</li>
												<li class="media big-left-media">
													<div class="media-left media-middle">
														<img src="images/post-thumbs/06.jpg" alt="">
													</div>
													<div class="media-body media-middle">
														<h4>
															<a href="feature-detail.html">
													Magna aliquyam erat, sed diam
												</a>
														</h4>
														<p class="small-text highlight highlightlinks">
												<a href="feature-detail.html">Admin</a>,
												<a href="blog-right.html" >
													<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
														01.08.2017
													</time>
												</a>
											</p>
													</div>
												</li>
											</ul>

										</div>

									</div>

								</div>
							</div>
						</div>

						<div class="col-md-8">
							<div class="owl-carousel" data-responsive-lg="2" data-responsive-md="2" data-responsive-sm="1">
								<article class="vertical-item content-padding text-center with_border rounded">
									<div class="item-media top_rounded overflow_hidden">
										<img src="images/gallery/02.jpg" alt="">
										<div class="media-links">
											<a href="feature-detail.html" class="abs-link"></a>
										</div>
									</div>
									<div class="item-content">
										<header class="entry-header">
											<h4 class="entry-title">
												<a href="feature-detail.html">At vero eos et accusam et justo duo dolores</a>
											</h4>
										</header>
										<div class="entry-content">
											<p>Consetur sadscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
										</div>
									</div>
									<footer class="entry-meta with_top_border darklinks">
										<p class="inline-content small-text">
								<span>
									<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">Admin</a>
								</span>
								<span>
									<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											11/08/2017
										</time>
									</a>
								</span>								
							</p>
									</footer>
								</article>

								<article class="vertical-item content-padding text-center with_border rounded">
									<div class="item-media top_rounded overflow_hidden">
										<img src="images/gallery/02.jpg" alt="">
										<div class="media-links">
											<a href="feature-detail.html" class="abs-link"></a>
										</div>
									</div>
									<div class="item-content">
										<header class="entry-header">
											<h4 class="entry-title">
												<a href="feature-detail.html">Stet clita kasd gubergren, takimata</a>
											</h4>
										</header>
										<div class="entry-content">
											<p>At vero eos et accusam et justo duo dolores et ea rebum clita kasd gubergren, no sea takimata sanctus est.</p>
										</div>
									</div>
									<footer class="entry-meta with_top_border darklinks">
										<p class="inline-content small-text">
								<span>
									<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">Admin</a>
								</span>
								<span>
									<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											09/08/2017
										</time>
									</a>
								</span>								
							</p>
									</footer>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_40 section_padding_bottom_40">
				<div class="container">
					<div class="row isotope_container isotope masonry-layout columns_padding_1">

						<div class="isotope-item col-md-3 col-sm-6">
							<article class="vertical-item content-absolute rounded overflow_hidden text-center">
								<div class="item-media rounded overflow_hidden">
									<img src="images/gallery/03.jpg" alt="">
									<div class="media-links">

									</div>
								</div>
								<div class="item-content darken_gradient">
									<h4 class="entry-title margin_0"><a href="event-single-right.html">Small Event Stamp</a></h4>
								</div>
							</article>
						</div>
						<div class="isotope-item col-md-3 col-sm-6">
							<article class="vertical-item content-absolute rounded overflow_hidden text-center">
								<div class="item-media rounded overflow_hidden">
									<img src="images/gallery/04.jpg" alt="">
									<div class="media-links">

									</div>
								</div>
								<div class="item-content darken_gradient">
									<h4 class="entry-title margin_0"><a href="event-single-right.html">Small Event Stamp</a></h4>
								</div>
							</article>
						</div>
						<div class="isotope-item col-md-6 col-sm-12">
							<article class="vertical-item content-absolute rounded overflow_hidden text-center">
								<div class="item-media rounded overflow_hidden">
									<img src="images/gallery/05.jpg" alt="">
									<div class="media-links">

									</div>
								</div>
								<div class="item-content darken_gradient ds">
									<div id="comingsoon-countdown"></div>
									<h3 class="entry-title bottommargin_10"><a href="event-single-right.html">AIPRO Associated Events</a></h3>
									<div class="entry-meta inline-content small-text darklinks">
										<span>
											<i class="fa fa-map-marker rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="event-single-right.html">Event Location</a>
										</span>
										<span>
											<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
											<span class="grey">09:30 AM - 05:00 PM</span>
										</span>
									</div>
								</div>
							</article>
						</div>
						<div class="isotope-item col-md-3 col-sm-6">
							<article class="vertical-item content-absolute rounded overflow_hidden text-center">
								<div class="item-media rounded overflow_hidden">
									<img src="images/gallery/06.jpg" alt="">
									<div class="media-links">

									</div>
								</div>
								<div class="item-content darken_gradient">
									<h4 class="entry-title margin_0"><a href="event-single-right.html">Small Event Stamp</a></h4>
								</div>
							</article>
						</div>

						<div class="isotope-item col-md-3 col-sm-6">
							<article class="vertical-item content-absolute rounded overflow_hidden text-center">
								<div class="item-media rounded overflow_hidden">
									<img src="images/gallery/07.jpg" alt="">
									<div class="media-links">

									</div>
								</div>
								<div class="item-content darken_gradient">
									<h4 class="entry-title margin_0"><a href="event-single-right.html">Small Event Stamp</a></h4>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_30 section_padding_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="owl-carousel" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2">
								<article class="vertical-item content-padding text-center with_border rounded">
									<div class="item-media top_rounded overflow_hidden">
										<img src="images/gallery/08.jpg" alt="">
										<div class="media-links">
											<a href="feature-detail.html" class="abs-link"></a>
										</div>
									</div>
									<div class="item-content">
										<header class="entry-header">
											<h4 class="entry-title">
												<a href="feature-detail.html">Lorem ipsum dolor sit amet consetetur</a>
											</h4>
										</header>
										<div class="entry-content">
											<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna.</p>
										</div>
									</div>
									<footer class="entry-meta with_top_border darklinks">
										<p class="inline-content small-text">
								<span>
									<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">Admin</a>
								</span>
								<span>
									<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											07/08/2017
										</time>
									</a>
								</span>								
							</p>
									</footer>
								</article>

								<article class="vertical-item content-padding text-center with_border rounded">
									<div class="item-media top_rounded overflow_hidden">
										<img src="images/gallery/09.jpg" alt="">
										<div class="media-links">
											<a href="feature-detail.html" class="abs-link"></a>
										</div>
									</div>
									<div class="item-content">
										<header class="entry-header">
											<h4 class="entry-title">
												<a href="feature-detail.html">Sadipscing elitr, sed diam nonumy</a>
											</h4>
										</header>
										<div class="entry-content">
											<p>At vero eos et accusam et justo duo dolores et ea rebum clita kasd gubergren, no sea takimata sanctus est.</p>
										</div>
									</div>
									<footer class="entry-meta with_top_border darklinks">
										<p class="inline-content small-text">
								<span>
									<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">Admin</a>
								</span>
								<span>
									<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											04/08/2017
										</time>
									</a>
								</span>								
							</p>
									</footer>
								</article>

								<article class="vertical-item content-padding text-center with_border rounded">
									<div class="item-media top_rounded overflow_hidden">
										<img src="images/gallery/10.jpg" alt="">
										<div class="media-links">
											<a href="feature-detail.html" class="abs-link"></a>
										</div>
									</div>
									<div class="item-content">
										<header class="entry-header">
											<h4 class="entry-title">
												<a href="feature-detail.html">Eirmod tempor invidunt ut labore et dolore</a>
											</h4>
										</header>
										<div class="entry-content">
											<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>
										</div>
									</div>
									<footer class="entry-meta with_top_border darklinks">
										<p class="inline-content small-text">
								<span>
									<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">Admin</a>
								</span>
								<span>
									<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
									<a href="feature-detail.html">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											01/08/2017
										</time>
									</a>
								</span>								
							</p>
									</footer>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>


						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_15 section_padding_bottom_50">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<article class="post format-small-image with_border side-item side-md content-padding responsive-thumb rounded topmargin_40">

								<!-- <div class=""> -->

								<div class="row">

									<div class="col-md-6">
										<div class="item-media entry-thumbnail top_rounded overflow_hidden">
											<img src="images/gallery/11.jpg" alt="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="item-content">

											<h4 class="entry-title ">
												<a href="feature-detail.html" rel="bookmark">At vero eos et accusam</a>
											</h4>

											<!-- .entry-meta -->

											<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt labore et dolore magna aliquyam erat, sed diam voluptua vero eos accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor amet. Lorem ipsum dolor amet, consetetur sadipscing eliiam nonumy eirmod.</p>

										</div>

										<footer class="entry-meta with_top_border darklinks">
											<p class="inline-content small-text">
										<span>
											<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">Admin</a>
										</span>
										<span>
											<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">
												<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
													04/08/2017
												</time>
											</a>
										</span>								
									</p>
										</footer>
									</div>

								</div>
								<!-- </div> -->
							</article>

							<article class="post format-small-image with_border side-item side-md content-padding responsive-thumb rounded topmargin_40">

								<!-- <div class=""> -->

								<div class="row">

									<div class="col-md-6 col-md-push-6">
										<div class="item-media entry-thumbnail top_rounded overflow_hidden">
											<img src="images/gallery/12.jpg" alt="">
										</div>
									</div>

									<div class="col-md-6 col-md-pull-6">
										<div class="item-content">

											<h4 class="entry-title ">
												<a href="feature-detail.html" rel="bookmark">Duo dolores et ea rebum clita kasd</a>
											</h4>

											<!-- .entry-meta -->

											<p>Tempor invidunt ut labore et dolore magna aliquyam eratsed diam voluptua vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</p>

										</div>

										<footer class="entry-meta with_top_border darklinks">
											<p class="inline-content small-text">
										<span>
											<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">Admin</a>
										</span>
										<span>
											<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">
												<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
													02/08/2017
												</time>
											</a>
										</span>								
									</p>
										</footer>
									</div>

								</div>
								<!-- </div> -->
							</article>

							<article class="post format-small-image with_border side-item side-md content-padding responsive-thumb rounded topmargin_40">

								<!-- <div class=""> -->

								<div class="row">

									<div class="col-md-6">
										<div class="item-media entry-thumbnail top_rounded overflow_hidden">
											<img src="images/gallery/13.jpg" alt="">
										</div>
									</div>

									<div class="col-md-6">
										<div class="item-content">

											<h4 class="entry-title ">
												<a href="feature-detail.html" rel="bookmark">No sea takimata sanctus</a>
											</h4>

											<!-- .entry-meta -->

											<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>

										</div>

										<footer class="entry-meta with_top_border darklinks">
											<p class="inline-content small-text">
										<span>
											<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">Admin</a>
										</span>
										<span>
											<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">
												<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
													01/08/2017
												</time>
											</a>
										</span>								
									</p>
										</footer>
									</div>

								</div>
								<!-- </div> -->
							</article>

							<article class="post format-small-image with_border side-item side-md content-padding responsive-thumb rounded topmargin_40">

								<!-- <div class=""> -->

								<div class="row">

									<div class="col-md-6 col-md-push-6">
										<div class="item-media entry-thumbnail top_rounded overflow_hidden">
											<img src="images/gallery/12.jpg" alt="">
										</div>
									</div>

									<div class="col-md-6 col-md-pull-6">
										<div class="item-content">

											<h4 class="entry-title ">
												<a href="feature-detail.html" rel="bookmark">Lorem ipsum dolor sit amet</a>
											</h4>

											<!-- .entry-meta -->

											<p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing.</p>

										</div>

										<footer class="entry-meta with_top_border darklinks">
											<p class="inline-content small-text">
										<span>
											<i class="fa fa-user rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">Admin</a>
										</span>
										<span>
											<i class="fa fa-calendar rightpadding_5 highlight" aria-hidden="true"></i>
											<a href="feature-detail.html">
												<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
													29/07/2017
												</time>
											</a>
										</span>								
									</p>
										</footer>
									</div>

								</div>
								<!-- </div> -->
							</article>
						</div>
					</div>
				</div>
			</section>

			<section class="section_subscribe cs gradient2 parallax section_padding_75">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="section_header thin">
								<strong>Newsletter</strong>
								Subscribe
							</h2>
							<div class="widget widget_mailchimp">
								<form class="signup form-inline inline-form" action="./" method="get">
									<div class="form-group-wrap">
										<div class="form-group margin_0">
											<input class="mailchimp_email form-control" name="email" type="email" placeholder="Email Address">
										</div>
										<button type="submit" class="theme_button no_bg_button">Sign Up!</button>
									</div>
									<div class="response"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

			@include('layouts.footer')

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->

    <script src="{!! asset('js/compressed.js') !!} "></script>
    <script src="{!! asset('js/main.js') !!} "></script>
            

</body>

</html>