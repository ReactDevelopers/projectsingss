@extends('templates.master')
@section('content')
<!-- Main Content -->


    <!--about start-->    
    
    <div id="about">
    	<div class="line2">
			<div class="container">
				<div class="row Fresh">
					<div class="col-md-12">
					  <h4>Who are We?</h4>
					  <p>{!! nl2br($setting->who_are_we) !!}</p>
					</div>		
				</div>
			</div>
		</div>
        <!--What do We Do-->
        @include('front.wedo')
        <!--What do We Do-->
        <div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
				</div>
			</div>
		</div>
        <!--Meet Our Team!-->    
		@include('front.ourteam')
        <!--Meet Our Team!-->  
		<div class="container">
			<div class="row">
				<div class="col-md-12 hr1">
					<hr/>
				</div>
			</div>
		</div>		
    
    <!--project start-->    
    @include('front.project')    
   <!--project start-->
   
    <!--news start-->
     @include('front.news')    
    
    
    
    <!--contact start-->
    
    <div id="contact">
    	<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h4>Who to Contact?</h4>
					<p>If you have a question for us, would like to pitch a show idea to us or even would like to work with us, please do drop us a line. We will get back to you soon.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-xs-12 forma">
					<div id="ajaxResponse"></div>
					<div id="ajax_loading" style="display:none;"><img src="{{asset('images/loading.gif')}}"></div>
					<form role="form" method="post" action="" _ajax="1" id="contactform">
						{{ csrf_field() }}					
						<input type="text" class="col-md-6 col-xs-12 name" name="user_name" id="user_name" placeholder="Name *"/>
						<input type="text" class="col-md-6 col-xs-12 Email" name="user_email" id="user_email" placeholder="Email *"/>
						<input type="text" class="col-md-12 col-xs-12 Subject" name="subject" id="subject" placeholder="Subject"/>
						<textarea type="text" class="col-md-12 col-xs-12 Message" name="message" id="message" placeholder="Message *"></textarea>
						<div class="cBtn col-xs-12">
							<ul>
								<li class="clear" ><a href="javascript:void(0);" id ="clearform"><i class="fa fa-times" style="color: #fff;"></i>clear form</a></li>
								<li class="send"><a href="javascript:void(0);" id="btnsubmit"><i class="fa fa-share" style="color: #fff;"></i>Send Message</a></li>
								
							</ul>
						</div>
					</form>
				</div>
				<div class="col-md-3 col-xs-12 cont">
					<ul>
						<li><i class="fa fa-home" style="color:#9c0b0e"></i>100G Pasir Panjang Road, Interlocal Centre, #06-14, Singapore 118523 &nbsp;<a href="#GoogleMap"></a></li>
						<li><i class="fa fa-phone" style="color:#ffd989"></i>+65 6592 0577</li>
						<li><a href="mailto:info@augustmh.com"><i class="fa fa-envelope"></i>info@augustmh.com</a></li>
                        <li><a href="skype:live:admin_104463?call"><i class="fa fa-skype" style="color:#12a5f4"></i>Skype</a></li>
                        <li><a href="https://www.linkedin.com/company/august-media-holdings-pte-ltd" target="_blank"><i class="fa fa-linkedin-square" style="color:#007bb6"></i>LinkedIn</a></li>
						<li><a href="https://twitter.com/augustmediasg" target="_blank"><i class="fa fa-twitter" style="color:#00aced"></i>Twitter</a></li>
						<li><a href="https://www.facebook.com/augustmediasg" target="_blank"><i class="fa fa-facebook-square" style="color:#3b5998"></i>Facebook</a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square" style="color:#dd4b39"></i>Google+</a></li>
                        <!-- Additional Social Media Links in Contacts--   
						
						<li><a href="#"><i class="fa fa-youtube-play"></i>YouTube</a></li>
                        -->
                        
					</ul>
				</div>
			</div>
		</div>
		<div class="line6">
        <div id="GoogleMap"></div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8265675882244!2d103.794285349895!3d1.2775319621558847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1a4fd6113e5f%3A0x4613cb6d21225c09!2sAugust+Media+Holdings+Pte+Ltd!5e0!3m2!1sen!2sin!4v1508732024232" width="100%" height="750" frameborder="0" style="border:0"></iframe>		
		</div>
		<div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					<div class="col-md-12 text-right">
						<!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
						<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
					</div>
					<div class="col-md-6 text-left copy">
						<p>Copyright &copy; 2014 August Media Holdings Pte Ltd. All Rights Reserved.<br>Characters, insignia and logos shown on this website are the property of thier respective rights holders. Used by permission.</p>
					</div>
					<div class="col-md-6 text-right dm">
						<ul id="downMenu">
							<li class="active"><a href="#home">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#project1">Projects</a></li>
							<li><a href="#news">News</a></li>
							<li class="last"><a href="#contact">Contact</a></li>
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>		
@endsection

