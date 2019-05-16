<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo-new.png') }}" alt="Internship"></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('about') }}">About us</a></li>
            <li><a href="{{ url('blogs') }}">Blog</a></li>
            @if (!\Auth::check())
                <li><a href="{{ url('provider-signup') }}">Providers</a></li>
            @endif
            <li><a href="{{ url('contact') }}">Contact</a></li>
            @if (\Auth::check())
            <li>
                <?php $notification = get_unread_notification(); ?>
                <a href="javascript:void(0);" class="notifications">Notifications @if($notification) <span class="count">{{ count($notification) }}</span> @endif </a>
                <div class="notifications-dropdown">
                    <div class="notifications-list">
                        <ul>
                            <?php if($notification):
                                    foreach ((array) $notification as $key => $value) { ?>
                                    
                                <li>
                                    <a href="javascript:void(0);">{{ $value['message'] }}</a>
                                    <span class="time">{{ time_elapsed_string($value['time']) }}</span>

                                </li>
                            <?php } else: ?>
                                <li>
                                    <a href="javascript:void(0);">No new notification</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="viewAllNotification">
                        <?php

                            if(\Auth::user()->usertype_id == '2') // provider
                            {
                                $notification = url('provider/notification-list');
                            }
                            if(\Auth::user()->usertype_id == '3') // supervisor
                            {
                                $notification = url('supervisor/notification-list');
                            }
                            if(\Auth::user()->usertype_id == '4') // student
                            {
                                $notification = url('student/notification-list');
                            }

                        ?>
                        <a href="{{ $notification }}">View all notifications</a>
                    </div>
                </div>
            </li>
            
            <li>
                <a target="_blank" href="#!" id="usermenu-toggle">
                    <?php $get_thumb = get_thumb_image();

                          if($get_thumb)
                            $profile_image = asset('uploads/'.$get_thumb);
                          else
                            $profile_image = url('images/user-thumb-xs-dummy.png');
                    ?>
                    <i class="user-thumb-xs" style="background-image:url('{{ $profile_image }}')"></i>
                </a>
                <ul class="usermenu-submenu">
                    <?php

                        $my_account = $settings = 'javascript:void(0)';

                        if(\Auth::user()->usertype_id == '2') // provider
                        {
                            $settings = url('provider/edit-profile');
                            $my_account = url('provider/provider-dashboard');
                        }
                        if(\Auth::user()->usertype_id == '3') // supervisor
                        {
                            $settings = url('supervisor/edit-profile');
                            $my_account = url('supervisor/supervisor-dashboard');
                        }
                        if(\Auth::user()->usertype_id == '4') // student
                        {
                            $settings = url('student/edit-profile');
                            $my_account = url('student/student-dashboard');
                        }
                    ?>
                    <li><a href="{{ $my_account }}">My Account</a></li>
                    <li><a href="{{ $settings }}">Settings</a></li>
                    <li><a href="{{ url('user/logout') }}">Logout</a></li>
                </ul>
            </li>
            @else
                <li><a href="{{ url('student-signup') }}" class="btn">Sign in</a></li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</div>