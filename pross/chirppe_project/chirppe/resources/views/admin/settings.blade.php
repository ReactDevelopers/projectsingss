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

              <form role="form" method="post" action="{{ url('admin/update-setting') }}" enctype="multipart/form-data">
                <!-- text input -->
                {{ csrf_field() }}
                
                <!-- <div class="form-group @if ($errors->has('site_title'))has-error @endif">
                  <label>Site Title:</label>
                  <input type="text" class="form-control" name="site_title" value="" placeholder="Enter Site Title">
                  @if ($errors->has('site_title'))
                    <span class="help-block">
                    {{ $errors->first('site_title')}}
                    </span>
                  @endif
                </div> -->
                  
                <div class="form-group @if ($errors->has('admin_email'))has-error @endif">
                  <label>Admin Email:</label>
                  <input type="text" class="form-control" name="admin_email" value="" placeholder="Enter Admin Email">
                  @if ($errors->has('admin_email'))
                    <span class="help-block">
                    {{ $errors->first('admin_email')}}
                    </span>
                  @endif
                </div>
                  
                <!-- <div class="form-group @if ($errors->has('phone_no'))has-error @endif">
                  <label for="phone_no">Phone Number:</label>
                  <input type="text" class="form-control" name="phone_no" value="" placeholder="Enter Phone Number">
                  @if ($errors->has('phone_no'))
                    <span class="help-block">
                    {{ $errors->first('phone_no')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('fax_no'))has-error @endif">
                  <label for="fax_no">Fax Number:</label>
                  <input type="text" class="form-control" name="fax_no" value="" placeholder="Enter Fax Number">
                  @if ($errors->has('fax_no'))
                    <span class="help-block">
                    {{ $errors->first('fax_no')}}
                    </span>
                  @endif
                </div> -->
                
                <div class="form-group">
                  <label>Twitter URL:</label>
                  <input type="text" class="form-control" name="twitter_url" value="" placeholder="Enter Twitter URL">
                </div>
                <div class="form-group">
                  <label>Facebook URL:</label>
                  <input type="text" class="form-control" name="facebook_url" value="" placeholder="Enter Facebook URL">
                </div>
                 <div class="form-group">
                  <label>Google + URL:</label>
                  <input type="text" class="form-control" name="google_url" value="" placeholder="Enter Google + URL">
                </div> 
                <div class="form-group">
                  <label>Pinterest URL:</label>
                  <input type="text" class="form-control" name="pinterest_url" value="" placeholder="Enter Pinterest URL">
                </div>
                

                <div class="form-group @if ($errors->has('smtp_server_host')) has-error @endif">
                  <label>SMTP Host:</label>
                  <input type="text" class="form-control" name="smtp_server_host" value="" placeholder="Enter SMTP Host">
                  @if ($errors->has('smtp_server_host'))
                    <span class="help-block">
                    {{ $errors->first('smtp_server_host')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_port_number')) has-error @endif">
                  <label>SMTP Port:</label>
                  <input type="text" class="form-control" name="smtp_port_number" value="" placeholder="Enter SMTP Port">
                  @if ($errors->has('smtp_port_number'))
                    <span class="help-block">
                    {{ $errors->first('smtp_port_number')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_uName')) has-error @endif">
                  <label>SMTP Username:</label>
                  <input type="text" class="form-control" name="smtp_uName" value="" placeholder="Enter SMTP Username">
                  @if ($errors->has('smtp_uName'))
                    <span class="help-block">
                    {{ $errors->first('smtp_uName')}}
                    </span>
                  @endif
                </div>
                <div class="form-group @if ($errors->has('smtp_uPass')) has-error @endif">
                  <label>SMTP Password:</label>
                  <input type="password" class="form-control" name="smtp_uPass" value="" placeholder="Enter SMTP Password">
                  @if ($errors->has('smtp_uPass'))
                    <span class="help-block">
                    {{ $errors->first('smtp_uPass')}}
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
