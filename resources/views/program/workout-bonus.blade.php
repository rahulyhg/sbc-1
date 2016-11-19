@extends('layouts.app')

@section('title')
	Bonus Workouts - Exercise Room
@endsection

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-lg-9  col-md-9  col-sm-8  col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Exercise Room: Bonus Workouts</h1>
		 </div>
		 
		 <div class="nav_content1">
			<p>On the off days, you have the option to complete one of our pre-planned Bonus workouts using a resistance band. <a href="http://www.thebooknook.com/storefrontB2CWEB/categoryDetail.do?ctg_id=70317" target="_blank">Click HERE</a> to purchase a band, or you can use one you already have! These workouts aren’t super high intensity, but they’ll definitely have you feeling that Summer Body burn and help keep you on track. Plus, they’re totally optional, so if you want to do them on some off days and not on others, that’s just fine!</p>
		 </div>


   
		 <div class="row row-program-activity">
			<div class="col-md-10 col-md-offset-1 workout_list">
					
						
					@foreach ($workouts as $workout)
						<div class="meals_cnt">
							<h4><span>{{ $workout->name }}</span></h4>
							<p>{{ $workout->instructions }}</p>
							<a href="{{ url('/program/workout/'.$workout->id) }}" class="btn-info">View Video</a>
						</div> 
					@endforeach
					
			</div>     
		 </div>

	 </div>
	 
	 
	 
	 
	<div class="generic_right col-lg-3  col-md-3  col-sm-4  col-xs-12">
 		
 		{{--
		<div class="progress_cnt side_box">
			<h2 class="bkgd_level_1">NEW TO WORKOUTS?</h2>
			<p>We've developed a five day program for people with no workout experience.</p>	
			<a href="{{ url('/program/workout-prep') }}">Try our 5 Day Prep Program</a>
			<div class="clear"></div>
		</div>
		--}}
		
	 </div>
	 
 </div>
 
 

 </div>
 </div>
@endsection
