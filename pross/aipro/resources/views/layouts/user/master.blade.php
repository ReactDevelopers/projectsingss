<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>AIPRO :: Sign In</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/animations.css')}}">
	<link rel="stylesheet" href="{{asset('css/fonts.css')}}">
	<link rel="stylesheet" href="{{asset('css/main.css')}}" class="color-switcher-link">
	<link rel="stylesheet" href="{{asset('css/dashboard.css')}}" class="color-switcher-link">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
	<script src="{!!asset('js/vendor/modernizr-2.6.2.min.js')!!}"></script>

	<!--[if lt IE 9]>
		<script src="{!!asset('js/vendor/html5shiv.min.js')!!}"></script>
		<script src="{!!asset('js/vendor/respond.min.js')!!}"></script>
		<script src="{!!asset('js/vendor/jquery-1.12.4.min.js')!!}"></script>
	<![endif]-->

</head>

<body class="admin">
<!--[if lt IE 9]>
	<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
<![endif]-->

<div class="preloader">
  <div class="preloader_image"></div>
</div>

<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
  <div id="box_wrapper">
  
<?php if(\Auth::check()){?>
  @include('layouts.user.nav')
<?php } ?>
@yield('content')
  </div>
</div>
  
<script type="text/javascript">
      var base_url    = "{{ url('/') }}";
</script>


<!-- template init -->
	<script src="{{asset ('js/compressed.js')}}"></script>
	<script src="{{asset ('js/main.js')}}"></script>

	<!-- dashboard libs -->

	<!-- events calendar -->
	<script src="{{asset ('js/admin/moment.min.js')}}"></script>
	<script src="{{asset ('js/admin/fullcalendar.min.js')}}"></script>
	<!-- range picker -->
	<script src="{{asset ('js/admin/daterangepicker.js')}}"></script>

	<!-- charts -->
	<script src="{{asset ('js/admin/Chart.bundle.min.js')}}"></script>
	<!-- vector map -->
	<script src="{{asset ('js/admin/jquery-jvectormap-2.0.3.min.js')}}"></script>
	<script src="{{asset ('js/admin/jquery-jvectormap-world-mill.js')}}"></script>
	<!-- small charts -->
	<script src="{{asset ('js/admin/jquery.sparkline.min.js')}}"></script>

	<!-- dashboard init -->
	<script src="{{asset ('js/admin.js')}}"></script>
    
@stack('customjs')  


</body>
</html>
