@extends('layouts.app')

@section('title')
	Today's Suggested Recipe: {{ $recipe->meal->name }}
@endsection

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
 
 
 
 
   
	 <div class="generic_left col-xs-12">
 		
 		<div class="visible-print-block">
 			<img src="{{ url('/img/logo.png') }}" width="149" height="60" alt="logo">
 		</div>
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
		 	 <div class="visible-print-block print-icon-lg-program"><img src="{{ url('/img/icon-lg-program-'.Session::get('program_id').'.png') }}"></div>
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">{{ $recipe->meal->name }}</h1>
		 </div>
		 
		 <div class="nav_content1">
			 {{--<p>Generic message explaining the ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>--}}
		 </div>


   
		<div class="row row-program-activity">
				<div class="col-md-10 col-md-offset-1">					
						

							<h2>{{ $recipe->name }}</h2>
					
							<table class="table">
								<tr>
									<td><h4>Ingredients</h4></td>
									<td>
										<p>
											@foreach($ingredients as $ingredient)
												{{--{{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->unit }} @if($ingredient->pivot->quantity > 1){{ str_plural($ingredient->name) }}@else{{ $ingredient->name }}@endif {{ !empty($ingredient->pivot->note) ? '('.$ingredient->pivot->note.')' : ''}}<br>--}}
												
												{{--{{ $ingredient->pivot->quantity }} {{ $ingredient->pivot->unit }} {{ $ingredient->name }} {{ !empty($ingredient->pivot->note) ? '('.$ingredient->pivot->note.')' : ''}}<br>--}}
												
												{{ $ingredient->pivot->quantity }} 
												{{ $ingredient->pivot->unit }} 
												@if($ingredient->pivot->quantity != 1 AND $ingredient->pivot->unit == '' AND $ingredient->single == 1)
													{{ str_plural($ingredient->name) }}
												@else
													{{ $ingredient->name }}{{ !empty($ingredient->pivot->note) ? ', ' : ''}}
												@endif 
												{{ !empty($ingredient->pivot->note) ? $ingredient->pivot->note : ''}}
												<br>
											@endforeach
										</p>
										<p class="foods">
											@foreach($recipe->foods as $food)
												<a href="{{ url('/program/food/'.$food->id.'')}}"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {{ $food->name }} Suggestions</a><br>
											@endforeach
										<p>
									</td>
								</tr>
								<tr>
									<td><h4>Instructions</h4></td>
									<td>
										{!! nl2br($recipe->instructions) !!}
									</td>
								</tr>
							</table>
							
		
			</div>     
		</div>

	 </div>




	 
 </div>

 </div>
 </div>
@endsection
