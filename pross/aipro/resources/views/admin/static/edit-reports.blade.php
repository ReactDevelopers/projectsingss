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
                      
                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="category_name">Page Description</label>
                      <textarea class="form-control" id="description" name="description">{{ (old('description')) ? old('description') : $static->description }}</textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
                    
                  
                    <div class="form-group">
                      <label for="sub_title_1">Heading 1</label>
                      <input type="text" class="form-control" id="sub_title_1" name="sub_title_1" placeholder="Heading 1" value="{{ (old('sub_title_1')) ? old('sub_title_1') : $static->sub_title_1 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_1">Description 1:</label>
                      <textarea class="form-control" id="description_1" name="description_1">{{ (old('description_1')) ? old('description_1') : $static->description_1 }}</textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="sub_title_2">Heading 2</label>
                      <input type="text" class="form-control" id="sub_title_2" name="sub_title_2" placeholder="Heading 2" value="{{ (old('sub_title_2')) ? old('sub_title_2') : $static->sub_title_2 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_2">Description 2:</label>
                      <textarea class="form-control" id="description_2" name="description_2">{{ (old('description_2')) ? old('description_2') : $static->description_2 }}</textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="sub_title_3">Heading 3</label>
                      <input type="text" class="form-control" id="sub_title_3" name="sub_title_3" placeholder="Heading 3" value="{{ (old('sub_title_3')) ? old('sub_title_3') : $static->sub_title_3 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_3">Description 3:</label>
                      <textarea class="form-control" id="description_3" name="description_3">{{ (old('description_3')) ? old('description_3') : $static->description_3 }}</textarea>
                    </div>
                      
                    <div class="form-group">
                      <label for="sub_title_4">Heading 4</label>
                      <input type="text" class="form-control" id="sub_title_4" name="sub_title_4" placeholder="Heading 4" value="{{ (old('sub_title_4')) ? old('sub_title_4') : $static->sub_title_4 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_4">Description 4:</label>
                      <textarea class="form-control" id="description_4" name="description_4">{{ (old('description_4')) ? old('description_4') : $static->description_4 }}</textarea>
                    </div>
                      
                    <div class="form-group">
                      <label for="sub_title_5">Heading 5</label>
                      <input type="text" class="form-control" id="sub_title_5" name="sub_title_5" placeholder="Heading 5" value="{{ (old('sub_title_5')) ? old('sub_title_5') : $static->sub_title_5 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_5">Description 5:</label>
                      <textarea class="form-control" id="description_5" name="description_5">{{ (old('description_5')) ? old('description_5') : $static->description_5 }}</textarea>
                    </div>
                      
                    <div class="form-group">
                      <label for="sub_title_6">Heading 6</label>
                      <input type="text" class="form-control" id="sub_title_6" name="sub_title_6" placeholder="Heading 6" value="{{ (old('sub_title_6')) ? old('sub_title_6') : $static->sub_title_6 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_6">Description 6:</label>
                      <textarea class="form-control" id="description_6" name="description_6">{{ (old('description_6')) ? old('description_6') : $static->description_6 }}</textarea>
                    </div>
                      
                    <div class="form-group">
                      <label for="sub_title_7">Heading 7</label>
                      <input type="text" class="form-control" id="sub_title_7" name="sub_title_7" placeholder="Heading 7" value="{{ (old('sub_title_7')) ? old('sub_title_7') : $static->sub_title_7 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_7">Description 7:</label>
                      <textarea class="form-control" id="description_7" name="description_7">{{ (old('description_7')) ? old('description_7') : $static->description_7 }}</textarea>
                    </div>
                    
                    <div class="form-group">
                      <label for="sub_title_8">Heading 8</label>
                      <input type="text" class="form-control" id="sub_title_8" name="sub_title_8" placeholder="Heading 8" value="{{ (old('sub_title_8')) ? old('sub_title_8') : $static->sub_title_8 }}">
                    </div>
                    <div class="form-group">
                      <label for="description_8">Description 8:</label>
                      <textarea class="form-control" id="description_8" name="description_8">{{ (old('description_8')) ? old('description_8') : $static->description_8 }}</textarea>
                    </div>
                      
                      
                      
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <a href="{!!url('admin/static')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="alias" value ="{{$static->alias}}">
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
    CKEDITOR.replace('description_1');
    CKEDITOR.replace('description_2');
    CKEDITOR.replace('description_3');
    CKEDITOR.replace('description_4');
    CKEDITOR.replace('description_5');
    CKEDITOR.replace('description_6');
    CKEDITOR.replace('description_7');
    CKEDITOR.replace('description_8');
    CKEDITOR.config.toolbar =[['Undo','Redo'],'/',[],];
    
  });
</script>
@endpush

