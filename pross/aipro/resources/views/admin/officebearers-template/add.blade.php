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

              <form role="form" method="post" action="{{ url('admin/officeempadd-save/')}}" enctype="multipart/form-data">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                {{ csrf_field() }}
                  <div class="box-body">

                  <div class="form-group validate-required{{ $errors->feature1->has('name') ? ' has-error' : '' }}" id="feature_program_name_field">
                  <label for="name" class="control-label">
                  <span class="grey"><b>Name</b></span>
                  <span class="required">*</span>
                  </label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="" value="">
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('email') ? ' has-error' : '' }}" id="feature_program_name_field">
                  <label for="email" class="control-label">
                  <span class="grey"><b>Email</b></span>
                  <span class="required">*</span>
                  </label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="" value="">
                  </div>
                
                  <div class="form-group validate-required {{ $errors->feature1->has('designation') ? ' has-error' : '' }}" id="feature_program_tagline_field">
                    <label for="designation" class="control-label">
                    <span class="grey"><b>Designation</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" name="designation" id="designation" placeholder="" value="">  
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
                    <label for="picture" class="control-label">
                    <span class="grey"><b>Profile Image</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="file" class="form-control" name="picture" id="picture">
                    <i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 200 kb and exactly 700 (w) x 700 (h) pixels.</i><br>
                    <!-- <div id="message">Choose a picture from</div> -->
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('short_desc') ? ' has-error' : '' }}" id="feature_bios_field">
                    <label for="short_desc" class="control-label">
                    <span class="grey"><b>Short Description</b></span>
                    </label>
                    <textarea rows="3" columns="30" type="text" class="form-control" name="short_desc" id="short_desc" placeholder=""></textarea>
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('facebook') ? ' has-error' : '' }}" id="feature_highlight1_field">
                    <label for="facebook" class="control-label">
                    <span class="grey"><b>Facebook</b></span>
                    </label>
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="" value="">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('twitter') ? ' has-error' : '' }}" id="feature_highlight2_field">
                    <label for="twitter" class="control-label">
                    <span class="grey"><b>twitter</b></span>
                    </label>
                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="" value="">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('linkedin') ? ' has-error' : '' }}" id="feature_highlight3_field">
                    <label for="linkedin" class="control-label">
                    <span class="grey"><b>LinkedIn</b></span>
                    </label>
                    <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="" value="">
                  </div>
               
                  <div class="form-group{{ $errors->feature1->has('content_desc') ? ' has-error' : '' }}" id="feature_testimony_field">
                    <label for="content_desc" class="control-label">
                    <span class="grey"><b>Content</b></span>
                    </label>
                    <textarea rows="5" columns="30" type="text" class="form-control" name="content_desc" id="content_desc" placeholder="" ></textarea>
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('highlight1') ? ' has-error' : '' }}" id="feature_highlight1_field">
                    <label for="highlight1" class="control-label">
                    <span class="grey"><b>Highlight 1</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" name="highlight1" id="highlight1" placeholder="" value="">
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('highlight2') ? ' has-error' : '' }}" id="feature_highlight2_field">
                    <label for="highlight2" class="control-label">
                    <span class="grey"><b>Highlight 2</b></span>
                    </label>
                    <input type="text" class="form-control" name="highlight2" id="highlight2" placeholder="" value="">
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('highlight3') ? ' has-error' : '' }}" id="feature_highlight1_field">
                    <label for="highlight3" class="control-label">
                    <span class="grey"><b>Highlight 3</b></span>
                    </label>
                    <input type="text" class="form-control" name="highlight3" id="highlight3" placeholder="" value="">
                  </div>

                  <div class="form-group{{ $errors->feature1->has('description') ? ' has-error' : '' }}" id="feature_testimony_field">
                    <label for="description" class="control-label">
                    <span class="grey"><b>Description</b></span>
                    </label>
                    <textarea rows="5" columns="30" type="text" class="form-control" name="description" id="description" placeholder="" ></textarea>
                  </div>

                  <div class="form-group{{ $errors->feature1->has('bios') ? ' has-error' : '' }}" id="feature_testimony_field">
                    <label for="bios" class="control-label">
                    <span class="grey"><b>Bios</b></span>
                    <span class="required">*</span>
                    </label>
                    <textarea rows="5" columns="30" type="text" class="form-control" name="bios" id="bios" placeholder="" ></textarea>
                  </div>

                  <div class="form-group {{ $errors->feature1->has('testimonial_quote') ? ' has-error' : '' }}" id="feature_testimonial_name_field">
                    <label for="testimonial_quote" class="control-label">
                    <span class="grey"><b>Testimonial quote</b></span>
                    </label>
                    <input type="text" class="form-control" name="testimonial_quote" id="testimonial_quote" placeholder="" value="">
                  </div>
                
                  <div class="form-group {{ $errors->feature1->has('testimonial_name') ? ' has-error' : '' }}" id="feature_testimonial_name_field">
                    <label for="testimonial_name" class="control-label">
                    <span class="grey"><b>Testimonial By</b></span>
                    <span class="required">*</span>
                    <i>(Required if Quote is filled)</i>
                    </label>
                    <input type="text" class="form-control" name="testimonial_name" id="testimonial_name" placeholder="" value="">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('testimonial_designation') ? ' has-error' : '' }}" id="feature_testimony_designation_field">
                    <label for="testimonial_designation" class="control-label">
                    <span class="grey"><b>Testimonial Designation</b></span>
                    <span class="required">*</span>
                    <i>(Required if Quote is filled)</i>
                    </label>
                    <input type="text" class="form-control" name="testimonial_designation" id="testimonial_designation" placeholder="" value="">
                  </div>

                  <div class="form-group validate-required{{ $errors->feature1->has('status') ? ' has-error' : '' }}" id="feature_testimony_designation_field">
                   <label for="status" class="control-label">
                    <span class="grey"><b>Status</b></span>
                    </label>
                    <select class="form-control" name="status">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>
 
                <div class="clearfix"></div>
                <p class="required"><i>Have you checked for spelling, letter case and punctuation errors? Have you checked your social media links once again?</i></p>
                                                           

                
                      <div class="form-group">
                    <a href="{!!url('admin/officeemp')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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


@push('customjs')
<script type="text/javascript">
  $(function() {
      
    CKEDITOR.replace('bios');
    CKEDITOR.config.toolbar =[['Undo','Redo'],'/',[],];

  });
</script>
@endpush