@extends('layouts.user.master')
@section('content')

<!-- template sections -->
	
<section class="ls with_bottom_border">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb darklinks">
          <li>
            <a href="#">Admin Panel</a>
          </li>
          <li class="active">Edit Your Password</li>
        </ol>
      </div>
    </div>
  </div>
</section>	


			<section class="ls section_padding_top_20 section_padding_bottom_100 columns_padding_25">
				<div class="container">
					
					<div class="row">
						
						<div class="row">

						<div class="col-md-12">

							<div class="row">
								<div class="col-md-12">
									<h3>Edit Your Password</h3>
									<strong class="required">Note: &nbsp;</strong>Required fields are marked with &nbsp;<span class="required">*</span>
								</div>
							</div>

							<!-- @php
							$postTab = Session::get('activeTab');
							@endphp	 -->		

							<!-- Nav tabs -->
							

							<!-- Tab panes -->
							<div class="tab-content top-color-border">
								<div class="tab-pane fade @php echo ($postTab == 'feature1' || !$postTab) ? 'active in' : '' @endphp" id="tab1">
								<form role="form" method="post" id="comform" action="{{ url('user/changepass')}}">
									@php
										if(old('form_name') == 'feature1') {
											$request1 = \app('request');
										} else {
											$request1 = null;
										}
									@endphp
									<!-- <input type="hidden" name="form_name" value="feature1"> -->
									{{ csrf_field() }}
                  <!-- <div class="col-sm-6"> -->
										<div class="form-group validate-required{{ $errors->feature1->has('old_password') ? ' has-error' : '' }}" id="company_name_field">
											<label for="old_password" class="control-label">
											<span class="grey"><b>Old Password</b></span>
											<span class="required">*</span>
											</label>
											<input type="password" class="form-control" name="old_password" id="old_password" placeholder="" value="">
										</div>
									<!-- </div> -->
										
                <!-- <div class="col-sm-5"> -->
										<div class="form-group validate-required{{ $errors->feature1->has('new_password') ? ' has-error' : '' }}" id="company_name_field">
											<label for="new_password" class="control-label">
											<span class="grey"><b>New Password</b></span>
											<span class="required">*</span>
											</label>
											<input type="password" class="form-control" name="new_password" id="new_password" placeholder="" value="">
										</div>
									<!-- </div> -->
										<div class="form-group validate-required{{ $errors->feature1->has('new_password_confirmation') ? ' has-error' : '' }}" id="company_name_field">
											<label for="new_password_confirmation" class="control-label">
											<span class="grey"><b>Confirm Password</b></span>
											<span class="required">*</span>
											</label>
											<input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="" value="">
										</div>


										<div>
											<!-- <a class="theme_button inverse" id ="userfrm" href="javascript:void(0);">Clear Form</a> -->
											<input type="submit" class="theme_button color2" value="SUBMIT" name="sub">
											<!-- <a class="theme_button color2" href="#">Submit </a> -->
	                                  	</div>
								</form>
							</div>
								
							</div>

						</div>

					</div>
						
					</div>
				</div>
			</section>

@include('layouts.user.footer')		
			<!-- template sections -->
		
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush


@push('customjs')
<script type="text/javascript">
	// function imageValidate (){alert('hello');}
// Function to preview image after validation
// $(function() {

// });
</script> 
@endpush