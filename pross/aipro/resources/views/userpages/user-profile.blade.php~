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
          <li class="active">Company Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>	

<section class="ls section_padding_top_40 section_padding_bottom_100 columns_padding_25">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="entry-thumbnail bottommargin_40">
					@if($comdata['poster_pic'])
					<img src="{{ asset('uploads/features').'/'.$comdata['poster_pic'] }}" alt="">
					@else
					<img src="{{ asset('images/gallery/01.jpg') }}" alt="">
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<article>

					<h1 class="gallery-single-title">
						@if($comdata['com_url'])
							<a target="_blank" href="{{ $comdata['com_url'] }}" rel="bookmark">{{ $comdata['com_name'] }}</a>
						@else
							{{ $comdata['com_name'] }}
						@endif
						
					</h1>

					<!-- <header class="entry-header">
						<div class="item-meta">

							<span class="author greylinks">
								Member Since:
							</span>

							<span class="date">
								<time datetime="{{ $comdata['date'] }}" class="entry-date">
									{{ $comdata['date'] }}
								</time>
							</span>

						</div> -->
						<!-- .entry-meta -->
					<!-- </header> -->
					<!-- .entry-header -->


					<div class="entry-excerpt">
						<p>{{$comdata['com_headline']}}</p>
					</div>

					<p>
						<!-- {!!$comdata['com_write_up']!!} -->
						<?php $writeup= preg_split('/\r\n|[\r\n]/', $comdata['com_write_up']);
								
								$writeup = array_values(array_filter($writeup));
								$i = count($writeup);
								if($i>0){
								for($x=0; $x<1; $x++){ 
								echo '<p>'.$writeup[$x].'</p>'; 
								}				
								}
								 ?>
					</p>

					<blockquote class="text-center">
						{{ $comdata['com_testimony'] }}
						<div class="item-meta topmargin_30">
							<h4 class="text-uppercase margin_0">{{ $comdata['testimonial_name'] }}</h4>
							<p class="small-text big-spacing highlight">{{ $comdata['testimonial_designation'] }}</p>
						</div>
					</blockquote>
					<?php
							$i = count($writeup);
							if($i>1){
							for($x=1; $x<count($writeup); $x++){ 
								echo '<p>'.$writeup[$x].'<br/>'; 
								}
							}	
					?>
					

				</article>

				<div class="topmargin_60">

					
					<!-- #comments -->


					
					<!-- #respond -->

				</div>


			</div>
			<!--eof .col-sm-8 (main content)-->

			<div class="col-sm-4">

				<div class="panel-group" id="accordion">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">
						Key Contact
					</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="media bottommargin_20">
									<div class="media-left">
										<a href="#">
											<img src="{!!asset('images/team/04.jpg')!!}" class="img-circle" alt="">
										</a>
									</div>
									<div class="media-body">
										<h4 class="bottommargin_0">{{ $comdata['name'] }} {{ $comdata['surname'] }}</h4>
										<span class="highlight">{{ $comdata['designation'] }}</span>
									</div>
								</div>
								<p>{{$comdata['bios']}}</p>
								<div class="social-icons">
									@if($comdata['facebook_url'])
									<a target="_blank" class="social-icon soc-facebook color-icon" href="{!!$comdata['facebook_url']!!}" title="" data-toggle="tooltip" data-original-title="Facebook"></a>
									@endif
									@if($comdata['twitter_url'])
									<a target="_blank" class="social-icon soc-twitter color-icon" href="<?php echo 'https://twitter.com/'.$comdata['twitter_url']?>" title="" data-toggle="tooltip" data-original-title="Twitter"></a>
									@endif
									@if($comdata['linkedIn_url'])
									<a target="_blank" class="social-icon soc-linkedin color-icon" href="{!!$comdata['linkedIn_url']!!}" title="" data-toggle="tooltip" data-original-title="LinkedIn"></a>
									@endif
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						TOP CONTENT GENRES
					</a>
							</h4>
						</div>
						<?php 
						$categories = $comdata['categories'];
						$categoriesArray = [];
						if($categories){
							$categoriesArray = explode(",", $categories);
							$categoriesArray = array_filter($categoriesArray);
						$catData = getCategories();
						}
						?>
						<div id="collapse2" class="panel-collapse collapse in">
							<div class="panel-body">
								<ul class="list2 darklinks">
									<?php
									if(count($categoriesArray)) {
										foreach ($categoriesArray as $catVal) {
											echo '<li><p>'.$catData[$catVal].'</p></li>';
										}
										} else {
											echo '<li><p>NA</p></li>';
										}
									?>
								</ul>
							</div>
						</div>
					
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
						COMPANY ACTIVITIES
					</a>
							</h4>
						</div>
						<?php 
						$categories = $comdata['services'];
						$categoriesArray = [];
						if($categories){
							$categoriesArray = explode(",", $categories);
							$categoriesArray = array_filter($categoriesArray);

						}
						$servicesData = getServices();
						?>
						<div id="collapse3" class="panel-collapse collapse in">
							<div class="panel-body">
								<ul class="list2 darklinks">
									<?php
									if(count($categoriesArray)) {
										foreach ($categoriesArray as $catVal) {
											echo '<li><p>'.$servicesData[$catVal].'</p></li>';
										}
									} else {
										echo '<li><p>NA</p></li>';
									}
									?>
								</ul>
							</div>
						</div>
						
					</div>

				</div>

			</div>
			<!-- eof aside -->

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
