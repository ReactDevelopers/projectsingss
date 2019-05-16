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

              <form role="form" method="post" action="{{ url('team')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="box-body">
                    
                    <div class="form-group @if ($errors->has('name'))has-error @endif">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" maxLength = "200" placeholder="Name" value="{{ (old('name')) }}">
                      @if ($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name')}}
                        </span>
                      @endif
                    </div>
                      <div class="form-group @if ($errors->has('email'))has-error @endif">
                      <label for="name">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ (old('email')) }}">
                      @if ($errors->has('email'))
                        <span class="help-block">
                        {{ $errors->first('email')}}
                        </span>
                      @endif
                    </div>
                      <div class="form-group @if ($errors->has('profile_image'))has-error @endif">
                      <label for="profile_image">Image</label>
                      <input type="file" id="profile_image" name="profile_image" class="form-control">
                      @if ($errors->has('profile_image'))
                        <span class="help-block">
                        {{ $errors->first('profile_image')}}
                        </span>
                      @endif
                      <p class="help-block">For best resolution, please upload a image of 182 * 181</p>
                    </div>
                    
                      <div class="form-group @if ($errors->has('designation'))has-error @endif">
                      <label for="designation">Designation</label>
                      <input type="text" class="form-control" id="designation" maxLength = "250" name="designation" placeholder="Designation" value="{{ (old('designation')) }}">
                      @if ($errors->has('designation'))
                        <span class="help-block">
                        {{ $errors->first('designation')}}
                        </span>
                      @endif
                    </div>

                    <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="reason">Description:</label>
                      <textarea class="form-control" placeholder="Description" id="editor" name="description">{{ (old('description')) }}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
                      
                      
                    <div class="form-group @if ($errors->has('facebook_url'))has-error @endif">
                      <label for="name">Facebook URL</label>
                      <input type="text" class="form-control" id="facebook_url" name="facebook_url" placeholder="Facebook URL" value="{{ (old('facebook_url')) }}">
                      @if ($errors->has('facebook_url'))
                        <span class="help-block">
                        {{ $errors->first('facebook_url')}}
                        </span>
                      @endif
                      <p class="help-block">Eg. http://example.com</p>
                    </div>
                      <div class="form-group @if ($errors->has('skype_url'))has-error @endif">
                      <label for="name">Skype</label>
                      <input type="text" class="form-control" id="skype_url" name="skype_url" placeholder="Skype" value="{{ (old('skype_url')) }}">
                      @if ($errors->has('skype_url'))
                        <span class="help-block">
                        {{ $errors->first('skype_url')}}
                        </span>
                      @endif
                    </div>
                      <div class="form-group @if ($errors->has('twitter_url'))has-error @endif">
                      <label for="name">Twitter URL</label>
                      <input type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="Twitter URL" value="{{ (old('twitter_url')) }}">
                      @if ($errors->has('twitter_url'))
                        <span class="help-block">
                        {{ $errors->first('twitter_url')}}
                        </span>
                      @endif
                      <p class="help-block">Eg. http://example.com</p>
                    </div>
                    <div class="form-group @if ($errors->has('linkedin_url'))has-error @endif">
                      <label for="name">Linkedin URL</label>
                      <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" placeholder="Linkedin URL" value="{{ (old('linkedin_url')) }}">
                      @if ($errors->has('linkedin_url'))
                        <span class="help-block">
                        {{ $errors->first('linkedin_url')}}
                        </span>
                      @endif
                      <p class="help-block">Eg. http://example.com</p>
                    </div>
                    
                    <div class="form-group @if ($errors->has('google_plus_url'))has-error @endif">
                      <label for="name">Google Plus URL</label>
                      <input type="text" class="form-control" id="google_plus_url" name="google_plus_url" placeholder="Google Plus URL" value="{{ (old('google_plus_url')) }}">
                      @if ($errors->has('google_plus_url'))
                        <span class="help-block">
                        {{ $errors->first('google_plus_url')}}
                        </span>
                      @endif
                      <p class="help-block">Eg. http://example.com</p>
                    </div>
                      
                       <div class="form-group">
                    <a href="{!!url('team')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
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

