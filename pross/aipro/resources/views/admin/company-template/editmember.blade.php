@extends('layouts.admin.master')
@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

  <section class="content">
      <!-- <div class="row"> -->
<!-- general form elements disabled -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{$page_title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('success') }}
              </div>
              @endif

              <form role="form" method="post" action="{{ url('admin/member-save/'.$template->id)}}" enctype="multipart/form-data">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                {{ csrf_field() }}
                  <div class="box-body">
                   <!--  <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ (old('name')) ? old('name') : $template->name }}">
                      @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title')}}</span>
                      @endif
                    </div> --><!-- 
                    <div class="box-body">
                    <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">2</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ (old('name')) ? old('name') : $template->name }}">
                      @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title')}}</span>
                      @endif
                    </div> -->

                    <div class="form-group validate-required{{ $errors->feature1->has('member_first_name') ? ' has-error' : '' }}" id="member_first_name_field">
                        <label for="member_first_name" class="control-label">
                        <span class="grey"><b>Name</b></span>
                        <span class="required">*</span>
                        <i>(include your Middle Name if you use one)</i>
                        </label>
                        <input type="text" class="form-control" name="member_first_name" id="member_first_name" placeholder="" value="{{ (old('member_first_name')) ? old('member_first_name') : $template['name'] }}">
                        <!-- <input type="hidden" name="t1" value="v2"> -->
                    </div>
                    <!-- </div> -->
                              
                      <div class="form-group validate-required{{ $errors->feature1->has('member_surname') ? ' has-error' : '' }}" id="member_surname_field">
                        <label for="member_surname" class="control-label">
                        <span class="grey"><b>Surname</b></span>
                        <span class="required">*</span>
                        <i>(will appear after your First Name in listings)</i>
                        </label>
                        <input type="text" class="form-control" name="member_surname" id="member_surname" placeholder="" value="{{ (old('member_surname')) ? old('member_surname') : $template['surname'] }}">
                      </div>
                   
                      <div class="form-group validate-required{{ $errors->feature1->has('member_designation') ? ' has-error' : '' }}" id="member_designation_field">
                        <label for="member_designation" class="control-label">
                        <span class="grey"><b>Designation</b></span>
                        <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" name="member_designation" id="member_designation" placeholder="" value="{{ (old('member_designation')) ? old('member_designation') : $template['designation'] }}">
                      </div>
                  
                      <div class="form-group validate-required{{ $errors->feature1->has('member_email') ? ' has-error' : '' }}" id="member_email_field">
                        <label for="member_email" class="control-label">
                        <span class="grey"><b>Email Address</b></span>
                        <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" name="member_email" id="member_email" placeholder="" value="{{ (old('member_email')) ? old('member_email') : $template['email'] }}">
                      </div>
             
                      <div class="form-group validate-required{{ $errors->feature1->has('member_phone') ? ' has-error' : '' }}" id="member_phone_field">
                        <label for="member_phone" class="control-label">
                        <span class="grey"><b>Phone Number</b></span>
                        <span class="required">*</span>
                        </label>
                        <input type="text" class="form-control" name="member_phone" id="member_phone" placeholder="" value="{{ (old('member_phone')) ? old('member_phone') : $template['userphone_number'] }}">
                      </div>
                    <!-- </div> -->
                      
                      <div class="form-group validate-required{{ $errors->feature1->has('member_profilepic') ? ' has-error' : '' }}" id="member_profilepicfile_field">
                        <label for="member_phone" class="control-label">
                        <span class="grey"><b>Profile Picture</b></span>
                        <span class="required">*</span>
                        </label>
                        <input type="file" class="form-control" name="member_profilepic" id="member_profilepic" placeholder="" value="">
                        <i>Choose a square pic of just your face in .png format, not larger than 200 kb and 300 x 300 pixels.</i> <br>
                        <input class="theme_button color2" id="profilepic" type="button" value="Upload Pic" >
                      </div>
                  
                      <div >
                        <label for="member_phone" class="control-label">
                        <span class="grey"><b>Profile Pic Preview</b></span>
                          </label>
                        <br>
                        @if($template['profile_picture'])
                          <img src="{{ asset('uploads/memberdetailspics').'/'.$template['profile_picture'] }}" id="myImg" alt=""/>
                          @else
                          <img src="{{ asset('images/faces/01.jpg') }}" id="myImg" alt=""/>
                          @endif
                          <input type="hidden" value="{!!$template['profile_picture']!!}" name="member_profilepic_old">
                      </div>
                  
                      <div class="form-group validate-required{{ $errors->feature1->has('member_bios') ? ' has-error' : '' }}" id="member_bios_field">
                        <label for="member_bios" class="control-label">
                        <span class="grey"><b>Bios</b></span>
                        <span class="required">*</span>
                        </label>
                        <textarea rows="5" columns="30" type="text" class="form-control" name="member_bios" id="member_bios" placeholder="" value="">{{ (old('member_bios')) ? old('member_bios') : $template['bios'] }}</textarea>
                      </div>
                  
                      <div class="form-group validate-required{{ $errors->feature1->has('member_facebook') ? ' has-error' : '' }}" id="member_facebook_field">
                        <label for="member_facebook" class="control-label">
                         <i class="fa fa-facebook-official social-color-facebook"></i>
                        <span class="grey"><b>Facebook</b></span>
                        </label>
                        <input type="text" class="form-control" name="member_facebook" id="member_facebook" placeholder="" value="{{ (old('member_facebook')) ? old('member_facebook') : $template['facebook_url'] }}">
                      </div>
                    
                      <div class="form-group validate-required{{ $errors->feature1->has('member_twitter') ? ' has-error' : '' }}" id="member_twitter_field">
                        <label for="member_twitter" class="control-label">
                        <i class="fa fa-twitter social-color-twitter"></i>
                        <span class="grey"><b>Twitter Handle</b></span>
                        </label>
                        <input type="text" class="form-control" name="member_twitter" id="member_twitter" placeholder="" value="{{ (old('member_twitter')) ? old('member_twitter') : $template['twitter_url'] }}">
                      </div>
                   
                      <div class="form-group validate-required{{ $errors->feature1->has('member_linkedin') ? ' has-error' : '' }}" id="member_linkedin_field">
                        <label for="member_linkedin" class="control-label">
                         <i class="fa fa-linkedin-square social-color-linkedin"></i>
                        <span class="grey"><b>LinkedIn</b></span>
                        </label>
                        <input type="text" class="form-control" name="member_linkedin" id="member_linkedin" placeholder="" value="{{ (old('member_linkedin')) ? old('member_linkedin') : $template['linkedIn_url'] }}">
                      </div>
                    </div>
                     <!--  <p>We encourage you to add your social media profiles to the AIPRO pages. Being connected to potential clients via social media brings you closer to them. Sharing news about your work on your social media pages increases visibility among your work circles.</p> -->
                      <!-- <br> -->
                    <p class="required"><i>Have you checked for spelling, letter case and punctuation errors? Have you checked your social media links once again?</i></p>
                                      <div>                    
                      
                      <div class="form-group">
                      <a href="{!!url('admin/comprofile-template')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
                  <!-- /.box-body -->

                  
                </form>
            </div>
            <!-- /.box-body -->
          </div>
   <!--  </div> -->
  </section>
  </div>
@endsection
