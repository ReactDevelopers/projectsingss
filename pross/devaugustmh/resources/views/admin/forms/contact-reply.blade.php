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

              <form role="form" method="post" action="{{ url('contactus/'.$contact->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group @if ($errors->has('name'))has-error @endif">
                      <label for="user_name">Name</label>
                      <input readonly type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" value="{{ (old('user_name')) ? (old('user_name')) : $contact->user_name }}">
                      @if ($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                      @endif
                    </div>

                    <div class="form-group @if ($errors->has('user_email'))has-error @endif">
                      <label for="user_email">Email</label>
                      <input readonly type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" value="{{ (old('user_email')) ? (old('user_email')) : $contact->user_email }}">
                      @if ($errors->has('user_email'))
                        <span class="help-block">
                        {{ $errors->first('user_email')}}
                        </span>
                      @endif
                    </div>

                    <div class="form-group @if ($errors->has('subject'))has-error @endif">
                      <label for="subject">Subject</label>
                      <input readonly type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="{{ (old('subject')) ? (old('subject')) : $contact->subject }}">
                      @if ($errors->has('subject'))
                        <span class="help-block">
                        {{ $errors->first('subject')}}
                        </span>
                      @endif
                    </div>

                    

                    <div class="form-group @if ($errors->has('message'))has-error @endif">
                      <label for="reason">Message:</label>
                      <textarea readonly class="form-control" name="message">{{ (old('message')) ? old('message') : $contact->message }}</textarea>
                      @if ($errors->has('message'))
                        <span class="help-block">
                        {{ $errors->first('message')}}
                        </span>
                      @endif
                    </div>

                    <div class="form-group @if ($errors->has('reply'))has-error @endif">
                      <label for="reason">Reply:</label>
                      <textarea class="form-control" name="reply">{{ (old('reply')) ? old('reply') : $contact->reply }}</textarea>
                      @if ($errors->has('reply'))
                        <span class="help-block">
                        {{ $errors->first('reply')}}
                        </span>
                      @endif
                    </div>
                  <!-- /.box-body -->

                      <div class="form-group">
                          <a href="{!!url('contactus')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                          <button type="submit" class="btn btn-primary">Reply</button>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
   <!--  </div> -->
  </section>
  </div>
@endsection
