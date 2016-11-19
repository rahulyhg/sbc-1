@extends('layouts.app')

@section('title')
	Your Workout
@endsection

@section('content')

<style type="text/css">
#video-player
{
	width: 100%;
}	
.video-img-wrapper
{
	padding:2px;
}

.video-img
{
	width:100%;
	height:auto;
}

.active-slider
{
	border:2px solid #ee337f;
}

.owl-item
{
	padding: 2px;
}
</style>

  <div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-xs-12">

		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">
			 	Your Workout
			 </h1>
		 </div>
		 


		<div class="row row-program-activity">		
				<div class="col-md-12" id="video-player-wrapper">
					<h2 id="caption_div">{{$workout[0]->name}}</h2>

							<div id="video-player" ></div>

							<div id="video-slider" class="owl-carousel">
 							@foreach($workout as $workoutdata) 							
	 							<div class="video-img-wrapper" data-video-id="{{$workoutdata->video}}" data-video-title="{{$workoutdata->name}}">
	 								<img src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workoutdata->video }}.jpg" class="video-img">
	 							</div>
 							@endforeach	
 							</div>
			</div>      
		</div>
		
		
		
		
		<br><br>

	 </div>



 </div>

</div>

</div>



<script src="https://player.vimeo.com/api/player.js"></script>
<link rel="stylesheet" href="{{ url('/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ url('css/owl.theme.css') }}">


<script>
var player;
var current_video_index=0;
var total_num_video={{count($workout)}};
var video_slider;

//fix for safari
var last_clicked_time=0;
window.onload=function(){ 

	var first_video_id=$(".video-img-wrapper:first").addClass("active-slider").data("video-id");
	//first_video_id=76979871;
	video_slider=$("#video-slider").owlCarousel({ addClassActive:true,scrollPerPage : true });
	
	//init vimeo video player with dummy video
	player = new Vimeo.Player($("#video-player"),{id:first_video_id,width: $("#video-player-wrapper").width()});	
	player.on('ended', function() {	

		var cur_time=new Date().getTime();
		if(cur_time - last_clicked_time <=1000)
		{
			return false;
		}

		last_clicked_time=cur_time;

		var nextindex=current_video_index+1;
		if(nextindex>=total_num_video)			
		{
			return false;
			nextindex=0;
		}		
	   	$(".video-img-wrapper").eq(nextindex).trigger("click");

	   if($.inArray(nextindex,video_slider.data("owlCarousel").visibleItems)==-1)
	   {	   		
	   		//move carausel to that item
	   		video_slider.data("owlCarousel").goTo(nextindex);
	   }
	});
	
	//play vimeo video by id;
	function playVideoById(video_id)
	{
		//player.pause();
		player.loadVideo(video_id).then(function(){ 
	 		player.play();
		});
	}
	//attach click events on slides
	$(".video-img-wrapper").click(function(e){
		$(".active-slider").removeClass("active-slider");
		$(this).addClass("active-slider");
		var video_id=$(this).data("video-id");
		current_video_index=$(this).index(".video-img-wrapper");		
		playVideoById(video_id);
		$("#caption_div").html($(this).data("video-title"));
	});

}
</script>

<!--testing-->
@endsection