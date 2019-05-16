<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>

  <li @if(\Request::is('admin/dashboard') OR \Request::is('admin/dashboard/*')) class="active" @endif>
    <a href="{{ url('admin/dashboard') }}">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
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

</ul>