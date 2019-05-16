@extends('layouts.user.master')
@section('content')

<!-- template sections -->
<section class="ls section_padding_top_40 section_padding_bottom_150 columns_padding_25">
	<div class="container">
		<div class="row">

			<div class="col-sm-7 col-md-8 col-lg-8">

				<article class="single-post vertical-item content-padding big-padding post with_border rounded">
				@if($list->page_main_picture)
					<div class="entry-thumbnail item-media top_rounded overflow_hidden">
						<img src="{!!asset('uploads/features/'.$list->page_main_picture)!!}" alt="">
					</div>
				@endif
					<div class="item-content">
						<header class="entry-header">
						  <h1 class="entry-title topmargin_0">{{$list->feature_tag_line}}</h1>
						</header>
						<!-- .entry-header -->

						<div class="entry-content">
							
								<!-- {!! nl2br($list->feature_bios)!!} -->
								<?php
								$writeup= preg_split('/\r\n|[\r\n]/', $list->feature_bios);
								
								$writeup = array_values(array_filter($writeup));
								$i = count($writeup);
								if($i>0){
									for($x=0; $x<2 && $x < count($writeup)  ; $x++){ 
										echo '<p>'.$writeup[$x].'</p>'; 
									}				
								}
								 ?>
						
							@if($list->feature_testimony)
							<div class="text-center">
								<blockquote>
									{!!$list->feature_testimony!!}
									<div class="item-meta topmargin_30">
										<h4 class="margin_0">{!!$list->feature_testimony_name!!}</h4>
										<p class="small-text highlight">{!!$list->feature_testimony_designation!!}</p>
									</div>
								</blockquote>
							</div>
							@endif
							<?php
							$i = count($writeup);
							if($i>2){
								for($x=2; $x<3; $x++){ 
									echo '<p>'.$writeup[$x].'</p>'; 
								}
							}	
							?>
							<ul class="list2 checklist grey semibold">
							  @if($list->feature_highlight1)
							  <li>{!!$list->feature_highlight1!!}</li>
							  @endif
							  @if($list->feature_highlight2)
							  <li>{!!$list->feature_highlight2!!}</li>
							  @endif
							  @if($list->feature_highlight3)
							  <li>{!!$list->feature_highlight3!!}</li>
							  @endif
							</ul>
				
				@if($list->page_side_picture)
					<img class="alignleft" alt="" src="{!!asset('uploads/features/'.$list->page_side_picture)!!}">
				@endif
				<?php
				$i = count($writeup);
				if($i>3){
					for($x=3; $x<count($writeup); $x++){ 
						echo '<p>'.$writeup[$x].'</p>'; 
					}
				}	
				?>	 
				<div class="clearfix"></div>
							

							<div class="inline-content entry-meta semibold small-text darklinks topmargin_30">
								<div>
								  <i class="fa fa-user highlight rightpadding_5" aria-hidden="true"></i>
									<a href="javascript:void(0);">Posted by ({{\Auth::user()->name}} {{\Auth::user()->surname}})</a>
								</div>
								<div>
									<i class="fa fa-user highlight rightpadding_5" aria-hidden="true"></i>
									<a href="javascript:void(0);">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											{{$list->created_at_display}} 
											
										</time>
									</a>
								</div>
							</div>

						</div>
						<!-- .entry-content -->

					</div>
					<!-- .item-content -->

				</article>


				


				

			</div>
			<!--eof .col-sm-8 (main content)-->


			<!-- sidebar -->
			<aside class="col-sm-5 col-md-4 col-lg-4">

				<div class="widget widget_apsc_widget">
				  <h3 class="widget-title">Share</h3>
				  <div class="apsc-icons-wrapper clearfix apsc-theme-4">
						<div class="apsc-each-profile">
							<a class="apsc-facebook-icon clearfix" href="javascript:void(0);">
								<div class="apsc-inner-block">
									<span class="social-icon">
										<i class="fa fa-facebook-square apsc-facebook"></i>
										<span class="media-name">Facebook</span>
									</span>
									
								</div>
							</a>
						</div>
						<div class="apsc-each-profile">
							<a class="apsc-twitter-icon clearfix" href="javascript:void(0);">
								<div class="apsc-inner-block">
									<span class="social-icon">
										<i class="fa fa-twitter apsc-twitter"></i>
										<span class="media-name">Twitter</span>
									</span>
									
								</div>
							</a>
						</div>
						<div class="apsc-each-profile">
							<a class="apsc-linkedin-icon clearfix" href="javascript:void(0);">
								<div class="apsc-inner-block">
									<span class="social-icon">
										<i class="apsc-linkedin fa fa-linkedin-square"></i>
										<span class="media-name">Linked In</span>
									</span>
								</div>
							</a>
						</div>
						
						

					</div>

				</div>
			</aside>
			<!-- eof aside sidebar -->

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