<?php use App\Models\CompanyProfile; ?>
<header class="page_header_side page_header_side_sticked active-slide-side-header ds">
  <div class="side_header_logo ds ms">
    <a href="./admin_index.html">
      <span class="logo_text margin_0">
        <strong>AIPRO</strong>
                      SINGAPORE
      </span>
    </a>
  </div>
  <span class="toggle_menu_side toggler_light header-slide">
    <span></span>
  </span>
  <div class="scrollbar-macosx">
    <div class="side_header_inner">

      <!-- user -->

      <div class="user-menu">
        <ul class="menu-click">
          <li>
              <div class="media">
                <div class="media-left media-middle">
                @if(\Auth::User()->profile_picture)
                  <img src="{{ asset('uploads/memberdetailspics').'/'.\Auth::User()->profile_picture }}" alt="">
                @else
                  <img src="{!!asset('images/team/01.jpg')!!}" alt="">
                @endif
                
                </div>
                <div class="media-body media-middle">
                  <h4>{{\Auth::User()->name}} {{\Auth::User()->surname}}</h4>
                  <!-- Wawa Pictures -->
                  <?php $pageData['com_name'] = CompanyProfile::where('user_id',\Auth::User()->id)->select('company_profile.com_name')->first()->com_name; echo $pageData['com_name'] ?>                 
                </div>
              </div>
          </li>
        </ul>

      </div>

      <!-- main side nav start -->
      <nav class="mainmenu_side_wrapper">
        
        
        <ul class="menu-click">
          <li @if(\Request::is('user/userprofile') OR \Request::is('user/profileedit')) class="active-submenu" @endif >
            <a href="#">
              <i class="fa fa-user"></i>
              Account
            </a>
            <ul>
              <li>
                <a href="{{ url('user/userprofile') }}">Company Profile</a>
              </li>
              <li>
                <a href="{{ url('user/profileedit') }}">Edit Profile</a>
              </li>
                                <li>
                <a href="javascript:void(0);">Pay Membership Fee</a>
              </li>
            </ul>
          </li>
          <li @if(\Request::is('user/feature1') OR \Request::is('user/feature2') OR \Request::is('user/feature3') OR \Request::is('user/featureedit')) class="active-submenu" @endif >
            <a href="#">
              <i class="fa fa-file-text"></i>
              Posts
            </a>
            <ul>
              <li>
                <a href="{!!url('user/feature1')!!}">Preview Feature 1</a>
              </li>
              <li>
                <a href="{!!url('user/feature2')!!}">Preview Feature 2</a>
              </li>
              <li>
                <a href="{!!url('user/feature3')!!}">Preview Feature 3</a>
              </li>
              <li>
                <a href="{!!url('user/featureedit')!!}">Edit Features</a>
              </li>
            </ul>
          </li>

            <li><a href="{{ url('user/passEdit') }}">
              <i class="fa fa-lock"></i>
              Change Password
            </a>
          </li>
          
            <li><a href="{{ url('admin/logout') }}">
              <i class="fa fa-sign-out"></i>
              Log Out
            </a>
          </li>
        </ul>
      </nav>
      <!-- eof main side nav -->

    <!--   <div class="with_padding grey text-center">
        Member Since
        <strong>
        @php 
          echo date('M Y',  strtotime(\Auth()->user()->created_at))
        @endphp
        </strong>
      </div> -->

    </div>
  </div>
</header>