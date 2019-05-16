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
              
              <form role="form" method="post" action="{{ url('projects/'.$dataRow->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                  <div class="box-body">
                  
                    <div class="form-group @if ($errors->has('project_name'))has-error @endif">
                      <label for="project_name">Project Name</label>
                      <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Project Name" value="{{ (old('project_name')) ? old('project_name') : $dataRow->project_name }}">
                      @if ($errors->has('project_name'))
                        <span class="help-block">
                        {{ $errors->first('project_name')}}
                        </span>
                      @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="designation">Image:</label>
                      <img width="200" src="{{asset('uplodes/projects/'.$dataRow->project_image)}}">
                    </div>
                      
                    
                     <div class="form-group @if ($errors->has('project_image'))has-error @endif">
                      <label for="project_image">Image</label>
                      <input type="file" id="project_image" name="project_image" class="form-control">
                      @if ($errors->has('project_image'))
                        <span class="help-block">
                        {{ $errors->first('project_image')}}
                        </span>
                      @endif
                      <p class="help-block">For best resolution, please upload a image of 356 * 276</p>
                  </div> 
                    
            

                    <div class="form-group">
                    <a href="{!!url('projects')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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
