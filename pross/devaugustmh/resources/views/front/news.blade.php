<div id="news">
	    @if($setting->news_desc)
    	<div class="line4">		
		  <div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h4>What&rsquo;s New?</h4>
					<p>{{$setting->news_desc}}</p>
					</div>
				</div>
			</div>
		</div>
		@endif
		
		@if($news)
		<div class="container">
			<div class="row news gallery clearfix" id="loadmorehtml">
				@foreach($news as $new)
				<div class="col-md-3  text-left">
					<img class="img-responsive picsGall" src=""/>
					<h3><a href="{{$new['news_url']}}?iframe=true&amp;width=90%&amp;height=90%" rel="prettyPhoto[iframe]">{{$new['title']}}</a></h3>
					<ul>
						<li><i class="fa fa-calendar"></i><?php echo date('F d, Y', strtotime($new['created_at'])) ?></li>
					</ul>
					<p>{{$new['description']}} ... <a href="{{$new['news_url']}}?iframe=true&amp;width=90%&amp;height=90%" rel="prettyPhoto[iframe]">Read More <em class="fa fa-angle-right"></em></a></p>
					<hr class="hrNews">
				</div>
				@endforeach
			</div>
		</div>
		@endif	
			
			
			<div class="container">
			<div class="row cBtn">
				<div class="col-md-12" style="text-align: center; margin-bottom: -90px; z-index: 10;">
					<ul class="mNews">
						<li class="dowbload bhide2"><a href="javascript:void(0);" id = "loadmore"><i class="fa fa-arrow-down" style="color:#fff"></i>Load More news</a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>

