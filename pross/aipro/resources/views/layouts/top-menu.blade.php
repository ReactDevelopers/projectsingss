<header class="page_header header_white toggler_xs_right section_padding_15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table">
                <div class="header_left_logo display_table_cell">
                    <a href="{!!url('/')!!}" class="logo top_logo">
                        <img src="{!!asset('images/logo.png')!!}" alt="">
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
                                <a href="{!!url('/')!!}">Home</a>
                            </li>
                            <!--About Menu-->
                            <li>
                                <a href="javascript:void(0);">About Us</a>
                                <ul>   
                                    <li><a href="{!!url('whoweare')!!}" @if(\Request::is('whoweare')) class="active" @endif>Who We Are</a></li>
                                    <li><a href="{!!url('whatwedo')!!}" @if(\Request::is('whatwedo')) class="active" @endif>What we Do</a></li>
                                    <li><a href="{!!url('officebearer')!!}"  @if(\Request::is('officebearer')) class="active" @endif>Office Bearers</a></li>
                                    <li><a href="{!!url('reports')!!}">Industry Reports</a></li>
                                    <li><a href="javascript:void(0);">AIPRO Updates</a></li>
                                </ul>
                            </li>
                            <!-- eof About Menu -->
                            
                            <!--  Members Menu  -->
                            
                            <li><a href="javascript:void(0);">members</a>
                              <ul>
                                    
                                    <li>
                                        <a href="javascript:void(0);">Members directory</a>
                                        <ul>
                                          <li>
                                          <a href="{!! url('allmembers') !!}">Full Members</a>
                                          </li>
                                          <li>
                                          <a href="{!! url('associatemembers') !!}">Associate Members</a>
                                          </li>
                                        </ul>
                                    </li>
    
                                    <li>
                                        <a href="javascript:void(0);">member benefits</a>
                                    </li>
                                    
                                    <li>
                                        <a href="javascript:void(0);">membership criteria</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Code of Conduct</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">join aipro</a>
                                    </li>
    
                                </ul>
                            </li>
                            
                            <!-- eof Members Menu-->
    
    
                            <!-- gallery -->
                            <li><a href="javascript:void(0);">Resources</a>
                              <ul>
                                    <!-- Gallery regular -->
                                    <li>
                                        <a href="javascript:void(0);">Redeem Benefits</a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">Insurance/ Finance</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Equipment &amp; Accessories</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Studios &amp; Locations</a>
                                            </li>
                                            <li> <a href="javascript:void(0);">Government Schemes</a> </li>
                                        </ul>
                                    </li>
                                    <!-- eof Gallery regular -->
    
                                    <!-- Gallery full width -->
                                    <li>
                                        <a href="#">Document Repository</a>
                                        <ul>
                                            <li>
                                                <a href="{!!url('legalpersonnel')!!}">Personnel Agreements</a>
                                            </li>
                                            <li>
                                                <a href="{!!url('legalcommercial')!!}">Commercial Agreements</a>
                                            </li>
                                            <li>
                                                <a href="{!!url('treaties')!!}">Co-Production Treaties</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- eof Gallery full width -->
    
                                    <!-- Gallery extended -->
                                    <li>
                                        <a href="javascript:void(0);">Events Calendar</a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">Trade Shows &amp; Markets</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Upcoming Pitches</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Seminars &amp; Masterclasses</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- eof Gallery extended -->
    
                                    <!-- Gallery carousel -->
                                    <li>
                                        <a href="javascript:void(0);">Useful Contacts</a>
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">Broadcasters &amp; buyers</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Trade Publications</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Government Agencies</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- eof Gallery carousel -->
    
                                    
                                </ul>
                            </li>
                            <!-- eof Gallery -->
    
                            <!-- blog -->
                            <li>
                                <a href="javascript:void(0);">News</a>
                            </li>
                            <!-- eof blog -->
    
                            <!-- contacts -->
                            <li>
                                <a href="{!!url('connect')!!}">Connect</a>
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
                    <a href="{!!url('admin')!!}" class="theme_button color1 two_lines bottommargin_0">sign in</a>
                </div>
            </div>
        </div>
    </div>
</header>