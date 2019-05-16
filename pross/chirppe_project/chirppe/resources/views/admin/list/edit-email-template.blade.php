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

              <form role="form" method="post" action="{{ url('email-template/'.$template->email_template_id)}}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">Title</label>
                      <textarea class="form-control" id="title" name="title" maxLength="200">{{ (old('title')) ? old('title') : $template->subject }}</textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('title')}}
                        </span>
                      @endif
                    </div>
                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="reason">Description:</label>
                      <textarea class="form-control" name="description" rows="10">{{ (old('description')) ? old('description') : $template->description }}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
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
