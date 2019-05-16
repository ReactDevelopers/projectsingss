@extends('layouts.user.master')
@section('content')

<!-- template sections -->
	
<section class="ls with_bottom_border">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb darklinks">
          <li>
            <a href="#">Admin Panel</a>
          </li>
          <li class="active">Company Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>	


			<section class="ls section_padding_top_20 section_padding_bottom_100 columns_padding_25">
				<div class="container">
					
					<div class="row">
						
						<div class="row">

						<div class="col-md-12">

							<div class="row">
								<div class="col-md-12">
									<h3>Edit Your Company Profile</h3>
									<strong class="required">Note: &nbsp;</strong>Required fields are marked with &nbsp;<span class="required">*</span>
								</div>
							</div>

							@php
							$postTab = Session::get('activeTab');
							@endphp			

							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								
								<li @php echo ($postTab == 'feature1' || !$postTab) ? 'class="active"' : '' @endphp>
									<a href="#tab1" role="tab" data-toggle="tab">
										<i class="fa fa-file-text"></i>Company Details</a>
								</li>
								<li @php echo ($postTab == 'feature2') ? 'class="active"' : '' @endphp>
									<a href="#tab2" role="tab" data-toggle="tab">
										<i class="fa fa-picture-o"></i>Company Profile Pics</a>
								</li>
									
								<li @php echo ($postTab == 'feature3') ? 'class="active"' : '' @endphp>
									<a href="#tab3" role="tab" data-toggle="tab">
										<i class="fa fa-user"></i>Member Details</a>
								</li>
								<li @php echo ($postTab == 'feature4') ? 'class="active"' : '' @endphp>
									<a href="#tab4" role="tab" data-toggle="tab">
										<i class="fa fa-cloud-upload"></i>{{ $userdata['com_status']=='Inactive' ? 'Publish':'UnPublish' }}</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content top-color-border">
								<div class="tab-pane fade @php echo ($postTab == 'feature1' || !$postTab) ? 'active in' : '' @endphp" id="tab1">
								<form role="form" method="post" id="comform" action="{{ url('user/comprofilesave')}}" enctype="multipart/form-data">
									@php
										if(old('form_name') == 'feature1') {
											$request1 = \app('request');
										} else {
											$request1 = null;
										}
									@endphp
									<!-- <input type="hidden" name="form_name" value="feature1"> -->
									{{ csrf_field() }}
                  <div class="col-sm-6">
										<div class="form-group validate-required{{ $errors->feature1->has('company_name') ? ' has-error' : '' }}" id="company_name_field">
											<label for="company_name" class="control-label">
											<span class="grey"><b>Company Name</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="company_name" id="company_name" placeholder="" value="{{ (old('company_name')) ? old('company_name') : $userdata['com_name'] }}">
										</div>
									</div>
										
                  <div class="col-sm-6">
										<div class="form-group validate-required{{ $errors->feature1->has('comany_url') ? ' has-error' : '' }}" id="comany_url_field">
											<label for="comany_url" class="control-label">
											<span class="grey"><b>URL</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="comany_url" id="comany_url" placeholder="" value="{{ (old('comany_url')) ? old('comany_url') : $userdata['com_url'] }}">
										</div>
									</div>
                <div class="col-sm-5">
										<div class="form-group validate-required{{ $errors->feature1->has('comany_roadaddress') ? ' has-error' : '' }}" id="comany_roadaddress_field">
											<label for="comany_roadaddress" class="control-label">
											<span class="grey"><b>Road Address</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="comany_roadaddress" id="comany_roadaddress" placeholder="" value="{{ (old('comany_roadaddress')) ? old('comany_roadaddress') : $userdata['road_address'] }}">
										</div>
									</div>
                                   <div class="col-sm-5">
										<div class="form-group validate-required{{ $errors->feature1->has('comany_unitaddress') ? ' has-error' : '' }}" id="comany_unitaddress_field">
											<label for="comany_unitaddress" class="control-label">
											<span class="grey"><b>Unit Address</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="comany_unitaddress" id="comany_unitaddress" placeholder="" value="{{ (old('comany_unitaddress')) ? old('comany_unitaddress') : $userdata['unit_address'] }}">
										</div>
									</div>
                <div class="col-sm-2">
										<div class="form-group validate-required{{ $errors->feature1->has('company_postalcode_address') ? ' has-error' : '' }}" id="company_postalcode_field">
											<label for="comany_pos{{ $errors->feature1->has('member_first_name') ? ' has-error' : '' }}talcode_address" class="control-label">
											<span class="grey"><b>Postal Code</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="company_postalcode_address" id="company_postalcode_address" placeholder="" value="{{ (old('company_postalcode_address')) ? old('company_postalcode_address') : $userdata['postal_code'] }}">
										</div>
									</div>
										
									<div class="col-sm-6">
										<div class="form-group {{ $errors->feature1->has('company_email') ? ' has-error' : '' }}" id="company_email_field">
											<label for="company_email" class="control-label">
											<span class="grey"><b>General Email Address</b></span>
											</label>
											<input type="text" class="form-control" name="company_email" id="company_email" placeholder="" value="{{ (old('company_email')) ? old('company_email') : $userdata['general_email'] }}">
										</div>
									</div>
                <div class="col-sm-3">
										<div class="form-group validate-required{{ $errors->feature1->has('company_phone') ? ' has-error' : '' }}" id="company_phone_field">
											<label for="company_phone" class="control-label">
											<span class="grey"><b>Phone Number</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="company_phone" id="company_phone" placeholder="" value="{{ (old('company_phone')) ? old('company_phone') : $userdata['comphone_number'] }}">
										</div>
									</div>
										
                 <div class="col-sm-3">
										<div class="form-group {{ $errors->feature1->has('company_fax') ? ' has-error' : '' }}" id="company_fax_field">
											<label for="company_phone" class="control-label">
											<span class="grey"><b>Fax Number</b></span>
											</label>
											<input type="text" class="form-control" name="company_fax" id="company_fax" placeholder="" value="{{ (old('company_fax')) ? old('company_fax') : $userdata['fax_number'] }}">
										</div>
									</div>
                <div class="col-sm-4">
										<div class="form-group {{ $errors->feature1->has('company_facebook') ? ' has-error' : '' }}" id="company_facebook_field">
											<label for="company_facebook" class="control-label">
                      <i class="fa fa-facebook-official social-color-facebook"></i>
											<span class="grey"><b>Company Facebook Page</b></span>
											</label>
											<input type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="" value="{{ (old('company_facebook')) ? old('company_facebook') : $userdata['com_facebook_url'] }}">
										</div>
									</div>
                <div class="col-sm-4">
										<div class="form-group {{ $errors->feature1->has('company_twitter') ? ' has-error' : '' }}" id="company_twitter_field">
											<label for="company_twitter" class="control-label">
                       <i class="fa fa-twitter social-color-twitter"></i>
											<span class="grey"><b>Company Twitter Handle</b></span>
											</label>
											<input type="text" class="form-control" name="company_twitter" id="company_twitter" placeholder="" value="{{ (old('company_twitter')) ? old('company_twitter') : $userdata['com_twitter_url'] }}">
										</div>
									</div>
                  <div class="col-sm-4">
										<div class="form-group {{ $errors->feature1->has('company_linkedin') ? ' has-error' : '' }}" id="company_linkedin_field">
											<label for="company_linkedin" class="control-label">
                      <i class="fa fa-linkedin-square social-color-linkedin"></i>
											<span class="grey"><b>Company LinkedIn Page</b></span>
											</label>
											<input type="text" class="form-control" name="company_linkedin" id="company_linkedin" placeholder="" value="{{ (old('company_linkedin')) ? old('company_linkedin') : $userdata['com_linkedIn_url'] }}">
										</div>
									</div>
                      <p>We encourage you to add your social media profiles to the AIPRO pages. Being connected to potential clients via social media brings you closer to them. Sharing news about your work on your social media pages increases visibility among your work circles.</p>
									<div class="col-sm-12">
										<div class="form-group {{ $errors->feature1->has('company_headline') ? ' has-error' : '' }}" id="company_headline_field">
											<label for="company_headline" class="control-label">
											<span class="grey"><b>Company Headline</b></span>
											</label>
											<input type="text" class="form-control" name="company_headline" id="company_headline" placeholder="Add a headline for your company here. Limit to 140 characters as you would on Twitter." value="{{ (old('company_headline')) ? old('company_headline') : $userdata['com_headline'] }}">
										</div>
									</div>
                    
										<div class="col-sm-6">
										<div class="form-group validate-required{{ $errors->feature1->has('activity') ? ' has-error' : '' }}" id="company_activities_field">
											<!-- {{$userdata['categories']}} -->
											<label for="company_activities" class="control-label">
											<span class="grey"><b>Content Categories</b></span>
											<span class="required">*</span>
											<i>(choose up to 5 activities)</i>
											</label>
											<br>
											<?php 
											$category = $userdata['categories'];
											$categoriesArray = [];
											if($category){
												$categoriesArray = explode(",", $category);
												$categoriesArray = array_filter($categoriesArray);
											}
											$loopCount = 0;
											foreach($categories as $catKey => $catVal) {
												echo ($loopCount%8 == 0 ? '<div class="col-sm-6">' : '');
											?>
												<span class="checkbox">
													<input type="checkbox"  id="{{$catKey}}"
													<?php
													if(old('activity')) {
														echo (in_array($catKey, old('activity') ) ? 'checked="checked"' : '');
													} else {
														echo (in_array($catKey, $categoriesArray) ? 'checked="checked"' : '');
													}
													?>
													class="checkbox-inline" name="activity[]" value="{{$catKey}}"><label for="{{$catKey}}">{{$catVal}}</label>
												</span>
											<?php
											$loopCount++;
											echo ($loopCount%8 ==  0 ? '</div>' : '');
											}
											?>
										</div>
									</div>
                  <div class="col-sm-6">
										<div class="form-group {{ $errors->feature1->has('service') ? ' has-error' : '' }}" id="company_services_field">
											<label for="company_services" class="control-label">
												<span class="grey"><b>Services</b></span>
												<span class="required">*</span>
												<i>(choose up to 5 services)</i>
											</label>
											<br>
											<?php 
											$servis = $userdata['services'];
											$servisArray = [];
											if($servis){
												$servisArray = explode(",", $servis);
												$servisArray = array_filter($servisArray);
											}
											$loopCount = 0;
											foreach($services as $serKey => $serVal){
											
											echo ($loopCount%9 == 0 ? '<div class="col-sm-6">' : '');
											?>
											
											<span class="checkbox">
											<input type="checkbox" id="{{$serKey}}"
											<?php
											if(old('service')) {
												echo (in_array($serKey, old('service')) ? 'checked="checked"' : '');
											} else {
												echo (in_array($serKey, $servisArray) ? 'checked="checked"' : '');
											}
											?>
											class="checkbox-inline" name="service[]" value="{{$serKey}}"><label for="{{$serKey}}">{{$serVal}}</label>
												</span>
											<?php
											$loopCount++;
											echo ($loopCount%9 ==  0 ? '</div>' : '');
											}
											?>
												
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group {{ $errors->feature1->has('company_testimony') ? ' has-error' : '' }}" id="company_testimony_field">
										  <label for="company_testimony" class="control-label"> <span class="grey"><strong>Company Testimony</strong></span> </label>
										  <textarea rows="5" columns="30" type="text" class="form-control" name="company_testimony" id="company_testimony" placeholder="">{{ (old('company_testimony')) ? old('company_testimony') : $userdata['com_testimony'] }}</textarea>
									  </div>
									</div>
                           			<div class="col-sm-9">
										<div class="form-group validate-required{{ $errors->feature1->has('company_bios') ? ' has-error' : '' }}" id="company_bios_field">
											<label for="company_bios" class="control-label">
											<span class="grey"><b>Company Write-Up</b></span>
											<span class="required">*</span>
											</label>
											<textarea rows="5" columns="30" type="text" class="form-control" name="company_bios" id="company_bios" placeholder="">{{ (old('company_bios')) ? old('company_bios') : $userdata['com_write_up'] }}</textarea>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group validate-required{{ $errors->feature1->has('testimony_name') ? ' has-error' : '' }}" id="testimonial_name_field">
											<label for="testimony_name" class="control-label">
											<span class="grey"><b>Testimonial Giver Name</b></span>
											<span class="required">*</span>
                                        	<i>(include the Full Name of your testimonial provider)</i>
											</label>
											<input type="text" class="form-control" name="testimony_name" id="testimony_name" placeholder="" value="{{ (old('testimony_name')) ? old('testimony_name') : $userdata['testimonial_name'] }}">
										</div>
									</div>
                                    <div class="col-sm-6">
										<div class="form-group validate-required{{ $errors->feature1->has('testimony_designation') ? ' has-error' : '' }}" id="testimony_designation_field">
											<label for="testimony_designation" class="control-label">
											<span class="grey"><b>Testimonial Giver Designation</b></span>
											<span class="required">*</span>
											</label>
											<input type="text" class="form-control" name="testimony_designation" id="testimony_designation" placeholder="" value="{{ (old('testimony_designation')) ? old('testimony_designation') : $userdata['testimonial_designation'] }}">
										</div>
									</div>
									<p class="required"><i>Have you checked for spelling, letter case and punctuation errors? Have you checked your company URL, email address and social media links once again?</i></p>
                                  	<div>
										<a class="theme_button inverse" id ="comfrm" href="javascript:void(0);">Clear Form</a>
										 <input type="submit" class="theme_button color2" value="NEXT" name="sub">
										<!-- <a class="theme_button color2" href="#">Submit </a> -->
                                  	</div>
								</form>
							</div>
								<!-- Company Profile Pics Form -->
								<!-- <div class="tab-pane fade @php echo ($postTab == 'feature2') ? 'active in' : '' @endphp" id="tab2"> -->
									<!-- Company Poster Form -->
								<div class="tab-pane fade @php echo ($postTab == 'feature2') ? 'active in' : '' @endphp" id="tab2">
									<form role="picform" id="compicform" method="post" action="{{ url('user/composterpicsave')}}" enctype="multipart/form-data">
										@php
										if(old('form_name') == 'feature2') {
											$request2 = \app('request');
										} else {
											$request2 = null;
										}
										@endphp	
										<!-- <input type="hidden" name="form_name" value="feature2"> -->
									{{ csrf_field() }}
                                  	 <div class="col-sm-4">
										<div class="form-group validate-required{{ $errors->feature1->has('feature_profilepic') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
											<label for="feature_phone" class="control-label">
											<span class="grey"><b>Company Poster Picture</b></span>
											<span class="required">*</span>
											</label>
											<input type="file" class="form-control" name="feature_profilepic" id="feature_profilepic" placeholder="" value="">
											<i>Choose a picture that best represents your company or its work in .png or .jpg format, not larger than 340 kb and exactly 1170 (w) x 658 (h) pixels.</i><br>
											<input class="theme_button color1" id="companyprofilepic" type="button" value="Upload Pic">
										</div>
									</div>
                                 	<div class="col-sm-8">
									  	<div>
											<label for="feature_phone" class="control-label">
											<span class="grey"><b>Company Poster Preview</b></span>
										  	</label>
											<br>
												@if($userdata['poster_pic'])
											  	<img src="{{ asset('uploads/features').'/'.$userdata['poster_pic'] }}" id="myposter" alt=""/>
											  	@else
											  	<img src="{{ asset('images/gallery/01.jpg') }}" id="myposter" alt=""/>
											  	@endif
											  	<input type="hidden" value="{!!$userdata['poster_pic']!!}" name="feature_profilepic_old">
										</div>
									</div>
									
                                 	<div>
										<a class="theme_button inverse" href="#">Clear Form</a>
										 <input type="submit" class="theme_button color2" value="NEXT" name="sub">
										<!-- <a class="theme_button color2" href="#">Next</a> -->
                                  	</div>
                                  	</form>
								</div>
								<!-- End Company Poster Form -->

								<!-- End Company Profile Pics Form -->
								<!-- Member Details Form -->
                                <div class="tab-pane fade @php echo ($postTab == 'feature3') ? 'active in' : '' @endphp" id="tab3">
									<form role="form" id="userform" method="post" action="{{ url('user/profilesave')}}" enctype="multipart/form-data">
										@php
										if(old('form_name') == 'feature3') {
											$request3 = \app('request');
										} else {
											$request3 = null;
										}
										@endphp	
										<!-- <input type="hidden" name="form_name" value="feature3"> -->
									{{ csrf_field() }}
	                        			<div class="col-sm-6">
											<div class="form-group validate-required{{ $errors->feature1->has('member_first_name') ? ' has-error' : '' }}" id="member_first_name_field">
												<label for="member_first_name" class="control-label">
												<span class="grey"><b>Name</b></span>
												<span class="required">*</span>
	                                        	<i>(include your Middle Name if you use one)</i>
												</label>
												<input type="text" class="form-control" name="member_first_name" id="member_first_name" placeholder="" value="{{ (old('member_first_name')) ? old('member_first_name') : $userdata['name'] }}">
												<input type="hidden" name="t1" value="v2">
												<!-- @if ($errors->feature1->has('member_first_name'))
												<span class="help-block">
												<strong>{{ $errors->feature1->first('member_first_name') }}</strong>
												</span>
												@endif -->
											</div>
										</div>
	                                    <div class="col-sm-6">
											<div class="form-group validate-required{{ $errors->feature1->has('member_surname') ? ' has-error' : '' }}" id="member_surname_field">
												<label for="member_surname" class="control-label">
												<span class="grey"><b>Surname</b></span>
												<span class="required">*</span>
	                                        	<i>(will appear after your First Name in listings)</i>
												</label>
												<input type="text" class="form-control" name="member_surname" id="member_surname" placeholder="" value="{{ (old('member_surname')) ? old('member_surname') : $userdata['surname'] }}">
											</div>
										</div>
	                                    <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_designation') ? ' has-error' : '' }}" id="member_designation_field">
												<label for="member_designation" class="control-label">
												<span class="grey"><b>Designation</b></span>
												<span class="required">*</span>
												</label>
												<input type="text" class="form-control" name="member_designation" id="member_designation" placeholder="" value="{{ (old('member_designation')) ? old('member_designation') : $userdata['designation'] }}">
											</div>
										</div>
	                                    <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_email') ? ' has-error' : '' }}" id="member_email_field">
												<label for="member_email" class="control-label">
												<span class="grey"><b>Email Address</b></span>
												<span class="required">*</span>
	                                        	</label>
												<input type="text" class="form-control" name="member_email" id="member_email" placeholder="" value="{{ (old('member_email')) ? old('member_email') : $userdata['email'] }}">
											</div>
										</div>
	                                    <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_phone') ? ' has-error' : '' }}" id="member_phone_field">
												<label for="member_phone" class="control-label">
												<span class="grey"><b>Phone Number</b></span>
												<span class="required">*</span>
												</label>
												<input type="text" class="form-control" name="member_phone" id="member_phone" placeholder="" value="{{ (old('member_phone')) ? old('member_phone') : $userdata['userphone_number'] }}">
											</div>
										</div>
	                                  	<div class="col-sm-3">
											<div class="form-group validate-required{{ $errors->feature1->has('member_profilepic') ? ' has-error' : '' }}" id="member_profilepicfile_field">
												<label for="member_phone" class="control-label">
												<span class="grey"><b>Profile Picture</b></span>
												<span class="required">*</span>
												</label>
												<input type="file" class="form-control" name="member_profilepic" id="member_profilepic" placeholder="" value="">
												<!-- @if ($errors->feature1->has('member_profilepic'))
												<span class="help-block">
												<strong>{{ $errors->feature1->first('member_profilepic') }}</strong>
												</span>
												@endif -->
												<i>Choose a square pic of just your face in .png format, not larger than 200 kb and 300 x 300 pixels.</i> <br>
												<input class="theme_button color2" id="profilepic" type="button" value="Upload Pic" >
												<!-- <input type="hidden" id="hid" name="hid"> -->
												<!-- <button class="theme_button color2" type="button" onclick="function()">Upload Pic</button> -->
											</div>
										</div>
	                                 	<div class="col-sm-2">
										  <div >
												<label for="member_phone" class="control-label">
												<span class="grey"><b>Profile Pic Preview</b></span>
											  	</label>
												<br>
												@if($userdata['profile_picture'])
											  	<img src="{{ asset('uploads/memberdetailspics').'/'.$userdata['profile_picture'] }}" id="myImg" alt=""/>
											  	@else
											  	<img src="{{ asset('images/faces/01.jpg') }}" id="myImg" alt=""/>
											  	@endif
											  	<input type="hidden" value="{!!$userdata['profile_picture']!!}" name="member_profilepic_old">
											</div>
										</div>
	                                   	<div class="col-sm-7">
											<div class="form-group validate-required{{ $errors->feature1->has('member_bios') ? ' has-error' : '' }}" id="member_bios_field">
												<label for="member_bios" class="control-label">
												<span class="grey"><b>Bios</b></span>
												<span class="required">*</span>
												</label>
												<textarea rows="5" columns="30" type="text" class="form-control" name="member_bios" id="member_bios" placeholder="Add a short paragraph about yourself. Think of it as the first introduction you would make of yourself to your biggest potential client. Those first words are exactly what you would put here. Make sure it isn't more than 350 characters including spaces and punctuation. Just as an example, it should be exactly as big as this paragraph is in this box." value="">{{ (old('member_bios')) ? old('member_bios') : $userdata['bios'] }}</textarea>
											</div>
										</div>
	                                   
	                  <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_facebook') ? ' has-error' : '' }}" id="member_facebook_field">
												<label for="member_facebook" class="control-label">
	                       <i class="fa fa-facebook-official social-color-facebook"></i>
												<span class="grey"><b>Facebook</b></span>
												</label>
												<input type="text" class="form-control" name="member_facebook" id="member_facebook" placeholder="" value="{{ (old('member_facebook')) ? old('member_facebook') : $userdata['facebook_url'] }}">
											</div>
										</div>
	                  <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_twitter') ? ' has-error' : '' }}" id="member_twitter_field">
												<label for="member_twitter" class="control-label">
	                      <i class="fa fa-twitter social-color-twitter"></i>
												<span class="grey"><b>Twitter Handle</b></span>
												</label>
												<input type="text" class="form-control" name="member_twitter" id="member_twitter" placeholder="" value="{{ (old('member_twitter')) ? old('member_twitter') : $userdata['twitter_url'] }}">
											</div>
										</div>
	                  <div class="col-sm-4">
											<div class="form-group validate-required{{ $errors->feature1->has('member_linkedin') ? ' has-error' : '' }}" id="member_linkedin_field">
												<label for="member_linkedin" class="control-label">
	                       <i class="fa fa-linkedin-square social-color-linkedin"></i>
												<span class="grey"><b>LinkedIn</b></span>
												</label>
												<input type="text" class="form-control" name="member_linkedin" id="member_linkedin" placeholder="" value="{{ (old('member_linkedin')) ? old('member_linkedin') : $userdata['linkedIn_url'] }}">
											</div>
										</div>
	                           			<p>We encourage you to add your social media profiles to the AIPRO pages. Being connected to potential clients via social media brings you closer to them. Sharing news about your work on your social media pages increases visibility among your work circles.</p>
	                           			<br>
										<p class="required"><i>Have you checked for spelling, letter case and punctuation errors? Have you checked your social media links once again?</i></p>
	                                  	<div>
											<a class="theme_button inverse" id ="userfrm" href="javascript:void(0);">Clear Form</a>
											<input type="submit" class="theme_button color2" value="NEXT" name="sub">
											<!-- <a class="theme_button color2" href="#">Submit </a> -->
	                                  	</div>
									</form>
								</div>
                                <!-- End of Member Details Form -->
                <!-- Agree to Terms and Publish -->
								<div class="tab-pane fade @php echo ($postTab == 'feature4') ? 'active in' : '' @endphp" id="tab4">
									<form action="{{ url('/user/pubsave') }}" method="post" name="pub" id = "pub" autocomplete="off" enctype="multipart/form-data">
                                		{{ csrf_field() }}
									<div>
										<input type="submit" class="theme_button color1" value="{{ $userdata['com_status']=='Inactive' ? 'Publish':'UnPublish' }}" name="sub">
										<input type="hidden" id="hid1" name="hid1" value="{{ $userdata['com_status']=='Inactive' ? 'Active':'Inactive' }}">
									</div>
									</form>
								</div>
								<!-- End Publish -->
							</div>

						</div>

					</div>
						
					</div>
				</div>
			</section>

