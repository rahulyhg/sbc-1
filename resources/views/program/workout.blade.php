@extends('layouts.app')

@section('title')
	{{ !isset($workout->day) ? $workout->name . " - Exercise Room" : $workout->name . " - Today's Suggested Workout: " }}
@endsection

@section('meta')
	<meta property="og:site_name"          content="Summer Body Club" />
	<meta property="og:url"                content="{{ url('/workout/'.$workout->id) }}" />
	<meta property="og:type"               content="fitness.course" />
	<meta property="og:title"              content="{{ $workout->name }}" />
	<meta property="og:description"        content="{{ isset($workout->instructions) ? $workout->instructions : 'Personalized Summer Body Club Workout' }}" />
	<meta property="og:image"              content="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" />
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
		 
		 {{--
		 <div class="nav_content1">
			 <p>Generic message explaining the ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
		 </div>
		--}}

   
		<div class="row row-program-activity">
				<div class="col-md-12">					
						

							<h2>{{ $workout->name }}</h2>
							
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://player.vimeo.com/video/{{ $workout->video }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
							
							@if(isset($workout->instructions))
							<table class="table">
								<tr>
									<td>
										{{ $workout->instructions }}
									</td>
								</tr>
							</table>
							@endif
		
			</div>     
		</div>

   
		<div class="row row-program-activity">
				<div class="col-md-12">		
							
							<div class="share-mod">
								You completed a Summer Body workout! Share the great news with your Facebook friends.<br><br>
								<button class="btn btn-fb btn-fb-share" id="shareBtn" ><i class="fa fa-facebook" aria-hidden="true"></i> SHARE ON FACEBOOK</button>
							</div>				
		
			</div>     
		</div>

	 </div>




	 
 </div>

</div>

</div>

<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: '{{ url("/program/workout/".$workout->id) }}',
  }, function(response){});
}
</script>

@endsection
