<div id="project">    	
	<div class="line3">
		<div class="container">
			<div id="project1" ></div>
			<div class="row Ama">
				<div class="col-md-12">
				<span name="projects" id="projectss"></span>
				<h4>What Are Our Projects?</h4>
				<p>{!! nl2br($setting->project_desc1) !!}</p>
				</div>
			</div>
		</div>
	</div>          
    
	@if($projects)
       <div class="container">
		<div class="row">
			<div class="portfolio_block columns3   pretty" data-animated="fadeIn">	
				@foreach($projects as $project)
				<div class="element col-sm-4  gall branding">
					<img width="356" height="276" class="img-responsive picsGall" src="{{asset('uplodes/projects/'.$project['project_image'])}}" alt="{{$project['project_name']}}"/>
					<div class="view project_descr"><h3>{{$project['project_name']}}</h3><ul></ul></div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
       @endif
</div>