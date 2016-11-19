@extends('layouts.app')

@section('title')
	Exercise Room
@endsection

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-lg-9  col-md-9  col-sm-8  col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Exercise Room</h1>
		  </div>

		 
		 <div class="nav_content1">

             {{--<p>You’ll receive workout suggestions for each day from our Exercise Room, and then on the off days, you have the option to complete one of our pre-planned Bonus workouts using a resistance band. <a href="http://www.thebooknook.com/storefrontB2CWEB/categoryDetail.do?ctg_id=70317" target="_blank">Click HERE</a> to purchase a band, or you can use one you already have!--> These workouts aren’t super high intensity, but they’ll definitely have you feeling that Summer Body burn and help keep you on track. Plus, they’re totally optional, so if you want to do them on some off days and not on others, that’s just fine!</p>--}}
			 <p>As an Adventurer we know you want to build things from scratch. Create your own 30 minute workout from our Exercise Room. You must start with a warm up and you must end with a cool down. And your choice of any 4 cardio, 3 resistance, and 2 abs/core exercises.</p>
			 
			 
             @if($cntUserVideo > 0)
                 <a href="{{URL('/program/playlists')}}" class="btn btn-primary bkgd-secondary">Play Last Workout</a>
             @endif
             
             <hr>
             
             <div class="exercise_room">
				 <h2>Create a Workout</h2>
			 
				 <p>
				 Expand the categories below to select videos for your workout. Once you create a workout it will be saved until you replace it with a new one.
				 </p>
			 </div>
		 </div>

{!! Form::open(array('method' => 'post', 'url' => '/program/exercise-room','class' => 'form-horizontal', 'id' => 'exercise_room')) !!}
   
		 <div class="row row-program-activity">
			<div class="col-md-12 workout_list">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Warm Up  <em class="icon-fixed-width fa fa-plus"></em>
        </a>   
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body warm_video">
        @foreach ($workouts_warmup as $workout)
        		<div class="media">
				  <input type="checkbox" id="{{ $workout->name }}_{{ $workout->id }}" class="regular-checkbox" name="name[]" value="{{ $workout->id }}"/>
				  <label for="{{ $workout->name }}_{{ $workout->id }}" class="video_cal">
					  <div class="media-left">
						  <img class="media-object" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}">
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ $workout->name }}</h4><br>
						<span class="length">{{date('i:s', strtotime($workout->length))}}</span>
						<input type="hidden" class="video_length" value="{{date('i:s', strtotime($workout->length))}}"/>
					  </div>
					</label>
				</div>
        @endforeach
            <input type="hidden" name="warm_total" value="0" id="warm_total"/>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Cardio <em class="icon-fixed-width fa fa-plus"></em>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        @foreach ($workouts_cardio as $workout)
        		<div class="media">
				  <input type="checkbox" id="{{ $workout->name }}_{{ $workout->id }}" class="regular-checkbox" name="name[]" value="{{ $workout->id }}"/>
				  <label for="{{ $workout->name }}_{{ $workout->id }}" class="video_cal">
					  <div class="media-left">
						  <img class="media-object" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}">
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ $workout->name }}</h4><br>
						<span class="length">{{date('i:s', strtotime($workout->length))}}</span>
						<input type="hidden" class="video_length" value="{{date('i:s', strtotime($workout->length))}}"/>
					  </div>
					</label>
				</div>
        @endforeach
           </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
          Resistance <em class="icon-fixed-width fa fa-plus"></em>
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
       @foreach ($workouts_resistance as $workout)
        		<div class="media">
				  <input type="checkbox" id="{{ $workout->name }}_{{ $workout->id }}" class="regular-checkbox" name="name[]" value="{{ $workout->id }}"/>
				  <label for="{{ $workout->name }}_{{ $workout->id }}" class="video_cal">
					  <div class="media-left">
						  <img class="media-object" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}">
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ $workout->name }}</h4><br>
						<span class="length">{{date('i:s', strtotime($workout->length))}}</span>
						<input type="hidden" class="video_length" value="{{date('i:s', strtotime($workout->length))}}"/>
					  </div>
					</label>
				</div>
        @endforeach
      </div>
    </div>
  </div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
          Abs/Core <em class="icon-fixed-width fa fa-plus"></em>
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
       @foreach ($workouts_abscore as $workout)
        		<div class="media">
				  <input type="checkbox" id="{{ $workout->name }}_{{ $workout->id }}" class="regular-checkbox" name="name[]" value="{{ $workout->id }}"/>
				  <label for="{{ $workout->name }}_{{ $workout->id }}" class="video_cal">
					  <div class="media-left">
						  <img class="media-object" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}">
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ $workout->name }}</h4><br>
						<span class="length">{{date('i:s', strtotime($workout->length))}}</span>
						<input type="hidden" class="video_length" value="{{date('i:s', strtotime($workout->length))}}"/>
					  </div>
					</label>
				</div>
        @endforeach
      </div>
    </div>
  </div>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingsix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
         Cool Down <em class="icon-fixed-width fa fa-plus"></em>
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
      <div class="panel-body cooldown">
       @foreach ($workouts_cooldown as $workout)
        		<div class="media">
				  <input type="checkbox" id="{{ $workout->name }}_{{ $workout->id }}" class="regular-checkbox" name="name[]" value="{{ $workout->id }}"/>
				  <label for="{{ $workout->name }}_{{ $workout->id }}" class="video_cal">
					  <div class="media-left">
						  <img class="media-object" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}">
					  </div>
					  <div class="media-body">
						<h4 class="media-heading">{{ $workout->name }}</h4><br>
						<span class="length">{{date('i:s', strtotime($workout->length))}}</span>
						<input type="hidden" class="video_length" value="{{date('i:s', strtotime($workout->length))}}"/>
					  </div>
					</label>
				</div>
        @endforeach
           <input type="hidden" class="cool_down" id='cool_down' value="0" name="cool_down"/>
      </div>
    </div>
  </div>
</div>
            
		<div id="message" style="display: none">
			<div id="inner-message" class="alert">
				<span></span>
			</div>
		</div>

        <div class="form-group">
	
			<div class="col-xs-5">
				<button type="button" class="btn btn-primary bkgd-primary create_workout" id="profile_update">Create Workout</button>
			</div>

			<div class="col-xs-7 text-right workout_time">
				<h3>YOUR WORKOUT: <span class="total_time">00:00</span></h3>
			</div>

    	</div>  
    	      
    	      </div>   
        	</div>     
		 </div>        
{!! Form::close() !!}
					

		

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
