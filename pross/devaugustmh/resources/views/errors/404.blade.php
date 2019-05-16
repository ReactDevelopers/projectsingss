<!-- master.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>Welcome To August Media Portal</title>

    <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}">
    <!--StyleSheet Links-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" id="camera-css" href="{{asset('css/camera.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/prettyPhoto.css')}}" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
     
    <!--Javascript Links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    
	<script type="text/javascript" src="{{asset('js/jquery.mobile.customized.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.easing.1.3.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/camera.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
    <script src="{{asset('js/sorting.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.isotope.js')}}" type="text/javascript"></script>
    
    <script src="{{asset('js/jquery.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <!--Fonts-->
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700" rel="stylesheet" type="text/css">
	
        

    </head>

    <body>
    
<section>
  <div class="container country_selection_wrap">
  <div class="row">
    <div class="col-md-12">
  <img src="{!!asset('img/404.png')!!}" alt="404 Page Not Found." style="    margin: auto; float: none; display: block;">
  </div>
  </div>
  </div>
  </section>
    
    </body>

</html>
