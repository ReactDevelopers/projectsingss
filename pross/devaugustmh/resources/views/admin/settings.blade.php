@extends('templates.admin.master')
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
              <h3 class="box-title">General Settings</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('success') }}
              </div>
              @endif

              <form role="form" method="post" action="{{ url('update-setting') }}" enctype="multipart/form-data">
                <!-- text input -->
                {{ csrf_field() }}

                <div class="form-group @if ($errors->has('admin_email'))has-error @endif">
                  <label>Admin Email:</label>
                  <input type="text" class="form-control" name="admin_email" value="{{ (old('admin_email')) ? old('admin_email') : $setting->admin_email }}" placeholder="Enter Admin Email">
                  @if ($errors->has('admin_email'))
                    <span class="help-block">
                    {{ $errors->first('admin_email')}}
                    </span>
                  @endif
                </div>
                
                <!--<div class="form-group">
                  <label>Facebook URL:</label>
                  <input type="text" class="form-control" name="facebook_url" value="{{ (old('facebook_url')) ? old('facebook_url') : $setting->facebook_url }}" placeholder="Enter Facebook URL">
                </div>
                <div class="form-group">
                  <label>Twitter URL:</label>
                  <input type="text" class="form-control" name="twitter_url" value="{{ (old('twitter_url')) ? old('twitter_url') : $setting->twitter_url }}" placeholder="Enter Twitter URL">
                </div>
                <div class="form-group">
                  <label>LinkedIn URL:</label>
                  <input type="text" class="form-control" name="linkedin_url" value="{{ (old('linkedin_url')) ? old('linkedin_url') : $setting->linkedin_url }}" placeholder="Enter LinkedIn URL">
                </div>
                <div class="form-group">
                  <label>Google + URL:</label>
                  <input type="text" class="form-control" name="google_url" value="{{ (old('google_url')) ? old('google_url') : $setting->google_url }}" placeholder="Enter Google + URL">
                </div>-->

                <div class="form-group @if ($errors->has('smtp_server_host')) has-error @endif">
                  <label>SMTP Host:</label>
                  <input type="text" class="form-control" name="smtp_server_host" value="{{ (old('smtp_server_host')) ? old('smtp_server_host') : $setting->smtp_server_host }}" placeholder="Enter SMTP Host">
                  @if ($errors->has('smtp_server_host'))
                    <span class="help-block">
                    {{ $errors->first('smtp_server_host')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_port_number')) has-error @endif">
                  <label>SMTP Port:</label>
                  <input type="text" class="form-control" name="smtp_port_number" value="{{ (old('smtp_port_number')) ? old('smtp_port_number') : $setting->smtp_port_number }}" placeholder="Enter SMTP Port">
                  @if ($errors->has('smtp_port_number'))
                    <span class="help-block">
                    {{ $errors->first('smtp_port_number')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_uName')) has-error @endif">
                  <label>SMTP Username:</label>
                  <input type="text" class="form-control" name="smtp_uName" value="{{ (old('smtp_uName')) ? old('smtp_uName') : $setting->smtp_uName }}" placeholder="Enter SMTP Username">
                  @if ($errors->has('smtp_uName'))
                    <span class="help-block">
                    {{ $errors->first('smtp_uName')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_uPass')) has-error @endif">
                  <label>SMTP Password:</label>
                  <input type="password" class="form-control" name="smtp_uPass" value="{{ (old('smtp_uPass')) ? old('smtp_uPass') : $setting->smtp_uPass }}" placeholder="Enter SMTP Password">
                  @if ($errors->has('smtp_uPass'))
                    <span class="help-block">
                    {{ $errors->first('smtp_uPass')}}
                    </span>
                  @endif
                </div>
                
                @if($setting->banner_image)
                <div class="form-group">
                      <label for="designation">Banner:</label>
                      <img width="200" src="{{asset('uplodes/banner/'.$setting->banner_image)}}">
                </div>
                @endif    
                <div class="form-group @if ($errors->has('project_image'))has-error @endif">
                      <label for="project_image">Banner</label>
                      <input type="file" id="banner_image" name="banner_image" class="form-control">
                      @if ($errors->has('banner_image'))
                        <span class="help-block">
                        {{ $errors->first('banner_image')}}
                        </span>
                      @endif
                      <p class="help-block">For best resolution, please upload a image of 1928 * 642</p>
                  </div>
                    
                  <div class="form-group @if ($errors->has('project_desc1')) has-error @endif">
                  <label for="project_desc1">What Are Our Projects?:</label>
                  <textarea class="form-control" placeholder="What Are Our Projects? Row 1" id="editor" name="project_desc1">{{ (old('project_desc1')) ? old('project_desc1') : $setting->project_desc1 }}</textarea>
                  @if ($errors->has('project_desc1'))
                    <span class="help-block">
                    {{ $errors->first('project_desc1')}}
                    </span>
                  @endif
                </div>
                  
                  
                  <div class="form-group @if ($errors->has('news_desc')) has-error @endif">
                  <label for="news_desc">What’s New:</label>
                  <textarea class="form-control" placeholder="What’s New" id="news_desc" name="news_desc">{{ (old('news_desc')) ? old('news_desc') : $setting->news_desc }}</textarea>
                  @if ($errors->has('news_desc'))
                    <span class="help-block">
                    {{ $errors->first('news_desc')}}
                    </span>
                  @endif
                </div>
                  
                <div class="form-group @if ($errors->has('our_team_desc')) has-error @endif">
                  <label for="our_team_desc">Meet Our Team:</label>
                  <textarea class="form-control" placeholder="Meet Our Team" id="our_team_desc" name="our_team_desc">{{ (old('our_team_desc')) ? old('our_team_desc') : $setting->our_team_desc }}</textarea>
                  @if ($errors->has('our_team_desc'))
                    <span class="help-block">
                    {{ $errors->first('our_team_desc')}}
                    </span>
                  @endif
                </div>
                  
                  <div class="form-group @if ($errors->has('what_do_we_do')) has-error @endif">
                  <label for="what_do_we_do">What do We Do?:</label>
                  <textarea class="form-control" placeholder="Meet Our Team" id="what_do_we_do" name="what_do_we_do">{{ (old('what_do_we_do')) ? old('what_do_we_do') : $setting->what_do_we_do }}</textarea>
                  @if ($errors->has('what_do_we_do'))
                    <span class="help-block">
                    {{ $errors->first('what_do_we_do')}}
                    </span>
                  @endif
                </div>
                  
                  <div class="form-group @if ($errors->has('who_are_we')) has-error @endif">
                  <label for="who_are_we">Who are We?:</label>
                  <textarea class="form-control" placeholder="Meet Our Team" id="who_are_we" name="who_are_we">{{ (old('who_are_we')) ? old('who_are_we') : $setting->who_are_we }}</textarea>
                  @if ($errors->has('who_are_we'))
                    <span class="help-block">
                    {{ $errors->first('who_are_we')}}
                    </span>
                  @endif
                </div>
                  
                <div class="form-group">
                  <a href="{!!url('admin/dashboard')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
   <!--  </div> -->
  </section>
  </div>
@endsection
