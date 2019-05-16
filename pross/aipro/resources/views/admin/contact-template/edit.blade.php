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

              <form role="form" method="post" action="{{ url('admin/sendbasicemail/'.$static->id)}}" enctype="multipart/form-data">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                {{ csrf_field() }}
                 
                  <div class="box-body">
                    <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="title">Name</label>
                      <input readonly type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ (old('user_name')) ? old('user_name') : $static->user_name }}">
                      @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title')}}</span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('sub_title_1'))has-error @endif">
                      <label for="sub_title_1">Email</label>
                      <input readonly type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ (old('user_email')) ? old('user_email') : $static->user_email }}">
                      @if ($errors->has('sub_title_1'))
                        <span class="help-block">{{ $errors->first('sub_title_1')}}</span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('sub_title_2'))has-error @endif">
                      <label readonly for="sub_title_2">Subject</label>
                      <input readonly type="text" class="form-control" id="subject" maxLength="200" name="subject" placeholder="Subject" value="{{ (old('subject')) ? old('subject') : $static->subject }}">
                      @if ($errors->has('sub_title_2'))
                        <span class="help-block">{{ $errors->first('sub_title_2')}}</span>
                      @endif
                    </div>
                  
                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="category_name">Message:</label>
                      <textarea readonly class="form-control" id="message" name="message">{{ (old('message')) ? old('message') : $static->message }}</textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('reply'))has-error @endif">
                      <label for="reason">Reply:</label>
                      <textarea class="form-control" id="reply" name="reply">{{ (old('description_2')) ? old('description_2') : $static->description_2 }}</textarea>
                      @if ($errors->has('description_2'))
                        <span class="help-block">
                        {{ $errors->first('reply')}}
                        </span>
                      @endif
                    </div>
                      
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{!!url('admin/contact-template')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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


@push('customjs')
<script type="text/javascript">
  $(function() {
      
    CKEDITOR.replace('description');
    CKEDITOR.replace('description_2');
    CKEDITOR.replace('description_3');
    CKEDITOR.config.toolbar =[['Undo','Redo'],'/',[],];
    
  });
</script>
@endpush

