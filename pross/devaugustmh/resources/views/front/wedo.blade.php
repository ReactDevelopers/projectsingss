@if($setting->news_desc)
<div class="container">
	<div class="row">
		<div class="col-md-12 wwa">
			<span name="about" ></span>
			<h3>What do We Do?</h3>
			<h4>{!!$setting->what_do_we_do!!}<br>
		  </h4>
		</div>
	</div>
</div>
@endif
@if($whatdowedos)
<div class="container">
    <div class="row dfpm">
	@foreach($whatdowedos as $whatdowedo)
	    <div class="col-md-3 b1">
	    @if($whatdowedo['image_icon'])
	    <i class="fa" style="color:#2f2f2f;"><img class="img-responsive" src="{{asset('uplodes/profile/'.$whatdowedo['image_icon'])}}"></i>
	    @endif
	    <h4>{{$whatdowedo['name']}}</h4>
	    <h5>{{$whatdowedo['what_type']}}</h5>
	    <p>{!!$whatdowedo['description']!!}</p>
	    </div>
	@endforeach
    </div>
</div>
@endif