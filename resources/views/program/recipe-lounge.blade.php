@extends('layouts.app')

@section('title')
	This Week's Suggested Recipes
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
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">
			 	@if(Session::get('program_id') == 1 AND !isset($category))
					This Week's Menu
			 	@else
					Recipe Lounge
			 	@endif
			 </h1>
		 </div>
		 
		 <div class="nav_content1">
			 <p>
			 	@if(Session::get('program_id') == 1)
			 		
			 	@else
			 		As an Adventurer you're creating your own meal plans using the SBC guidelines, but sometimes you may just need some inspiration. Here are some of our favorite recipes.
			 	@endif
			 </p>
			 
			 <p>
			 	Some recipes, like a smoothie for breakfast or salad for lunch, work well as one serving.  If you’d like to make enough to feed your partner or family, you can simply double or quadruple the ingredients as needed. Other recipes, mainly entrees, are more convenient when made in a larger batch. This makes cooking for friends or family much easier and you can always split the recipe in half or refrigerate the extra to use as leftovers throughout the week. 
			 	<br><br>
			 </p>
		 </div>


   
			<div class="row row-program-activity recipe_list">
				<div class="col-md-10 col-md-offset-1">
					
						
					@foreach ($recipes as $recipe_group)
						<div class="meals_cnt">
							<h3>{{ $recipe_group->first()->meal->name }}:</h3>
							@foreach ($recipe_group->sortBy('name') as $recipe)
					
									<h4>
									@if($recipe->ingredients->count() > 0)
										<a href="{{ url('/program/recipe/'.$recipe->id) }}">{{ $recipe->name }}</a>
									@else
										{{ $recipe->name }}
									@endif	
										 {{--(Day  $recipe->pivot->day )--}}
									</h4>
									
									{{--<p>{!! nl2br($recipe->instructions) !!}</p>--}}
									{{--
									@if($recipe->ingredients->count() > 0)
										<a href="{{ url('/program/recipe/'.$recipe->id) }}" class="btn-info">View Recipe</a>
									@endif
									--}}
									
							@endforeach
							
							@if(!isset($category))
							<br>
							<a href="{{ url('/program/recipe-lounge/'.$recipe_group->first()->meal->id) }}" class="btn-primary btn-np bkgd-primary">View All {{ $recipe_group->first()->meal->name }} Recipes</a>				
							@endif
						</div>  
					@endforeach

				
			</div>     
		</div>

					
  
    

	
	 </div>
	 
 </div>
 
 

 </div>
 </div>
@endsection
