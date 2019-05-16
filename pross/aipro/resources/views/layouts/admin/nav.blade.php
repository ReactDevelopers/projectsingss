<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>

  <li @if(\Request::is('admin') OR \Request::is('admin/*')) class="active" @endif>
    <a href="{{ url('admin') }}">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  
  <li @if(\Request::is('static') OR \Request::is('static/*')) class="active" @endif>
    <a href="{{ url('/admin/static') }}">
      <i class="fa fa-dashboard"></i> <span>Static Content</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
  <li @if(\Request::is('contact-template') OR \Request::is('contact-template/*')) class="active" @endif>
    <a href="{{ url('admin/contact-template') }}">
      <i class="fa fa-dashboard"></i> <span>Contact Us Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
<!--
    
    <li @if(\Request::is('subscribers') OR \Request::is('subscribers/*')) class="active" @endif>
    <a href="{{ url('/subscribers') }}">
      <i class="fa fa-dashboard"></i> <span>Subscribers Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('banners') OR \Request::is('banners/*')) class="active" @endif>
    <a href="{{ url('/banners') }}">
      <i class="fa fa-dashboard"></i> <span>Banner Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>-->
    
    <li @if(\Request::is('email-template') OR \Request::is('email-template/*')) class="active" @endif>
    <a href="{{ url('admin/email-template') }}">
      <i class="fa fa-dashboard"></i> <span>Email Configuration</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li @if(\Request::is('comprofile-template') OR \Request::is('comprofile-template/*')) class="active" @endif>
    <a href="{{ url('admin/comprofile-template') }}">
      <i class="fa fa-dashboard"></i> <span>Company & Member</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  <li @if(\Request::is('feature-template') OR \Request::is('feature-template/*')) class="active" @endif>
    <a href="{{ url('admin/feature-template') }}">
      <i class="fa fa-dashboard"></i> <span>Features</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
  <li @if(\Request::is('adminchange-password') OR \Request::is('adminchange-password/*')) class="active" @endif>
    <a href="{{ url('admin/adminchange-password') }}">
      <i class="fa fa-dashboard"></i> <span>Change Password</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li> 

  <li @if(\Request::is('officeemp') OR \Request::is('officeemp/*')) class="active" @endif>
    <a href="{{ url('admin/officeemp') }}">
      <i class="fa fa-dashboard"></i> <span>Office Bearers</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li> 


  <!--<li @if(\Request::is('email-template') OR \Request::is('email-template/*')) class="active" @endif>
    <a href="{{ url('/email-template') }}">
      <i class="fa fa-dashboard"></i> <span>Email Configuration</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li-->



</ul>