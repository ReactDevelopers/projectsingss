@if($setting->news_desc)
<div class="container">
	<div class="row">
		<div class="col-md-12 wwa">
			<span name="about" ></span>
			<h3>Meet Our Team!</h3>
			<h4>{{$setting->our_team_desc}}</h4>
		</div>
	</div>
</div>
@endif
@if($ourTeams)
<div class="container">
<div class="row team">
    @foreach($ourTeams as $ourTeam)
	<div class="col-md-4 b3">
	 <img class="img-responsive" src="{{asset('uplodes/profile/'.$ourTeam['profile_image'])}}" alt="{{$ourTeam['name']}}">
	 <h4>{{$ourTeam['name']}}</h4>
	 <h5>{{$ourTeam['designation']}}</h5>
	 <p>{{$ourTeam['description']}}</p>
	<ul>
		@if($ourTeam['facebook_url'])
		<li><a href="{{$ourTeam['facebook_url']}}" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
		@endif
		@if($ourTeam['skype_url'])
		<li><a href="{{$ourTeam['skype_url']}}" target="_blank"><i class="fa fa-skype"></i></a></li>
		@endif
		@if($ourTeam['twitter_url'])
		<li><a href="{{$ourTeam['twitter_url']}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
		@endif
		@if($ourTeam['linkedin_url'])	
		<li><a href="{{$ourTeam['linkedin_url']}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
		@endif
		@if($ourTeam['google_plus_url'])
		<li><a href="{{$ourTeam['google_plus_url']}}" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
		@endif
		@if($ourTeam['email'])
		<li><a href="mailto:{{$ourTeam['email']}}" target="_blank"><i class="fa fa-envelope"></i></a></li>
		@endif
		
	</ul>
	</div>
    @endforeach
</div>
</div>
@endif