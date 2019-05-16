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
            

<section class="ls section_padding_top_100 section_padding_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
				@if($pageData['page_image'])
					<img width="555" src="{{asset('uploads/images/'.$pageData['page_image'])}}" class="alignright" alt="">
				@endif
                <h2 class="section_header thin topmargin_0">
                    {!!$pageData['sub_title_1']!!}
					@if($pageData['sub_title_2'])
                    <strong>{!!$pageData['sub_title_2']!!}</strong>
					@endif
                </h2>
				{!!$pageData['description']!!}
                @if($pageData['sub_title_3'])
				<h4 class="text-uppercase">{!!$pageData['sub_title_3']!!}</h4>
				@endif
                {!!$pageData['description_2']!!}
				@if($pageData['add_more_points'])
					<?php $pointsArray = preg_split('/\r\n|[\r\n]/', $pageData['add_more_points']);?> 
                <ul class="list2 checklist grey semibold">
					@foreach($pointsArray as $pointArray)
						@if($pointArray)
						<li>{!!$pointArray!!}</li>
						@endif
					@endforeach
                </ul>
				@endif
                {!!$pageData['description_3']!!}
            </div>
        </div>
    </div>
</section>
			
<div class="row">
            <div class="col-md-3 col-sm-6">

                <div class="teaser text-center">
                    <div class="teaser_icon grey size_big">
                        <i class="rt-icon2-bulb"></i>
                    </div>
                    <h3 class="counter-wrap highlight" data-from="0" data-to="40" data-speed="1800">
                        <span class="counter" data-from="0" data-to="56" data-speed="1500">0</span>
                        <span class="counter-add">+</span>
                    </h3>
                    <p>New Shows a Year</p>
                </div>

            </div>

            <div class="col-md-3 col-sm-6">

                <div class="teaser text-center">
                    <div class="teaser_icon grey size_big">
                        <i class="rt-icon2-user"></i>
                    </div>
                    <h3 class="counter highlight" data-from="0" data-to="1256" data-speed="1400">0</h3>
                    <p>Talented Professional</p>
                </div>

            </div>
            
            <div class="col-md-3 col-sm-6">

                <div class="teaser text-center">
                    <div class="teaser_icon grey size_big">
                        <i class="rt-icon2-banknote"></i>
                    </div>
                    <h3 class="counter highlight" data-from="0" data-to="1935" data-speed="2100">0</h3>
                    <p>Million Dollars in Turnover</p>
                </div>

            </div>

            <div class="col-md-3 col-sm-6">

                <div class="teaser text-center">
                    <div class="teaser_icon grey size_big">
                        <i class="rt-icon2-like"></i>
                    </div>
                    <h3 class="highlight counter-wrap">
                        <span class="counter" data-from="0" data-to="1800" data-speed="3500">0</span>
                        <span class="counter-add">+</span>
                    </h3>
                    <p>Million Online Views</p>
                </div>

            </div>
</div>
                
<!-- /Main Content -->
@endsection

@push('scripts')
<script type="text/javascript">
  //alert('DSSSSSSSSSSSss');
</script>
@endpush