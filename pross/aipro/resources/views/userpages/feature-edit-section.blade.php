@php
	$errors = $errors->$form_name;
@endphp

<div class="col-sm-12">
	<div class="form-group validate-required{{ $errors->has('feature_program_name') ? ' has-error' : '' }}" id="feature_program_name_field">
		<label for="feature_program_name" class="control-label">
		<span class="grey"><b>Name of Programme</b></span>
		<span class="required">*</span>
		</label>
		<input type="text" class="form-control" name="feature_program_name" id="feature_program_name" placeholder="" value="{{ ($request) ? $request->old('feature_program_name', $form_name) : $list['feature_program_name'] }}">
		<!--@if ($errors->has('feature_program_name'))
		<span class="help-block">
			<strong>{{ $errors->first('feature_program_name') }}</strong>
		</span>
		@endif-->
	</div>
</div>
<div class="col-sm-12">
	<div class="form-group validate-required {{ $errors->has('feature_tag_line') ? ' has-error' : '' }}" id="feature_program_tagline_field">
		<label for="feature_tag_line" class="control-label">
		<span class="grey"><b>Tag Line</b></span>
		<span class="required">*</span>
		</label>
		<input type="text" class="form-control" name="feature_tag_line" id="feature_tag_line" placeholder="Maximum 140 characters" value="{{ ($request) ? $request->old('feature_tag_line', $form_name) : $list['feature_tag_line'] }}">
		
	</div>
</div>
<div class="col-sm-9">
	<div class="form-group validate-required{{ $errors->has('feature_bios') ? ' has-error' : '' }}" id="feature_bios_field">
		<label for="feature_bios" class="control-label">
		<span class="grey"><b>Program Write-Up</b></span>
		<span class="required">*</span>
		</label>
		<textarea rows="5" columns="30" type="text" class="form-control" name="feature_bios" id="feature_bios" placeholder="Add a write-up about your company here. Put your best words forward for your company in not more than 3000 characters. Use paragraphs just like you always would.">{{ ($request) ? $request->old('feature_bios', $form_name) : $list['feature_bios'] }}</textarea>
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group{{ $errors->has('feature_testimony') ? ' has-error' : '' }}" id="feature_testimony_field">
	  <label for="feature_testimony" class="control-label">
	  <span class="grey"><b>Programme Testimony</b></span>
	  </label>
	  <textarea rows="5" columns="30" type="text" class="form-control" name="feature_testimony" id="feature_testimony" placeholder="Add a testimonial from one of your clients or partners. Ask them to limit it to 140 characters just like on Twitter." >{{ ($request ) ? $request->old('feature_testimony', $form_name) : $list['feature_testimony'] }}</textarea>
  </div>
</div>

<div class="col-sm-6">
	<div class="form-group{{ $errors->has('feature_testimony_name') ? ' has-error' : '' }}" id="feature_testimonial_name_field">
		<label for="feature_testimony_name" class="control-label">
		<span class="grey"><b>Testimonial By</b></span>
		<span class="required">*</span>
		<i>(Required if Quote is filled)</i>
		</label>
		<input type="text" class="form-control" name="feature_testimony_name" id="feature_testimony_name" placeholder="" value="{{ ($request ) ? $request->old('feature_testimony_name', $form_name) : $list['feature_testimony_name'] }}">
	</div>
</div>
<div class="col-sm-6">
	<div class="form-group{{ $errors->has('feature_testimony_designation') ? ' has-error' : '' }}" id="feature_testimony_designation_field">
		<label for="feature_testimony_designation" class="control-label">
		<span class="grey"><b>Designation</b></span>
		<span class="required">*</span>
		<i>(Required if Quote is filled)</i>
		</label>
		<input type="text" class="form-control" name="feature_testimony_designation" id="feature_testimony_designation" placeholder="" value="{{ ($request) ? $request->old('feature_testimony_designation', $form_name) : $list['feature_testimony_designation'] }}">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group validate-required{{ $errors->has('feature_highlight1') ? ' has-error' : '' }}" id="feature_highlight1_field">
		<label for="feature_highlight1" class="control-label">
		<span class="grey"><b>Highlight 1</b></span>
		<span class="required">*</span>
		<i> Will be featured on the Home Page</i>
		</label>
		<input type="text" class="form-control" name="feature_highlight1" id="feature_highlight1" placeholder="" value="{{ ($request) ? $request->old('feature_highlight1', $form_name) : $list['feature_highlight1'] }}">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group validate-required {{ $errors->has('feature_highlight2') ? ' has-error' : '' }}" id="feature_highlight2_field">
		<label for="feature_highlight2" class="control-label">
		<span class="grey"><b>Highlight 2</b></span>
		</label>
		<input type="text" class="form-control" name="feature_highlight2" id="feature_highlight2" placeholder="" value="{{ ($request) ? $request->old('feature_highlight2', $form_name) : $list['feature_highlight2'] }}">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group validate-required {{ $errors->has('feature_highlight3') ? ' has-error' : '' }}" id="feature_highlight3_field">
		<label for="feature_highlight3" class="control-label">
		<span class="grey"><b>Highlight 3</b></span>
		</label>
		<input type="text" class="form-control" name="feature_highlight3" id="feature_highlight3" placeholder="" value="{{ ($request) ? $request->old('feature_highlight3', $form_name) : $list['feature_highlight3'] }}">
	</div>
</div>
<div class="col-sm-12">
	<div class="form-group validate-required">
		<span class="grey">We want to feature your program in various formats on the AIPRO home page from time to time. The website automatically chooses your program to be featured along with programmes from other AIPRO member companies based in an algorithm that grants equal exposure to all the programs submitted by all members of AIPRO. For this we will need a few pictures of your program.</span>
		<br>
		<span class="required"><b>Note: </b><i>If all the picture formats are not submitted as required below, your program MAY NOT be featured automatically on the AIPRO homepage.</i></span>
	</div>
</div>
<div class="col-sm-3">
	<div class="form-group validate-required{{ $errors->has('page_main_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Feature Page Main Picture</b></span>
		<span class="required">*</span>
		</label>
		<input type="file" class="form-control" name="page_main_picture" id="feature_profilepic_{{$form_name}}">
		<i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 200 kb and exactly 1170 (w) x 780 (h) pixels.</i><br>
		<div id="message">Choose a picture from</div>
		<input class="theme_button color1 upload-image-{{$form_name}}" data-imgid="previewing_{{$form_name}}" type="button" value="Upload Pic">
	</div>
</div>
<div class="col-sm-3">
	<div>
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Main Picture Preview</b></span>
		</label>
		<br>
		@if($list['page_main_picture'])
			<img src="{!!asset('uploads/features/'.$list['page_main_picture'])!!}" id="previewing_{{$form_name}}" alt=""/>
		@else
			<img src="{!!asset('images/gallery/09.jpg')!!}" id="previewing_{{$form_name}}" alt=""/>
	   @endif
	   <input type="hidden" value="{!!$list['page_main_picture']!!}" name="page_main_picture_old">
	</div>
</div>
<div class="col-sm-4">
	<div class="form-group validate-required{{ $errors->has('page_side_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Feature Page Side Picture</b></span>
		<span class="required">*</span>
		</label>
		<input type="file" class="form-control" name="page_side_picture" id="page_side_picture_{{$form_name}}" placeholder="" value="">
		<i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 80 kb and exactly 270 (w) x 386 (h) pixels.</i><br>
		<input class="theme_button color1 upload-side-image-{{$form_name}}" data-imgsideid="previesideimage_{{$form_name}}" type="button" value="Upload Pic">
	</div>
</div>
<div class="col-sm-2">
	<div>
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Side Picture Preview</b></span>
		</label>
		<br>
		@if($list['page_side_picture'])
		<img src="{!!asset('uploads/features/'.$list['page_side_picture'])!!}" id="previesideimage_{{$form_name}}" alt=""/>
		@else
			<img src="{!!asset('images/side-image.jpg')!!}" id="previesideimage_{{$form_name}}" alt=""/>
	   @endif
	   <input type="hidden" value="{!!$list['page_side_picture']!!}" name="page_side_picture_old">
	</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-6">
	<div class="form-group validate-required{{ $errors->has('home_page_main_picture') ? ' has-error' : '' }}" id="feature_profilepicfile_field">
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Home Page Main Feature Picture</b></span>
		<span class="required">*</span>
		</label>
		<input type="file" class="form-control" name="home_page_main_picture" id="page_main_picture_{{$form_name}}" placeholder="" value="">
		<i>Choose a picture from or associated with your program in .png or .jpg format, not larger than 340 kb and exactly 1920 (w) x 1000 (h) pixels.</i><br>
		<input class="theme_button color1 upload-main-image-{{$form_name}}" data-imgmainid="previemainimage_{{$form_name}}" type="button" value="Upload Pic">
	</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
	<div>
		<label for="feature_phone" class="control-label">
		<span class="grey"><b>Main Feature Pic Preview</b></span>
		</label>
		<br>
		@if($list['home_page_main_picture'])
		<img src="{!!asset('uploads/features/'.$list['home_page_main_picture'])!!}" id="previemainimage_{{$form_name}}" alt=""/>
		@else
			<img src="{!!asset('images/slide02.jpg')!!}" id="previemainimage_{{$form_name}}" alt=""/>
	   @endif
	   <input type="hidden" value="{!!$list['home_page_main_picture']!!}" name="home_page_main_picture_old">
	</div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<p class="required">Have you checked for spelling, letter case and punctuation errors? Have you checked your social media links once again?</p>	
