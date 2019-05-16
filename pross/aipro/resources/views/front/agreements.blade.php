@extends('layouts.master')

@section('content')
<!-- Main Content -->
<section class="page_breadcrumbs cs section_padding_50 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <h2 class="small">{!!$pageData['title']!!}</h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ol class="breadcrumb">
                    <li><a href="./">Back</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
            

<section class="ls section_padding_100 columns_padding_25">
	<div class="container">
		<div class="row vertical-tabs">
			<div class="col-sm-5">

				<!-- Nav tabs -->
				<ul class="nav" role="tablist">
					@if($pageData['sub_title_1'])	
						<li class="active"> <a href="#vertical-tab1" role="tab" data-toggle="tab">{!!$pageData['sub_title_1']!!}</a></li>
					@endif
					@if($pageData['sub_title_2'])	
						<li><a href="#vertical-tab2" role="tab" data-toggle="tab">{!!$pageData['sub_title_2']!!}</a></li>
					@endif
					@if($pageData['sub_title_3'])
						<li><a href="#vertical-tab3" role="tab" data-toggle="tab">{!!$pageData['sub_title_3']!!}</a></li>
					@endif
					@if($pageData['sub_title_4'])
						<li><a href="#vertical-tab4" role="tab" data-toggle="tab">{!!$pageData['sub_title_4']!!}</a></li>
					@endif
					@if($pageData['sub_title_5'])
						<li><a href="#vertical-tab5" role="tab" data-toggle="tab">{!!$pageData['sub_title_5']!!}</a></li>
					@endif
					@if($pageData['sub_title_6'])
						<li><a href="#vertical-tab6" role="tab" data-toggle="tab">{!!$pageData['sub_title_6']!!}</a></li>
					@endif
					@if($pageData['sub_title_7'])
						<li><a href="#vertical-tab7" role="tab" data-toggle="tab">{!!$pageData['sub_title_7']!!}</a></li>
					@endif
					@if($pageData['sub_title_8'])
						<li><a href="#vertical-tab8" role="tab" data-toggle="tab">{!!$pageData['sub_title_8']!!}</a></li>
					@endif
					@if($pageData['sub_title_9'])
						<li><a href="#vertical-tab9" role="tab" data-toggle="tab">{!!$pageData['sub_title_9']!!}</a></li>
					@endif
				  
				</ul>

			</div>

			<div class="col-sm-7">

				<!-- Tab panes -->
				<div class="tab-content no-border">
				   @if($pageData['sub_title_1'])
					<div class="tab-pane fade in active" id="vertical-tab1">
						<h3 class="poppins">{!!$pageData['sub_title_1']!!}</h3>
						{!!$pageData['description_1']!!}
						@if($pageData['document_1'])
						<span>
							<i class="fa fa-download rightpadding_5 highlight" aria-hidden="true"></i>
								<a href="{{ url('download/'.$pageData['document_1'])}}">Download Here</a>
						</span>
						@endif
					</div>
					@endif
					
					@if($pageData['sub_title_2'])
					<div class="tab-pane fade" id="vertical-tab2">
						<h3 class="poppins">{!!$pageData['sub_title_2']!!}</h3>
						{!!$pageData['description_2']!!}
						@if($pageData['document_2'])
						<span>
							<i class="fa fa-download rightpadding_5 highlight" aria-hidden="true"></i>
								<a href="{{ url('download/'.$pageData['document_2'])}}">Download Here</a>
						</span>
						@endif
					</div>
					@endif
					@if($pageData['sub_title_3'])
					<div class="tab-pane fade" id="vertical-tab3">
						<h3 class="poppins">{!!$pageData['sub_title_3']!!}</h3>
						{!!$pageData['description_3']!!}
					</div>
					@endif
					@if($pageData['sub_title_4'])
					<div class="tab-pane fade" id="vertical-tab4">
						<h3 class="poppins">{!!$pageData['sub_title_4']!!}</h3>
						{!!$pageData['description_4']!!}
					</div>
					@endif
					@if($pageData['sub_title_5'])
					<div class="tab-pane fade" id="vertical-tab5">
						<h3 class="poppins">{!!$pageData['sub_title_5']!!}</h3>
						{!!$pageData['description_5']!!}
					</div>
					@endif
					@if($pageData['sub_title_6'])
					<div class="tab-pane fade" id="vertical-tab6">
						<h3 class="poppins">{!!$pageData['sub_title_6']!!}</h3>
						{!!$pageData['description_6']!!}
					</div>
					@endif
					@if($pageData['sub_title_7'])
					<div class="tab-pane fade" id="vertical-tab7">
						<h3 class="poppins">{!!$pageData['sub_title_7']!!}</h3>
						{!!$pageData['description_7']!!}
					</div>
					@endif
					@if($pageData['sub_title_8'])
					<div class="tab-pane fade" id="vertical-tab8">
						<h3 class="poppins">{!!$pageData['sub_title_8']!!}</h3>
						{!!$pageData['description_8']!!}
					</div>
					@endif
					@if($pageData['sub_title_9'])
					<div class="tab-pane fade" id="vertical-tab9">
						<h3 class="poppins">{!!$pageData['sub_title_9']!!}</h3>
						{!!$pageData['description_9']!!}
					</div>
					@endif
					
				</div>
			</div>
		</div>
		
		<div>
			<p><strong>Disclaimer:</strong></p>
				{!!$pageData['description']!!}
		</div>

	</div>
</section>
				
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush