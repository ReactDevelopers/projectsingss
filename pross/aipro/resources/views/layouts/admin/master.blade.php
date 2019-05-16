<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AIPRO | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset ('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Select2 -->
  <link href="{{asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
  
  <!-- SweetAlert2 CSS -->
  <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet" />
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
  

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

</head>
<body class="hold-transition login-page skin-blue sidebar-mini">

<?php if(\Auth::check()){?>
  <div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>AIPRO</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle ion-navicon-round" data-pack="default" data-tags="menu, hamburger, slide menu" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/no-avatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/no-avatar.png')}}" class="img-circle" alt="User Image">

                <p>
                  User 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('admin/settings') }}" class="btn btn-default btn-flat">Settings</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/no-avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>User</p>
        </div>
      </div>
      
      <!-- Navigation Bar -->
      @include('layouts.admin.nav');

    </section>
    <!-- /.sidebar -->
  </aside>
    
@yield('content')

  <footer class="main-footer">

  </footer>

</div>

<?php } else {?>

  @yield('content')

<?php } ?>

<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>



<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>




<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<!-- <script src="{{ asset ('bower_components/sweet-alert/sweetalert.js')}}"></script> -->


<!-- bootstrap datepicker -->
<script src="{{ asset ('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset ('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset ('bower_components/select2/dist/js/select2.full.js')}}"></script>

<script type="text/javascript">
      var base_url    = "{{ url('/') }}";
</script>



@stack('customjs')  

<!-- Custom -->
<!-- SweetAlert2 JS -->
<script src="{{asset('js/sweetalert2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/admin/admin-custom.js')}}"></script>

</body>
</html>