</div>
<div class="clearfix"></div>

<div class="col-sm-12">
	<div class="form-group validate-required checkbox" id="yes_check_div{{$form_name}}">
	<input id="yes_check_{{$form_name}}" class="checkbox-inline" name="radioList" value="v1" type="checkbox" @if($request && $request->old('radioList', $form_name) == 'v1') checked="checked"
@elseif(!$request && $list['status'] == 'Active')
	checked="checked"
		@endif>
		<label for="yes_check_{{$form_name}}"><b>Do you want to publish?</b>
</label>
												
													
	</div>
</div>
	

	
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
	
	<a class="theme_button inverse" id ="clearfromdata_{{$form_name}}" href="javascript:void(0);">Clear Form</a>
	
	<button type="submit" class="theme_button color2">Submit</button>
</div>
	<div class="clearfix"></div>
<div>

	
</div>

	
@push('customjs')
<script type="text/javascript">

// Function to preview image after validation
$(function() {
	$("body").on("click","#clearfromdata_{{$form_name}}",function(e){
		$('#{{$form_name}}')[0].reset();
	});

	var _URL = window.URL || window.webkitURL;
	$("body").on("click",".upload-image-{{$form_name}}",function(e){
	var imgId = $(this).attr('data-imgid');
 	if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }
		//$("#message").empty(); // To remove the previous error message
		var file =  document.getElementById('feature_profilepic_{{$form_name}}').files[0];
		
		img = new Image();
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
		
        img.onload = function () {
			fileSize = file.size //size in kb
			fileSize = fileSize / 1024; //size in kb
			
			if(1170 > this.width || 780 > this.height){
				alert('Please Select 1170 (w) x 780 (h) pixels');
			} else if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				alert('Please Select A valid Image File');
			} else if(fileSize > 200) {
				alert('Your image size must be less then 200 KB');
			} else {

				reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(file);
			}
		  
        };
		
		img.src = _URL.createObjectURL(file);
		
 		
	});

function imageIsLoaded(e) { 
	$('#previewing_{{$form_name}}').attr('src', reader.result);  
};

	$("body").on("click",".upload-side-image-{{$form_name}}",function(e){
	imgsideid = $(this).attr('data-imgsideid');
 	if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }
		//$("#message").empty(); // To remove the previous error message
		var file =  document.getElementById('page_side_picture_{{$form_name}}').files[0];
		
		img = new Image();
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
		
        img.onload = function () {
			fileSize = file.size //size in kb
			fileSize = fileSize / 1024; //size in kb
			
			if(270 > this.width || 386 > this.height){
				alert('Please Select 270 (w) x 386 (h) pixels');
			} else if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				alert('Please Select A valid Image File');
			} else if(fileSize > 80) {
				alert('Your image size must be less then 80 KB');
			} else {
				reader = new FileReader();
				reader.onload = imageIsLoadedSide;
				reader.readAsDataURL(file);
			}
		  
        };
		
		img.src = _URL.createObjectURL(file);
		
 		
	});


	$("body").on("click",".upload-main-image-{{$form_name}}",function(e){
	imgmainid = $(this).attr('data-imgmainid');
 	if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
      alert('The File APIs are not fully supported in this browser.');
      return;
    }
		//$("#message").empty(); // To remove the previous error message
		var file =  document.getElementById('page_main_picture_{{$form_name}}').files[0];
		
		img = new Image();
		var imagefile = file.type;
		var match= ["image/jpeg","image/png","image/jpg"];
        img.onload = function () {
			fileSize = file.size //size in kb
			fileSize = fileSize / 1024; //size in kb
			
			if(1920 > this.width || 1000 > this.height){
				alert('Please Select 1920 (w) x 1000 (h) pixels');
			} else if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				alert('Please Select A valid Image File');
			} else if(fileSize > 340) {
				alert('Your image size must be less then 340 KB');
			} else {
				reader = new FileReader();
				reader.onload = imageIsLoadedMain;
				reader.readAsDataURL(file);
			}
		  
        };
		
		img.src = _URL.createObjectURL(file);
		
 		
	});



});

function imageIsLoadedSide(e) { 
	$('#'+imgsideid).attr('src', reader.result);  
};
function imageIsLoadedMain(e) { 	
	$('#'+imgmainid).attr('src', reader.result);  
};

</script>

@endpush