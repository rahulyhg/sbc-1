@extends('layouts.app')

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">5 Day Prep Program</h1>
		 </div>
		 
		 <div class="nav_content1">
			 <p>Generic message explaining the ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
		 </div>


   
		 <div class="row row-program-activity">
			<div class="col-md-10 col-md-offset-1">
					
						
					@foreach ($workouts as $workout)
						<div class="meals_cnt">
							<h4><span>{{ $workout->name }}</span></h4>
							<p>{{ $workout->instructions }}</p>
							<a href="{{ url('/program/workout/'.$workout->id) }}" class="btn-info">View Instructions</a>
						</div> 
					@endforeach

				
			</div>     
		 </div>

	 </div>
	 
	 
	 
	 
	<div class="generic_right col-lg-3  col-md-3  col-sm-4  col-xs-12">
 
		
	
	 </div>
	 
 </div>
 
 

 </div>
 </div>
@endsection
