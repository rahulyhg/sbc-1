@extends('layouts.app')

@section('title')
	{{ !isset($workout->day) ? $workout->name . " - Exercise Room" : $workout->name . " - Today's Suggested Workout: " }}
@endsection

@section('meta')
	<meta property="og:site_name"          content="Summer Body Club" />
	<meta property="og:url"                content="{{ url('/workout/'.$workout->id) }}" />
	<meta property="og:type"               content="fitness.course" />
	<meta property="og:title"              content="{{ $workout->name }}" />
	<meta property="og:description"        content="{{ !empty($workout->instructions) ? $workout->instructions : 'Personalized Summer Body Club Workout' }}" />
	<meta property="og:image"              content="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" />
	<meta property="og:image:secure_url"   content="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" />
	<meta property="og:image:width"   	   content="960" />
	<meta property="og:image:height"   	   content="540" />
	<meta property="fb:app_id"             content="1704618459777853" />
@endsection

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
 
 
 
 
   
	 <div class="generic_left col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">
			 	{{ !isset($workout->day) ? "Exercise Room: " . $workout->name : "Today's Suggested Workout: " . $workout->name }}
			 </h1>
		 </div>

   
		<div class="row row-program-activity">
				<div class="col-md-12">					
						

							<h2>{{ $workout->name }}</h2>
							
							<div>
								<a href="{{ url('/program/workout/'.$workout->id) }}"><img src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" class="img-responsive"></a>
							</div>
							
							@if(!empty($workout->instructions))
							<table class="table">
								<tr>
									<td>
										{{ $workout->instructions }}
									</td>
								</tr>
							</table>
							@else
							<br><br>
							@endif
		
			</div>     
		</div>

   		
		<div class="row row-program-activity text-center">
			<div class="col-md-12">		
								<a href="{{ url('/program/workout/'.$workout->id) }}" class="btn btn-info">View Workout</a>
			</div>     
		</div>

	 </div>




	 
 </div>

</div>

</div>

@endsection
