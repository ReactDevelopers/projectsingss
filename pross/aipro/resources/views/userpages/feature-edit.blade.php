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
					<li class="active">Edit Featured Programs</li>
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
								  <h3>Edit your Featured Programs</h3>
								  <strong class="required">Note: &nbsp;</strong>Required fields are marked with &nbsp;<span class="required">*</span>
								</div>
							</div>

							@php
							$postTab = Session::get('activeTab');
							@endphp
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li @php echo ($postTab == 'feature1' || !$postTab) ? 'class="active"' : '' @endphp>
									<a href="#tab1" role="tab" data-toggle="tab">
										<i class="fa fa-pencil"></i>Edit Feature 1</a>
								</li>
								<li @php echo ($postTab == 'feature2') ? 'class="active"' : '' @endphp>
									<a href="#tab2" role="tab" data-toggle="tab">
										<i class="fa fa-pencil"></i>Edit Feature 2</a>
								</li>
								<li @php echo ($postTab == 'feature3') ? 'class="active"' : '' @endphp>
									<a href="#tab3" role="tab" data-toggle="tab">
										<i class="fa fa-pencil"></i>Edit Feature 3</a>
								</li>
								<!-- <li @php echo ($postTab == 'feature4') ? 'class="active"' : '' @endphp>
									<a href="#tab4" role="tab" data-toggle="tab">
										<i class="fa fa-cloud-upload"></i>{{ $lists[2]['status']=='Inactive' ? 'Publish':'UnPublish' }}</a>
								</li> -->
							</ul>

							<!-- Tab panes -->
							<div class="tab-content top-color-border">
							
							<!-- Feature Details 01 Form -->
                                <div class="tab-pane fade @php echo ($postTab == 'feature1' || !$postTab) ? 'active in' : '' @endphp" id="tab1">
									<form action="{{ url('/user/featuresave') }}" method="post" name="feature1" id = "feature1" autocomplete="off" enctype="multipart/form-data">
									@php
										if(old('form_name') == 'feature1') {
											$request1 = \app('request');
										} else {
											$request1 = null;
										}
									@endphp
										<input type="hidden" name="form_name" value="feature1">
										<input type="hidden" name="feature_info" value="{{$lists[0]->id}}">
										{{ csrf_field() }}
										@include('userpages.feature-edit-section',['form_name'=>'feature1', 'list' => $lists[0], 'request' => $request1])
									</form>
								</div>
                                <!-- End of feature Details 01 Form -->
								
								<!-- Feature Details 02 Form -->
                                <div class="tab-pane fade @php echo ($postTab == 'feature2') ? 'active in' : '' @endphp" id="tab2">
                        			<form action="{{ url('/user/featuresave') }}" method="post" name="feature2" id = "feature2" autocomplete="off" enctype="multipart/form-data">
									@php
										if(old('form_name') == 'feature2') {
											$request2 = \app('request');
										} else {
											$request2 = null;
										}
									@endphp
										<input type="hidden" name="form_name" value="feature2">
										<input type="hidden" name="feature_info" value="{{$lists[1]->id}}">
										{{ csrf_field() }}
										@include('userpages.feature-edit-section',['form_name'=>'feature2', 'list' => $lists[1], 'request' => $request2])
									</form>
								</div>
                                <!-- End of feature Details 02 Form -->
								
								<!-- Feature Details 03 Form -->
                                <div class="tab-pane fade @php echo ($postTab == 'feature3') ? 'active in' : '' @endphp" id="tab3">
                        			<form action="{{ url('/user/featuresave') }}" method="post" name="feature3" id = "feature3" autocomplete="off" enctype="multipart/form-data">
										@php
										if(old('form_name') == 'feature3') {
											$request3 = \app('request');
										} else {
											$request3 = null;
										}
										@endphp	
										<input type="hidden" name="form_name" value="feature3">
										<input type="hidden" name="feature_info" value="{{$lists[2]->id}}">
										{{ csrf_field() }}
										@include('userpages.feature-edit-section',['form_name'=>'feature3', 'list' => $lists[2], 'request' => $request3])
									</form>
								</div>
                                <!-- End of feature Details 03 Form -->
                                
                                <!-- Agree to Terms and Publish -->
                                <div class="tab-pane fade @php echo ($postTab == 'feature4') ? 'active in' : '' @endphp" id="tab4">
                                	<form action="{{ url('/user/publishsave') }}" method="post" name="pub" id = "pub" autocomplete="off" enctype="multipart/form-data">
                                		{{ csrf_field() }}
									<div>
										
										<!-- <a class="theme_button inverse" href="#">Clear Form</a> -->
										<!-- <a class="theme_button color1" href="#">Publish</a> -->
										<input type="submit" class="theme_button color1" value="{{ $lists[2]['status']=='Inactive' ? 'Publish':'UnPublish' }}" name="sub">
										<input type="hidden" id="hid1" name="hid1" value="{{ $lists[2]['status']=='Inactive' ? 'Active':'Inactive' }}">
                                  	</div>
									</form>
								</div>
								<!-- End Publish -->
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