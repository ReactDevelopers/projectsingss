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

              <form role="form" method="post" action="{{ url('admin/feature-save/'.$template->id)}}" enctype="multipart/form-data">
                <!-- <input type="hidden" name="_method" value="PUT"> -->
                {{ csrf_field() }}
                  <div class="box-body">
                   <!--  <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">Company Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ (old('com_name')) ? old('com_name') : $template->com_name }}">
                      @if ($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title')}}</span>
                      @endif
                    </div> -->

                  <div class="form-group validate-required{{ $errors->feature1->has('feature_program_name') ? ' has-error' : '' }}" id="feature_program_name_field">
                  <label for="feature_program_name" class="control-label">
                  <span class="grey"><b>Name of Programme</b></span>
                  <span class="required">*</span>
                  </label>
                  <input type="text" class="form-control" name="feature_program_name" id="feature_program_name" placeholder="" value="{{ (old('feature_program_name')) ? old('feature_program_name') : $template['feature_program_name'] }}">
                  </div>
                
                  <div class="form-group validate-required {{ $errors->feature1->has('feature_tag_line') ? ' has-error' : '' }}" id="feature_program_tagline_field">
                    <label for="feature_tag_line" class="control-label">
                    <span class="grey"><b>Tag Line</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="text" class="form-control" name="feature_tag_line" id="feature_tag_line" placeholder="Maximum 140 characters" value="{{ (old('feature_tag_line')) ? old('feature_tag_line') : $template['feature_tag_line'] }}">  
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('feature_bios') ? ' has-error' : '' }}" id="feature_bios_field">
                    <label for="feature_bios" class="control-label">
                    <span class="grey"><b>Program Write-Up</b></span>
                    <span class="required">*</span>
                    </label>
                    <textarea rows="5" columns="30" type="text" class="form-control" name="feature_bios" id="feature_bios" placeholder="">{{ (old('feature_bios')) ? old('feature_bios') : $template['feature_bios'] }}</textarea>
                  </div>
               
                  <div class="form-group{{ $errors->feature1->has('feature_testimony') ? ' has-error' : '' }}" id="feature_testimony_field">
                    <label for="feature_testimony" class="control-label">
                    <span class="grey"><b>Programme Testimony</b></span>
                    </label>
                    <textarea rows="5" columns="30" type="text" class="form-control" name="feature_testimony" id="feature_testimony" placeholder="" >{{ (old('feature_testimony')) ? old('feature_testimony') : $template['feature_testimony'] }}</textarea>
                  </div>
                
                  <div class="form-group {{ $errors->feature1->has('feature_testimony_name') ? ' has-error' : '' }}" id="feature_testimonial_name_field">
                    <label for="feature_testimony_name" class="control-label">
                    <span class="grey"><b>Testimonial By</b></span>
                    <span class="required">*</span>
                    <i>(Required if Quote is filled)</i>
                    </label>
                    <input type="text" class="form-control" name="feature_testimony_name" id="feature_testimony_name" placeholder="" value="{{ (old('feature_testimony_name')) ? old('feature_testimony_name') : $template['feature_testimony_name'] }}">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('feature_testimony_designation') ? ' has-error' : '' }}" id="feature_testimony_designation_field">
                    <label for="feature_testimony_designation" class="control-label">
                    <span class="grey"><b>Designation</b></span>
                    <span class="required">*</span>
                    <i>(Required if Quote is filled)</i>
                    </label>
                    <input type="text" class="form-control" name="feature_testimony_designation" id="feature_testimony_designation" placeholder="" value="{{ (old('feature_testimony_designation')) ? old('feature_testimony_designation') : $template['feature_testimony_designation'] }}">
                  </div>
              
                  <div class="form-group validate-required{{ $errors->feature1->has('feature_highlight1') ? ' has-error' : '' }}" id="feature_highlight1_field">
                    <label for="feature_highlight1" class="control-label">
                    <span class="grey"><b>Highlight 1</b></span>
                    <span class="required">*</span>
                    <i> Will be featured on the Home Page</i>
                    </label>
                    <input type="text" class="form-control" name="feature_highlight1" id="feature_highlight1" placeholder="" value="{{ (old('feature_highlight1')) ? old('feature_highlight1') : $template['feature_highlight1'] }}">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('feature_highlight2') ? ' has-error' : '' }}" id="feature_highlight2_field">
                    <label for="feature_highlight2" class="control-label">
                    <span class="grey"><b>Highlight 2</b></span>
                    </label>
                    <input type="text" class="form-control" name="feature_highlight2" id="feature_highlight2" placeholder="" value="{{ (old('feature_highlight2')) ? old('feature_highlight2') : $template['feature_highlight2'] }}">
                  </div>
               
                  <div class="form-group validate-required{{ $errors->feature1->has('feature_highlight3') ? ' has-error' : '' }}" id="feature_highlight3_field">
                    <label for="feature_highlight3" class="control-label">
                    <span class="grey"><b>Highlight 3</b></span>
                    </label>
                    <input type="text" class="form-control" name="feature_highlight3" id="feature_highlight3" placeholder="" value="{{ (old('feature_highlight3')) ? old('feature_highlight3') : $template['feature_highlight3'] }}">
                  </div>
               
                  <div class="form-group validate-required">
                    <span class="grey">We want to feature your program in various formats on the AIPRO home page from time to time. The website automatically chooses your program to be featured along with programmes from other AIPRO member companies based in an algorithm that grants equal exposure to all the programs submitted by all members of AIPRO. For this we will need a few pictures of your program.</span>
                    <br>
                    <span class="required"><b>Note: </b><i>If all the picture formats are not submitted as required below, your program MAY NOT be featured automatically on the AIPRO homepage.</i></span>
                  </div>


                  <div class="form-group validate-required{{ $errors->feature1->has('page_main_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Feature Page Main Picture</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="file" class="form-control" name="page_main_picture" id="feature_profilepic_">
                    <i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 200 kb and exactly 1170 (w) x 780 (h) pixels.</i><br>
                    <div id="message">Choose a picture from</div>
                    <input class="theme_button color1 upload-image-" data-imgid="previewing_" type="button" value="Upload Pic">
                  </div>
               
                  <div>
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Main Picture Preview</b></span>
                    </label>
                    <br>
                    @if($template['page_main_picture'])
                      <img src="{!!asset('uploads/features/'.$template['page_main_picture'])!!}" width="300" height="300" id="previewing_" alt=""/>
                    @else
                      <img src="{!!asset('images/gallery/09.jpg')!!}" width="300" height="300" id="previewing_" alt=""/>
                     @endif
                     <input type="hidden" value="{!!$template['page_main_picture']!!}" name="page_main_picture_old">
                  </div>

                   <div class="form-group validate-required{{ $errors->feature1->has('page_side_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Feature Page Side Picture</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="file" class="form-control" name="page_side_picture" id="page_side_picture_" placeholder="" value="">
                    <i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 80 kb and exactly 270 (w) x 386 (h) pixels.</i><br>
                    <input class="theme_button color1 upload-side-image-" data-imgsideid="previesideimage_" type="button" value="Upload Pic">
                  </div>
               
                  <div>
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Side Picture Preview</b></span>
                    </label>
                    <br>
                    @if($template['page_side_picture'])
                    <img src="{!!asset('uploads/features/'.$template['page_side_picture'])!!}" width="300" height="300" id="previesideimage_" alt=""/>
                    @else
                      <img src="{!!asset('images/side-image.jpg')!!}" id="previesideimage_" alt=""/>
                     @endif
                     <input type="hidden" value="{!!$template['page_side_picture']!!}" name="page_side_picture_old">
                  </div>
            
                <div class="clearfix"></div>
                  <div class="form-group validate-required{{ $errors->feature1->has('home_page_main_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Home Page Main Feature Picture</b></span>
                    <span class="required">*</span>
                    </label>
                    <input type="file" class="form-control" name="home_page_main_picture" id="page_main_picture_" placeholder="" value="">
                    <i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 340 kb and exactly 1920 (w) x 1000 (h) pixels.</i><br>
                    <input class="theme_button color1 upload-main-image-" data-imgmainid="previemainimage_" type="button" value="Upload Pic">
                  </div>
              
                  <div>
                    <label for="feature_phone" class="control-label">
                    <span class="grey"><b>Main Feature Pic Preview</b></span>
                    </label>
                    <br>
                    @if($template['home_page_main_picture'])
                    <img src="{!!asset('uploads/features/'.$template['home_page_main_picture'])!!}" width="300" height="300" id="previemainimage_" alt=""/>
                    @else
                      <img src="{!!asset('images/slide02.jpg')!!}" width="300" height="300" id="previemainimage_" alt=""/>
                     @endif
                     <input type="hidden" value="{!!$template['home_page_main_picture']!!}" name="home_page_main_picture_old">
                  </div>
               
               
                <div class="clearfix"></div>
                <p class="required"><i>Have you checked for spelling, letter case and punctuation errors? Have you checked your social media links once again?</i></p>
                                                           

                  <!-- <div class="box-body"> -->
<!--                     <div class="form-group @if ($errors->has('title'))has-error @endif">
                      <label for="category_name">Title</label>
                      <textarea class="form-control" id="title" name="title" maxLength="200">{{ (old('com_name')) ? old('com_name') : $template->com_name }}</textarea>
                      @if ($errors->has('title'))
                        <span class="help-block">
                        {{ $errors->first('title')}}
                        </span>
                      @endif
 -->                    <!-- </div> -->
<!--                     <div class="form-group @if ($errors->has('description'))has-error @endif">
                      <label for="reason">Description:</label>
                      <textarea class="form-control" name="description" rows="10">{{ (old('description')) ? old('description') : $template->description }}</textarea>
                      @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description')}}
                        </span>
                      @endif
                    </div>
 -->                      
                      <div class="form-group">
                    <a href="{!!url('admin/feature-template')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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
