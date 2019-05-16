@extends('layouts.user.master')
@section('content')

<!-- template sections -->
<section class="ls section_padding_top_100 section_padding_bottom_100 section_full_height">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 to_animate">
                <div class="with_border with_padding">

                    <h4 class="text-center">
                        Sign In to Your Account
                    </h4>
                    <hr class="bottommargin_30">
                    <div class="wrap-forms">
						@if(Session::has('error'))
							<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							{{ Session::get('error') }}
						</div>
						@endif
                        <form action="{{ url('/login') }}" method="post" autocomplete="off">
						{{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-placeholder{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="login-email">Email address</label>
                                        <i class="grey fa fa-envelope-o"></i>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="login-email" placeholder="Email Address">
										@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif    
								</div>
                                </div>
                            </div>
								
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-placeholder{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="login-password">Password</label>
                                        <i class="grey fa fa-pencil-square-o"></i>
                                        <input type="password" class="form-control" name ="password" id="login-password" placeholder="Password">
										@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <input type="checkbox" id="remember_me_checkbox">
                                        <label for="remember_me_checkbox">Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="theme_button block_button color1">Log In</button>
                        </form>
                    </div>

                    <div class="darklinks text-center topmargin_20">

                        <a role="button" data-toggle="collapse" href="#signin-resend-password" aria-expanded="false" aria-controls="signin-resend-password">
                Forgot your password?
            </a>

                    </div>
                    <div class="collapse form-inline-button" id="signin-resend-password">
                        <div id="ajaxResponse"></div>
                        <div id="ajax_loading" style="display:none;"><img src="{!!asset('img/AjaxLoader.gif')!!}"></div>
                        <form class="form-inline topmargin_20" id="reset_form" method="post" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only">Enter your e-mail</label>
                                <input type="email" name="reset_email" id="reset_email" class="form-control" placeholder="E-mail">
                            </div>
                            <button type="submit" id="reset_pass" class="theme_button with_icon">
                                <i class="fa fa-share"></i>
                            </button>
                        </form>
                    </div>


                </div>
                <!-- .with_border -->

                <p class="divider_20 text-center">
        Not registered? <a href="javascript:void(0);">Join AIPRO</a>.<br>
        or go <a href="{!!url('/')!!}">Home</a>
    </p>

            </div>
            <!-- .col-* -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>   
	
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush

@push('customjs')
<script type="text/javascript">
$(function() {

$("body").on("click","#reset_pass",function(e){
        $('#ajax_loading').show();
        $('#ajaxResponse').hide();
        e.preventDefault();
        // alert('hello');
        // {{ url('resetpass')}}
        var _token = $("input[name='_token']").val();
        var email = $("input[name='reset_email']").val();
        // alert(_token);
        //     alert(email);

            $.ajax({
                url: "{!! url('/resetpass') !!}",
                type:'POST',
                data: {_token:_token, email:email},
                success: function(data) {
                    // alert(data);
                    $('#ajax_loading').hide();
                    $('#ajaxResponse').show();
                    if(data.status=='success'){
                        $("#ajaxResponse").html("<div style='color:green;'>"+data.message+"</div>");
                        $("#reset_form")[0].reset();
                    } 
                    else {
                        $("#ajaxResponse").html("<div style='color:red;'>"+data.errors+"</div>");
                    }
                }
            });
    });
});
</script>
@endpush
