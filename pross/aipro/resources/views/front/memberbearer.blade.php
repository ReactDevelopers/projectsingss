@extends('layouts.master')
@section('content')
<!-- Main Content -->
<section class="page_breadcrumbs cs section_padding_50 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <h2 class="small">{!!$title!!}</h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ol class="breadcrumb">
                    <li><a href="{!!url('officebearer')!!}">Back</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
            
            
<section class="ls section_padding_top_50 section_padding_bottom_100 columns_padding_25">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">

                            <div class="vertical-item content-padding with_border text-center  ">
                                <div class="item-media">
                                    <img src="{!!asset('images/team/'.$comdata[0]['image'])!!}" alt="{{$comdata[0]['name']}}" />
                                </div>
                                <div class="item-content">
                                    <h3 class="bottommargin_0 ">
                                        <a href="#">{{$comdata[0]['name']}}</a>
                                    </h3>
                                    <p class="small-text highlight">{{$comdata[0]['designation']}}</p>
                                    <p class="greylinks">
                                @if($comdata[0]['facebook'])
                                <a target="_blank" class="fa fa-facebook-official fa-facebook rightpadding_20 leftpadding_20" href="{!!$comdata[0]['facebook']!!}" title="Facebook" style="color: #3b5598"></a>
                                @endif
                                @if($comdata[0]['twitter'])
                                <a target="_blank" class="fa fa-twitter rightpadding_20 leftpadding_20" href="<?php echo 'https://twitter.com/'.$comdata[0]['twitter']?>" title="Twitter" style="color: #00aced"></a>
                                @endif
                                @if($comdata[0]['linkedin'])
                                <a target="_blank" class="fa fa-linkedin rightpadding_20 leftpadding_20" href="{!!$comdata[0]['linkedin']!!}" title="LinkedIn" style="color: #0077bf"></a>
                                @endif
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-7">

                            <p>{{$comdata[0]['content_desc']}}</p>

                            <ul class="list2 checklist darklinks semibold">
                                <li>
                                    <a href="#">{{$comdata[0]['highlight1']}}</a>
                                </li>
                                @if($comdata[0]['highlight2'])
                                <li>
                                    <a href="#">{{$comdata[0]['highlight2']}}</a>
                                </li>
                                @endif
                                @if($comdata[0]['highlight3'])
                                <li>
                                    <a href="#">{{$comdata[0]['highlight3']}}</a>
                                </li>
                                @endif
                            </ul>
                            
                            <p>{{$comdata[0]['description']}}</p>


                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs topmargin_40" role="tablist">
                                <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Biography</a></li>
                                <!--li><a href="#tab2" role="tab" data-toggle="tab">Skills</a></li-->
                                <li><a href="#tab3" role="tab" data-toggle="tab">Send Message</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content big-padding top-color-border bottommargin_40">

                                <div class="tab-pane fade in active" id="tab1">
                                    <p>
                                        <?php
                                        $writeup= preg_split('/\r\n|[\r\n]/', $comdata[0]['bios']);
                                        
                                        $writeup = array_values(array_filter($writeup));
                                        $i = count($writeup);
                                        if($i>0){
                                            for($x=0; $x<1 && $x < count($writeup)  ; $x++){ 
                                                echo '<p>'.$writeup[$x].'</p>'; 
                                            }               
                                        }
                                        ?> 
                                    </p>
                                    <p>
                                        <?php
                                        $i = count($writeup);
                                        if($i>1){
                                            for($x=1; $x<2; $x++){ 
                                                echo '<p>'.$writeup[$x].'</p>'; 
                                            }
                                        }   
                                        ?>
                                    </p>
                                    
                                    <p>
                                        <?php
                                        $i = count($writeup);
                                        if($i>2){
                                            for($x=2; $x<count($writeup); $x++){ 
                                                echo '<p>'.$writeup[$x].'</p>'; 
                                            }
                                        }   
                                        ?>  
                                    </p>

                                </div>

                                <div class="tab-pane fade" id="tab3">
                                    <form class="contact-form" method="post" action="">
                                        {{ csrf_field() }}
                                    <input type="hidden" value="{{$comdata[0]['email']}}" aria-required="true" class="form-control" name="hidemail">
                                        <div id="ajaxResponse"></div>
                                        <div id="ajax_loading" style="display:none;"><img src="{!!asset('img/AjaxLoader.gif')!!}"></div>
                                        <p class="contact-form-name">
                                <!-- <label for="name">Name <span class="required">*</span></label> -->
                                <input type="text" aria-required="true" size="30" value="" name="name" class="form-control" placeholder="Name">
                            </p>
                                        <p class="contact-form-email">
                                <!-- <label for="email">Email <span class="required">*</span></label> -->
                                <input type="email" aria-required="true" size="30" value="" name="email" class="form-control" placeholder="Email Address">
                            </p>
                                        <p class="contact-form-message">
                                <!-- <label for="message">Message</label> -->
                                <textarea aria-required="true" rows="4" cols="45" name="message" class="form-control" placeholder="Message"></textarea>
                            </p>
                                        <p class="contact-form-submit topmargin_30">
                                <button type="submit" name="contact_submit" id="contact_submit" class="theme_button color1">Send Message</button>
                            </p>
                                    </form>
                                </div>
                            </div>
                            <!-- eof .tab-content -->
                            @if(count($comdata[0]['testimonial_quote'])>0)
                            <h3>Favourite Quote: </h3>

                            <blockquote class="text-center">{{$comdata[0]['testimonial_quote']}}
                            <div class="item-meta topmargin_30">
                              <h4 class="margin_0">{{$comdata[0]['testimonial_name']}}</h4>
                              <p class="small-text highlight">{{$comdata[0]['testimonial_designation']}}</p>
                            </div>
                            </blockquote>
                            @endif

                            

                        </div>

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

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');

$(document).ready(function() {
        $("#contact_submit").click(function(e){
            $('#ajax_loading').show();
            $('#ajaxResponse').hide();
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var first_name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var message = $("textarea[name='message']").val();
            var hidemail = $("input[name='hidemail']").val();

            $.ajax({
                url: "{!! url('/memberbearersend') !!}",
                type:'POST',
                data: {_token:_token, name:first_name, email:email, message:message, hidemail:hidemail},
                success: function(data) {
                    $('#ajax_loading').hide();
                    $('#ajaxResponse').show();
                    // alert(data);
                    if(data.status=='success'){
                        $("#ajaxResponse").html("<div style='color:green;'>"+data.message+"</div>");
                        $("#contactform")[0].reset();
                    } 
                    else {
                        $("#ajaxResponse").html("<div style='color:red;'>"+data.errors+"</div>");
                    }
                    // if($.isEmptyObject(data.error)){
                    //  alert(data);
                    //  alert('suuc');
                    //  alert(data.success);
                    // }else{
                    //  printErrorMsg(data.error);
                    // }
                }
            });

        }); 

     //    function printErrorMsg (msg) {
        //  $(".print-error-msg").find("ul").html('');
        //  $(".print-error-msg").css('display','block');
        //  $.each( msg, function( key, value ) {
        //      $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //  });
        // }
    });    

</script>
@endpush