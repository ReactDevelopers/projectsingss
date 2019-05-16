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

              <form role="form" method="post" action="{{ url('admin/static/'.$static->alias)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                 
                  <div class="box-body">
                  
                    <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="title">Page Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Page Title" value="{{ (old('title')) ? old('title') : $static->title }}">
                      @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title')}}</span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('sub_title_1'))has-error @endif">
                      <label for="sub_title_1">Sub Title 1</label>
                      <input type="text" class="form-control" id="sub_title_1" name="sub_title_1" placeholder="Sub Title 1" value="{{ (old('sub_title_1')) ? old('sub_title_1') : $static->sub_title_1 }}">
                      @if ($errors->has('sub_title_1'))
                        <span class="help-block">{{ $errors->first('sub_title_1')}}</span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('sub_title_2'))has-error @endif">
                      <label for="sub_title_2">Sub Title 2</label>
                      <input type="text" class="form-control" id="sub_title_2" maxLength="200" name="sub_title_2" placeholder="Sub Title 2" value="{{ (old('sub_title_2')) ? old('sub_title_2') : $static->sub_title_2 }}">
                      @if ($errors->has('sub_title_2'))
                        <span class="help-block">{{ $errors->first('sub_title_2')}}</span>
                      @endif
                    </div>
                  
                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="category_name">Description 1</label>
                      <textarea class="form-control" id="description" name="description">{{ (old('description')) ? old('description') : $static->description }}</textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
                    
                    @if($static->page_image)
                    <div class="form-group">
                      <label for="designation">Image:</label>
                      <img width="200" src="{{asset('uploads/images/'.$static->page_image)}}">
                      <br/>
                      
                    </div>
                    @endif
                     <div class="form-group @if ($errors->has('page_image'))has-error @endif">
                      <label for="page_image">Image</label>
                      <input type="file" id="page_image" name="page_image" class="form-control">
                      @if ($errors->has('page_image'))
                        <span class="help-block">
                        {{ $errors->first('page_image')}}
                        </span>
                      @endif
                      <p class="help-block">For best resolution, please upload a image of 555 * 454</p>
                        <input type="hidden" class="form-control" id="old_image" name="old_image"  value="{{ $static->page_image }}">
                      </div>
                        
                    <div class="form-group @if ($errors->has('sub_title_3'))has-error @endif">
                      <label for="sub_title_3">Sub Title 3</label>
                      <input type="text" class="form-control" id="sub_title_3" name="sub_title_3" placeholder="Sub Title 3" value="{{ (old('sub_title_3')) ? old('sub_title_3') : $static->sub_title_3 }}">
                      @if ($errors->has('sub_title_3'))
                        <span class="help-block">{{ $errors->first('sub_title_3')}}</span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('description_2'))has-error @endif">
                      <label for="reason">Description 2:</label>
                      <textarea class="form-control" id="description_2" name="description_2">{{ (old('description_2')) ? old('description_2') : $static->description_2 }}</textarea>
                      @if ($errors->has('description_2'))
                        <span class="help-block">
                        {{ $errors->first('description_2')}}
                        </span>
                      @endif
                    </div>
                      
                      <div class="form-group @if ($errors->has('add_more_points'))has-error @endif">
                      <label for="reason">Points:</label>
                      <textarea class="form-control" id="add_more_points" rows = "5" name="add_more_points">{{ (old('add_more_points')) ? old('add_more_points') : $static->add_more_points }}</textarea>
                      @if ($errors->has('add_more_points'))
                        <span class="help-block">
                        {{ $errors->first('add_more_points')}}
                        </span>
                      @endif
                    </div>
                      
                      <div class="form-group @if ($errors->has('description_3'))has-error @endif">
                      <label for="reason">Description 3:</label>
                      <textarea class="form-control" id="description_3" name="description_3">{{ (old('description_3')) ? old('description_3') : $static->description_3 }}</textarea>
                      @if ($errors->has('description_3'))
                        <span class="help-block">
                        {{ $errors->first('description_3')}}
                        </span>
                      @endif
                    </div>
                      
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{!!url('admin/static')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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

