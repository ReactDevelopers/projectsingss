<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SG Health Marketing Website</title>

    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Style CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" /> 
</head>

<body>
    <div class="wrapper">
        <!-- Header Section HTML -->
        <header class="header-section" id="header-block">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html"><img class="logo-size top-header-logo"
                                src="{{asset('assets/images/Logo-white.png')}}" alt="SGHealth"><img class="logo-size inner-header-logo"
                                src="{{asset('assets/images/blue-logo.png')}}" alt="SGHealth"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <div class="login-button navbar-right for-web hidden-xs">
                            <a class="btn download-btn" data-toggle="collapse" href="#nav-collapse1"
                                aria-expanded="false" aria-controls="nav-collapse1">Get Started</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about-us')}}">About Us</a></li>
                            <li><a href="{{url('faq')}}">Faq</a></li>
                            <li><a href="javascript:void(0)">Blog</a></li>
                            <li><a href="{{url('contact-us')}}">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav><!-- /.navbar -->

            </div><!-- /.container -->
        </header>

        @yield('content')

        <!-- Footer Section HTML -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-nav">
                            <ul>
                                <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                                <li><a href="{{url('terms-and-conditions')}}">Terms & coditions </a></li>
                                <li><a href="{{url('faq')}}">FAQ</a></li>
                                <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>2018 © Myworkwallet.All rights reserved.</p>
                            <div class="icon">
                                <a href="#"><img src="{{asset('assets/images/Facebook.png')}}"></a>
                                <a href="#"><img src="{{asset('assets/images/Insta.png')}}"></a>
                                <a href="#"><img src="{{asset('assets/images/Linkedin.png')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section HTML end  -->
    </div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>

</html>