@extends('layouts.master')
@section('content')
<!-- Main Content -->
<section class="ls section_padding_top_20 section_padding_bottom_100 columns_padding_25">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="entry-thumbnail bottommargin_40">
                                <img src="{{ asset('images/banner_slide01.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <article>

                                <h1 class="gallery-single-title">
                                    <a href="{{ $comdata['com_url'] }}" rel="bookmark">{{ $comdata['com_name'] }}</a>
                                </h1>

                                <header class="entry-header">

                                    <div class="item-meta">

                                        <span class="author greylinks">
                                            Member Since:
                                        </span>

                                        <span class="date">
                                            <time datetime="2017-01-13T15:05:23+00:00" class="entry-date">
                                                {{ $comdata['date'] }}
                                            </time>
                                        </span>

                                    </div>
                                    <!-- .entry-meta -->

                                </header>
                                <!-- .entry-header -->


                                <div class="entry-excerpt">
                                    <p>
                            Namber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.
                        </p>
                                </div>

                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum stet clita kasd gubergrno sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolamet consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua vero eos et accusam et justo duo dolores.</p>

                                <blockquote class="text-center">
                                    {{ $comdata['com_testimony'] }}
                                    <div class="item-meta topmargin_30">
                                        <h4 class="text-uppercase margin_0">{{ $comdata['testimonial_name'] }}</h4>
                                        <p class="small-text big-spacing highlight">{{ $comdata['testimonial_designation'] }}</p>
                                    </div>
                                </blockquote>

                                <p>Lorem ipsum dolor sit amet, consetetur sadipscinged diam nonumy eirmod tempor invidunt utlabore dolore magna aliquyam erat, sed diam voluptua. At vero eoet accusam esto clitakasd gubergren nea takimata sanctus est lorem ipsum.</p>

                            </article>

                            <div class="items-nav display_table_md darklinks">
                                <div class="media display_table_cell_md prev-item">
                                    <div class="media-left media-middle">
                                        <a href="gallery-single3.html">
                                            <i class="fa fa-angle-left position-absolute"></i>
                                            <img src="images/recent_post1.jpg" alt="">
                                        </a>
                                    </div>
                                    @if($prevdata)
                                    <div class="media-body media-middle">
                                        Previous Company
                                        <h4>
                                            <a href="{{url('membercompany/'.$prevdata['user_id'])}}">{{ $prevdata['com_name'] }}</a>
                                        </h4>
                                    </div>
                                    @endif
                                </div>

                                <div class="media display_table_cell_md next-item text-right">
                                    @if($nxtdata)
                                    <div class="media-body media-middle">
                                        Next Company
                                        <h4>
                                            <a href="{{url('membercompany/'.$nxtdata['user_id'])}}">{{ $nxtdata['com_name'] }}</a>
                                        </h4>
                                    </div>
                                    @endif
                                    <div class="media-right media-middle">
                                        <a href="gallery-single3.html" class="next">
                                            <img src="images/recent_post2.jpg" alt="">
                                            <i class="fa fa-angle-right position-absolute"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="topmargin_60">

                                
                                <!-- #comments -->


                                <div class="comment-respond" id="respond">
                                    <h3>Leave a message:</h3>

                                    <form class="comment-form columns_padding_10" id="commentform" method="post" action="./">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group margin_0">
                                                    <label for="author">Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" aria-required="true" size="30" value="" name="author" id="author" class="form-control" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group margin_0">
                                                    <label for="comment_email">Email Address</label>
                                                    <input type="email" size="30" value="" name="comment_email" id="comment_email" class="form-control" placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group margin_0">
                                                    <label for="comment">Comment</label>
                                                    <textarea aria-required="true" rows="5" cols="45" name="comment" id="comment" class="form-control" placeholder="Your Comment..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-submit topmargin_30">
                                            <button type="submit" id="submit" name="submit" class="theme_button color1 wide_button">Send now!</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- #respond -->

                            </div>


                        </div>
                        <!--eof .col-sm-8 (main content)-->

                        <div class="col-sm-4">

                            <div class="panel-group" id="accordion">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    Key Contact
                                </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="media bottommargin_20">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img src="images/team/04.jpg" class="img-circle" alt="">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="bottommargin_0">{{ $comdata['name'] }}</h4>
                                                    <span class="highlight">{{ $comdata['designation'] }}</span>
                                                </div>
                                            </div>
                                            <p>{{ $comdata['bios'] }}</p>
                                            <div class="social-icons">
                                                @if($comdata['facebook_url'])
                                                <a class="social-icon soc-facebook color-icon" href="{!!$comdata['facebook_url']!!}" title="" data-toggle="tooltip" data-original-title="Facebook"></a>
                                                @endif
                                                @if($comdata['twitter_url'])
                                                <a class="social-icon soc-twitter color-icon" href="{!!$comdata['twitter_url']!!}" title="" data-toggle="tooltip" data-original-title="Twitter"></a>
                                                @endif
                                                @if($comdata['linkedIn_url'])
                                                <a class="social-icon soc-google color-icon" href="{!!$comdata['linkedIn_url']!!}" title="" data-toggle="tooltip" data-original-title="LinkedIn"></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    Top Content Categories
                                </a>
                                        </h4>
                                    </div>
                                    <?php 
                                    $categories = $comdata['categories'];
                                    $categoriesArray = [];
                                    if($categories){
                                        $categoriesArray = explode(",", $categories);
                                        $categoriesArray = array_filter($categoriesArray);
                                    $catData = getCategories();    
                                    }
                                    ?>
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list2 darklinks">
                                              <?php
                                                if(count($categoriesArray)) {
                                                    foreach ($categoriesArray as $catVal) {
                                                        echo '<li><p>'.$catData[$catVal].'</p></li>';
                                                    }
                                                    } else {
                                                        echo '<li><p>NA</p></li>';
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    Services
                                </a>
                                        </h4>
                                    </div>
                                    <?php 
                                    $services = $comdata['services'];
                                    $servicesArray = [];
                                    if($services){
                                        $servicesArray = explode(",", $services);
                                        $servicesArray = array_filter($servicesArray);
                                    }
                                    $servicesData = getServices();
                                    ?>    
                                    <div id="collapse2" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <ul class="list2 darklinks">
                                               <?php
                                                if(count($servicesArray)) {
                                                    foreach ($servicesArray as $catVal) {
                                                        echo '<li><p>'.$servicesData[$catVal].'</p></li>';
                                                    }
                                                } else {
                                                    echo '<li><p>NA</p></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- eof aside -->

                    </div>
                </div>
            </section>            

<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush