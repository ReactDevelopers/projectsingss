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

  

  <li @if(\Request::is('contactus') OR \Request::is('contactus/*')) class="active" @endif>
    <a href="{{ url('/contactus') }}">
      <i class="fa fa-dashboard"></i> <span>Contact Us Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>

  

  <li @if(\Request::is('news') OR \Request::is('news/*')) class="active" @endif>
    <a href="{{ url('/news') }}">
      <i class="fa fa-dashboard"></i> <span>News Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
  <li @if(\Request::is('team') OR \Request::is('team/*')) class="active" @endif>
    <a href="{{ url('/team') }}">
      <i class="fa fa-dashboard"></i> <span>Meet Our Team Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('projects') OR \Request::is('projects/*')) class="active" @endif>
    <a href="{{ url('/projects') }}">
      <i class="fa fa-dashboard"></i> <span>Project Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('whatdowedo') OR \Request::is('whatdowedo/*')) class="active" @endif>
    <a href="{{ url('/whatdowedo') }}">
      <i class="fa fa-dashboard"></i> <span>What do We Do? Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('subscribers') OR \Request::is('subscribers/*')) class="active" @endif>
    <a href="{{ url('/subscribers') }}">
      <i class="fa fa-dashboard"></i> <span>Subscribers Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('subscribers') OR \Request::is('banners/*')) class="active" @endif>
    <a href="{{ url('/banners') }}">
      <i class="fa fa-dashboard"></i> <span>Banner Management</span>
      <span class="pull-right-container">
        <small class="label pull-right bg-green"></small>
      </span>
    </a>
  </li>
    
    <li @if(\Request::is('email-template') OR \Request::is('email-template/*')) class="active" @endif>
    <a href="{{ url('/email-template') }}">
      <i class="fa fa-dashboard"></i> <span>Email Configuration</span>
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