@extends('layouts.master')
@section('content')
<!-- Main Content -->
<section class="page_breadcrumbs cs section_padding_50 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <h2 class="small">{!!$pageData['title']!!}</h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ol class="breadcrumb">
                    <li><a href="./">Back</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
            
<section class="page_map" data-address="Terracina, LT, Italia">
	<!-- marker description and marker icon goes here -->
	<div class="map_marker_description">
		<h3>AIPRO Registered Office</h3>
		<p>Map description text</p>
	</div>

</section>

<section class="ls section_padding_top_75 section_padding_bottom_100">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 to_animate" data-animation="pullDown">
				<div class="teaser text-center">
					<div class="teaser_icon highlight size_small">
						<i class="rt-icon2-phone5"></i>
					</div>
					<p>
						<span class="grey">Phone:</span> +65 6123 4567<br>
						<span class="grey">Fax:</span> +65 6987 6543
					</p>
				</div>
			</div>
			<div class="col-sm-4 to_animate" data-animation="pullDown">
				<div class="teaser text-center">
					<div class="teaser_icon highlight size_small">
						<i class="rt-icon2-location2"></i>
					</div>
					<p> 
						2 Kallang Avenue<br>
						#04-08, CT Hub<br>
						Singapore 339407
					</p>
				</div>
			</div>
				
			<div class="col-sm-4 to_animate" data-animation="pullDown">
				<div class="teaser text-center">
					<div class="teaser_icon highlight size_small">
						<i class="rt-icon2-world"></i>
					</div>
					<p>Follow us On</p>
					<p>
						<a href="#" class="social-icon color-icon soc-twitter"></a>
						<a href="#" class="social-icon color-icon soc-facebook"></a>
						<a href="#" class="social-icon color-icon soc-google"></a>
						<a href="#" class="social-icon color-icon soc-pinterest"></a>
					</p>
				</div>
			</div>

		</div>

		<div class="row topmargin_60">
			<div class="col-sm-12 to_animate">
				<div id="ajaxResponse"></div>
				<div id="ajax_loading" style="display:none;"><img src="{!!asset('img/AjaxLoader.gif')!!}"></div>
				<form class="contact-form cs parallax columns_padding_5" method="post" action="" id="contactform">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-6">
							<p class="form-group">
								<label for="name">Full Name <span class="required">*</span></label>
								<i class="fa fa-user black" aria-hidden="true"></i>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
							</p>
							<p class="form-group">
								<label for="email">Email address<span class="required">*</span></label>
								<i class="fa fa-envelope black" aria-hidden="true"></i>
								<input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Address">
							</p>
							<p class="form-group">
								<label for="subject">Subject<span class="required">*</span></label>
								<i class="fa fa-flag black" aria-hidden="true"></i>
								<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
							</p>
						</div>
						<div class="col-sm-6">
							<p class="contact-form-message form-group">
								<label for="message">Message</label>
								<i class="fa fa-comment black" aria-hidden="true"></i>
								<textarea aria-required="true" rows="3" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
							</p>
						</div>

					</div>
					<div class="row">
						<div class="col-sm-12">
							<p class="contact-form-submit text-center topmargin_30">
								<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button">Send Message</button>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
			
	</div>
</section>			
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');

$(document).ready(function() {
	    $("#contact_form_submit").click(function(e){
	    	$('#ajax_loading').show();
			$('#ajaxResponse').hide();
	    	e.preventDefault();

	    	var _token = $("input[name='_token']").val();
	    	var first_name = $("input[name='name']").val();
	    	var email = $("input[name='email']").val();
	    	var subject = $("input[name='subject']").val();
	    	var message = $("textarea[name='message']").val();

	        $.ajax({
	            url: "{!! url('/connectsave') !!}",
	            type:'POST',
	            data: {_token:_token, name:first_name, email:email, subject:subject, message:message},
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
	                // 	alert(data);
	                // 	alert('suuc');
	                // 	alert(data.success);
	                // }else{
	                // 	printErrorMsg(data.error);
	                // }
	            }
	        });

	    }); 

	 //    function printErrorMsg (msg) {
		// 	$(".print-error-msg").find("ul").html('');
		// 	$(".print-error-msg").css('display','block');
		// 	$.each( msg, function( key, value ) {
		// 		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
		// 	});
		// }
	});    

</script>
@endpush