@include('layouts.user.footer')		
			<!-- template sections -->
		
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush


@push('customjs')
<script type="text/javascript">
	// function imageValidate (){alert('hello');}
// Function to preview image after validation
// $(function() {

// });

$(function() {

$("body").on("click","#comfrm",function(e){
		$('#comform')[0].reset();
	});

$("body").on("click","#userfrm",function(e){
		$('#userform')[0].reset();
	});

var _URL = window.URL || window.webkitURL;
$("body").on("click","#profilepic",function(e){

var file =  document.getElementById('member_profilepic').files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
img = new Image();
    img.onload = function () 
{
          // alert(this.width + " " + this.height);
	var imageInfo = this.name    +' '+ // get the value of `name` from the `file` Obj
	this.width  +'×'+ // But get the width from our `image`
	this.height +' '+
	Math.round(this.size/1024) +'KB';
};
fileSize = file.size //size in kb
fileSize = fileSize / 1024; //size in kb
// alert(fileSize);
if((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))
{
	// alert('File Is .png');
	// $('#previewing').attr('src','noimage.png');
	// $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
	// return false;
	if(fileSize>200)
	{
		alert("Uploaded File Size is greater than 200kb" + fileSize + "Kb");
	}
	else if(this.width>300) 
	{
		alert('Width is greater than 300');
	}
	else if(this.height>300)
	{
		alert('Height is greater than 300');
	}	
	else
	{
		reader = new FileReader();
		reader.onload = imageIsLoaded;
		reader.readAsDataURL(file);
		// alert(imageInfo);
	}
}
else
{
	alert('Only png and jpeg Images type allowed');
}

// imgId = $(this).attr('member_profilepic');
// if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
//      alert('The File APIs are not fully supported in this browser.');
//      return;
//    }
// //$("#message").empty(); // To remove the previous error message
//    // alert('hello');

// img.src = _URL.createObjectURL(file);


});

// });

function imageIsLoaded(e) { 
$('#myImg').attr('src', reader.result);
// document.getElementById("hid").value = reader.result;  
};


// $("body").on("click","#companyprofilepic",function(e){
// var file =  document.getElementById('feature_profilepic').files[0];
$("body").on("click","#companyprofilepic",function(e){
	// imgmainid = $(this).attr('data-imgmainid');
 	if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }
		//$("#message").empty(); // To remove the previous error message
		var file =  document.getElementById('feature_profilepic').files[0];
		
		img = new Image();
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
        img.onload = function () {
        	// alert(this.width);
        	// alert(this.height);
        	// alert(imagefile);
			fileSize = file.size //size in kb
			fileSize = fileSize / 1024; //size in kb
        	// alert(fileSize);
			if(1170 < this.width || 658 < this.height){
				alert('Please Select 1170 (w) x 658 (h) pixels');
			} else if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				alert('Please Select A valid Image File');
			} else if(fileSize > 340) {
				alert('Your image size must be less then 340 KB');
			} else {
				reader = new FileReader();
				reader.onload = picIsLoaded;
				reader.readAsDataURL(file);
			}
		  
        };
		
		img.src = _URL.createObjectURL(file);
		
 		
	});

});
function picIsLoaded(e) { 
$('#myposter').attr('src', reader.result);  
};

</script> 
@endpush