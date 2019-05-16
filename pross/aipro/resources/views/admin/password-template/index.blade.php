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

              <form role="form" method="post" action="{{ url('admin/changeadminpass')}}">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                {{ csrf_field() }}
                  <div class="box-body">
                    <!-- <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">Title</label>
                      <textarea class="form-control" id="title" name="title" maxLength="200"></textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('title')}}
                        </span>
                      @endif
                    </div> -->
                  
                    <div class="form-group validate-required{{ $errors->feature1->has('old_password') ? ' has-error' : '' }}" id="feature_program_name_field">
                      <label for="old_password" class="control-label">
                      <span class="grey"><b>Old Password</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="" value="">
                    </div>

                    <div class="form-group validate-required{{ $errors->feature1->has('new_password') ? ' has-error' : '' }}" id="feature_program_name_field">
                      <label for="new_password" class="control-label">
                      <span class="grey"><b>New Password</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="" value="">
                    </div>

                    <div class="form-group validate-required{{ $errors->feature1->has('new_password_confirmation') ? ' has-error' : '' }}" id="feature_program_name_field">
                      <label for="new_password_confirmation" class="control-label">
                      <span class="grey"><b>Confirm Password</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="" value="">
                    </div>

                      
                    <div class="form-group">
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
