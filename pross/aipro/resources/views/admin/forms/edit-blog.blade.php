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

              <form role="form" method="post" action="{{ url('news/'.$blog->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ (old('title')) ? old('title') : $blog->title }}">
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('title')}}
                        </span>
                      @endif
                    </div>

                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="reason">Description:</label>
                      <textarea class="form-control" id="editor" placeholder ="Description" name="description">{{ old('description') ? old('description') : $blog->description }}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>


                    <div class="form-group @if($errors->has('news_url')) has-error @endif" id="news_url">
                      <label for="category_name">News Link</label>
                      <input class="form-control" name="news_url" placeholder = "News Link" maxLength="200" value="{{ old('news_url') ? old('news_url') : $blog->news_url }}">
                      <?php if($errors->has('news_url')): ?>
                        <span class="help-block">
                        {{ $errors->first('news_url')}}
                        </span>
                      <?php endif; ?>
                      <p class="help-block">Eg. http://example.com</p>
                    </div>
                    

                    <input type="hidden" value="{{ $blog->blog_type }}" name="pre_blog_type">
                    <input type="hidden" value="{{ $blog->media }}" name="pre_blog_media">
                  <div class="form-group">
                    <a href="{!!url('contactus')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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

@section('customjs')

@endsection
