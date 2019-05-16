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

              <form role="form" method="post" action="{{ url('whatdowedo/'.$dataRow->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                  <div class="box-body">
                  
                    <div class="form-group @if ($errors->has('name'))has-error @endif">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ (old('name')) ? old('name') : $dataRow->name }}">
                      @if ($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                      @endif
                    </div>
                      
                    <div class="form-group @if ($errors->has('what_type'))has-error @endif">
                      <label for="name">Type</label>
                      <input type="text" class="form-control" id="what_type" name="what_type" placeholder="Type" value="{{ (old('what_type')) ? old('what_type') : $dataRow->what_type }}">
                      @if ($errors->has('what_type'))
                        <span class="help-block">
                        {{ $errors->first('what_type')}}
                        </span>
                      @endif
                    </div>
                      
                    
                    @if($dataRow->image_icon)
                    <div class="form-group">
                      <label for="designation">Icon:</label>
                      <img width="70" src="{{asset('uplodes/profile/'.$dataRow->image_icon)}}">
                    </div>
                    @endif
                    <div class="form-group @if ($errors->has('image_icon'))has-error @endif">
                      <label for="image_icon">Icon</label>
                      <input type="file" id="image_icon" name="image_icon" class="form-control">
                      @if ($errors->has('image_icon'))
                        <span class="help-block">
                        {{ $errors->first('image_icon')}}
                        </span>
                      @endif
                      <p class="help-block">For best resolution, please upload a image of 32 * 32</p>
                    </div>
                      
                    
                      
                    
                      
                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="reason">Description:</label>
                      <textarea class="form-control" id="editor" placeholder = "Description" name="description">{{ old('description') ? old('description') : $dataRow->description }}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
            
                    
                      <div class="form-group">
                    <a href="{!!url('whatdowedo')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    
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