@section('scripts')
<script type="text/javascript">

	  $(document).ready(function(){
	   
		$( "#clearform" ).click(function() {
			$("#contactform")[0].reset();
		});
		
		
		$('#btnsubmit').on('click', function (e) {
			$(this).addClass('notallowed');
			$('#ajax_loading').show();
			$('#ajaxResponse').hide();
			
			e.preventDefault();
			var user_name = $('#user_name').val();
			var user_email = $('#user_email').val();
			var subject = $('#subject').val();
			var message = $('#message').val();
			var _token = $('#contactform input[name="_token"]').val();
			$.ajax({
				type: "POST",
				url:'{{ url('addcontact')}}',
				data: {user_name: user_name, user_email: user_email, subject: subject, message: message, _token: _token},
				success: function( data ) {
					$('#ajax_loading').hide();
					$('#ajaxResponse').show();
					if(data.status=='success'){
						$("#ajaxResponse").html("<div style='color:green;'>"+data.message+"</div>");
						$("#contactform")[0].reset();
					} else {
						$("#ajaxResponse").html("<div style='color:red;'>"+data.errors+"</div>");
					}
					$("#btnsubmit").removeClass('notallowed');
				}
			});
		});
		
		$('#subscribe_email').on('keypress', function (evt) {
			var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
			
			if(keyCode == 13)
			{
				$('#btnsubscribe').trigger('click');
			}
		});
		
		$('#btnsubscribe').on('click', function (e) {
			$("#btnsubscribe").addClass('notallowed');
			$('#subscribe_loading').show();
			$('#ajax_response').hide();
			
			e.preventDefault();
			var subscribe_email = $('#subscribe_email').val();
			var _token = $('#subscribeform input[name="_token"]').val();
			
			$.ajax({
				type: "POST",
				url:'{{ url('subscribe')}}',
				data: {subscribe_email: subscribe_email, _token: _token},
				success: function( data ) {
					$('#subscribe_loading').hide();
					$('#ajax_response').show();
					if(data.status=='success'){
						$("#ajax_response").html("<div style='color:green;'>"+data.message+"</div>");
						$("#subscribeform")[0].reset();
					} else {
						$("#ajax_response").html("<div style='color:red;'>"+data.errors+"</div>");
					}
					$("#btnsubscribe").removeClass('notallowed');
				}
			});
		});
		
		var pagecount = {{$pages}}
		var pages = 2;
		if(pagecount == 1){
			$('.bhide2').hide();
		}
		$('#loadmore').on('click', function (e) {
			$(this).addClass('notallowed'); 
			$.ajax({
				type: "GET",
				url:'{{ url('loadmore')}}?pages='+pages,
				success: function( data ) {
					$("#loadmorehtml").append(data);
					if(pagecount == pages){
						$('.bhide2').hide();
					}
					pages = pages+1;
					$('#loadmore').removeClass('notallowed');
				}
			});
		});
	  });
	  </script>
@stop
