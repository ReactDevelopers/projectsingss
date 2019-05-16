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

              <form role="form" method="post" action="{{ url('admin/company-save/'.$template->user_id)}}">
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

                    <div class="form-group validate-required{{ $errors->feature1->has('company_name') ? ' has-error' : '' }}" id="company_name_field">
                      <label for="company_name" class="control-label">
                      <span class="grey"><b>Company Name</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="company_name" id="company_name" placeholder="" value="{{ (old('company_name')) ? old('company_name') : $template['com_name'] }}">
                    </div>

                    <div class="form-group validate-required{{ $errors->feature1->has('comany_url') ? ' has-error' : '' }}" id="comany_url_field">
                      <label for="comany_url" class="control-label">
                      <span class="grey"><b>URL</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="comany_url" id="comany_url" placeholder="" value="{{ (old('comany_url')) ? old('comany_url') : $template['com_url'] }}">
                    </div>

                    <div class="form-group validate-required{{ $errors->feature1->has('comany_roadaddress') ? ' has-error' : '' }}" id="comany_roadaddress_field">
                      <label for="comany_roadaddress" class="control-label">
                      <span class="grey"><b>Road Address</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="comany_roadaddress" id="comany_roadaddress" placeholder="" value="{{ (old('comany_roadaddress')) ? old('comany_roadaddress') : $template['road_address'] }}">
                    </div>
               
                    <div class="form-group validate-required{{ $errors->feature1->has('comany_unitaddress') ? ' has-error' : '' }}" id="comany_unitaddress_field">
                      <label for="comany_unitaddress" class="control-label">
                      <span class="grey"><b>Unit Address</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="comany_unitaddress" id="comany_unitaddress" placeholder="" value="{{ (old('comany_unitaddress')) ? old('comany_unitaddress') : $template['unit_address'] }}">
                    </div>
           
                    <div class="form-group validate-required{{ $errors->feature1->has('company_postalcode_address') ? ' has-error' : '' }}" id="company_postalcode_field">
                      <label for="comany_pos{{ $errors->feature1->has('member_first_name') ? ' has-error' : '' }}talcode_address" class="control-label">
                      <span class="grey"><b>Postal Code</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="company_postalcode_address" id="company_postalcode_address" placeholder="" value="{{ (old('company_postalcode_address')) ? old('company_postalcode_address') : $template['postal_code'] }}">
                    </div>
                    
              
                    <div class="form-group {{ $errors->feature1->has('company_email') ? ' has-error' : '' }}" id="company_email_field">
                      <label for="company_email" class="control-label">
                      <span class="grey"><b>General Email Address</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_email" id="company_email" placeholder="" value="{{ (old('company_email')) ? old('company_email') : $template['general_email'] }}">
                    </div>
                
              
                    <div class="form-group validate-required{{ $errors->feature1->has('company_phone') ? ' has-error' : '' }}" id="company_phone_field">
                      <label for="company_phone" class="control-label">
                      <span class="grey"><b>Phone Number</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="company_phone" id="company_phone" placeholder="" value="{{ (old('company_phone')) ? old('company_phone') : $template['comphone_number'] }}">
                    </div>
          
                    
                    <div class="form-group {{ $errors->feature1->has('company_fax') ? ' has-error' : '' }}" id="company_fax_field">
                      <label for="company_phone" class="control-label">
                      <span class="grey"><b>Fax Number</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_fax" id="company_fax" placeholder="" value="{{ (old('company_fax')) ? old('company_fax') : $template['fax_number'] }}">
                    </div>
                  
                    <div class="form-group {{ $errors->feature1->has('company_facebook') ? ' has-error' : '' }}" id="company_facebook_field">
                      <label for="company_facebook" class="control-label">
                      <i class="fa fa-facebook-official social-color-facebook"></i>
                      <span class="grey"><b>Company Facebook Page</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_facebook" id="company_facebook" placeholder="" value="{{ (old('company_facebook')) ? old('company_facebook') : $template['com_facebook_url'] }}">
                    </div>
                
            
                    <div class="form-group {{ $errors->feature1->has('company_twitter') ? ' has-error' : '' }}" id="company_twitter_field">
                      <label for="company_twitter" class="control-label">
                       <i class="fa fa-twitter social-color-twitter"></i>
                      <span class="grey"><b>Company Twitter Handle</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_twitter" id="company_twitter" placeholder="" value="{{ (old('company_twitter')) ? old('company_twitter') : $template['com_twitter_url'] }}">
                    </div>
                 
                    <div class="form-group {{ $errors->feature1->has('company_linkedin') ? ' has-error' : '' }}" id="company_linkedin_field">
                      <label for="company_linkedin" class="control-label">
                      <i class="fa fa-linkedin-square social-color-linkedin"></i>
                      <span class="grey"><b>Company LinkedIn Page</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_linkedin" id="company_linkedin" placeholder="" value="{{ (old('company_linkedin')) ? old('company_linkedin') : $template['com_linkedIn_url'] }}">
                    </div>
                    
                    <div class="form-group {{ $errors->feature1->has('company_headline') ? ' has-error' : '' }}" id="company_headline_field">
                      <label for="company_headline" class="control-label">
                      <span class="grey"><b>Company Headline</b></span>
                      </label>
                      <input type="text" class="form-control" name="company_headline" id="company_headline" placeholder="Add a headline for your company here. Limit to 140 characters as you would on Twitter." value="{{ (old('company_headline')) ? old('company_headline') : $template['com_headline'] }}">
                    </div>


                      <div class="form-group validate-required{{ $errors->feature1->has('activity') ? ' has-error' : '' }}" id="company_activities_field">
                      <label for="company_activities" class="control-label">
                      <span class="grey"><b>Content Categories</b></span>
                      <span class="required">*</span>
                      <i>(choose up to 5 activities)</i>
                      </label>
                      <br>
                      <?php 
                      $category = $template['categories'];
                      $categoriesArray = [];
                      if($category){
                        $categoriesArray = explode(",", $category);
                        $categoriesArray = array_filter($categoriesArray);
                      }
                      ?>
                      @foreach($categories as $catKey => $catVal)
                        <span class="checkbox">
                          <input type="checkbox"  id="{{$catKey}}"
                          <?php
                          if(old('activity')) {
                            echo (in_array($catKey, old('activity') ) ? 'checked="checked"' : '');
                          } else {
                            echo (in_array($catKey, $categoriesArray) ? 'checked="checked"' : '');
                          }
                          ?>
                          class="checkbox-inline" name="activity[]" value="{{$catKey}}"><label for="{{$catKey}}">{{$catVal}}</label>
                        </span>
                      @endforeach
                    </div>

                    <div class="form-group {{ $errors->feature1->has('service') ? ' has-error' : '' }}" id="company_services_field">
                      <label for="company_services" class="control-label">
                        <span class="grey"><b>Services</b></span>
                        <span class="required">*</span>
                        <i>(choose up to 5 services)</i>
                      </label>
                      <br>
                      <?php 
                      $servis = $template['services'];
                      $servisArray = [];
                      if($servis){
                        $servisArray = explode(",", $servis);
                        $servisArray = array_filter($servisArray);
                      }
                      ?>
                      @foreach($services as $serKey => $serVal)
                        <span class="checkbox">
                      <input type="checkbox" id="{{$serKey}}"
                      <?php
                      if(old('service')) {
                        echo (in_array($serKey, old('service')) ? 'checked="checked"' : '');
                      } else {
                        echo (in_array($serKey, $servisArray) ? 'checked="checked"' : '');
                      }
                      ?>
                      class="checkbox-inline" name="service[]" value="{{$serKey}}"><label for="{{$serKey}}">{{$serVal}}</label>
                        </span>
                      @endforeach
                    </div>
  
                    <div class="form-group {{ $errors->feature1->has('company_testimony') ? ' has-error' : '' }}" id="company_testimony_field">
                      <label for="company_testimony" class="control-label"> <span class="grey"><strong>Company Testimony</strong></span> </label>
                      <textarea rows="5" columns="30" type="text" class="form-control" name="company_testimony" id="company_testimony" placeholder="">{{ (old('company_testimony')) ? old('company_testimony') : $template['com_testimony'] }}</textarea>
                    </div>
                 

                    <div class="form-group validate-required{{ $errors->feature1->has('company_bios') ? ' has-error' : '' }}" id="company_bios_field">
                      <label for="company_bios" class="control-label">
                      <span class="grey"><b>Company Write-Up</b></span>
                      <span class="required">*</span>
                      </label>
                      <textarea rows="5" columns="30" type="text" class="form-control" name="company_bios" id="company_bios" placeholder="">{{ (old('company_bios')) ? old('company_bios') : $template['com_write_up'] }}</textarea>
                    </div>
                
                    <div class="form-group validate-required{{ $errors->feature1->has('testimony_name') ? ' has-error' : '' }}" id="testimonial_name_field">
                      <label for="testimony_name" class="control-label">
                      <span class="grey"><b>Testimonial Giver Name</b></span>
                      <span class="required">*</span>
                                          <i>(include the Full Name of your testimonial provider)</i>
                      </label>
                      <input type="text" class="form-control" name="testimony_name" id="testimony_name" placeholder="" value="{{ (old('testimony_name')) ? old('testimony_name') : $template['testimonial_name'] }}">
                    </div>
               
                    <div class="form-group validate-required{{ $errors->feature1->has('testimony_designation') ? ' has-error' : '' }}" id="testimony_designation_field">
                      <label for="testimony_designation" class="control-label">
                      <span class="grey"><b>Testimonial Giver Designation</b></span>
                      <span class="required">*</span>
                      </label>
                      <input type="text" class="form-control" name="testimony_designation" id="testimony_designation" placeholder="" value="{{ (old('testimony_designation')) ? old('testimony_designation') : $template['testimonial_designation'] }}">
                    </div>
                 
              
                   

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
                    <a href="{!!url('admin/comprofile-template')!!}" class="btn btn-warning" title="Back">Back</a>&nbsp;&nbsp;&nbsp;
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
