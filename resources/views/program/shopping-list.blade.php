@extends('layouts.app')

@section('title')
	Shopping List for This Week
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
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Your Shopping List for 
			 	@if($last_day_number == 1)
			 		Day {{ $last_day_number }}
			 	@else
			 		Days {{ $first_day_number }} - {{ $last_day_number }}
			 	@endif
			 </h1>
		 </div>
		 
		 <div class="nav_content1">
			 <p>
			 	@if($last_day_number < 7)
					Here is Summer Body grocery list for your first few days. 
					Beginning this Saturday your grocery list will have the ingredients and amounts for entire week’s menus moving forward!  
					Happy shopping!
			 	@else
					Here is your weekly Summer Body grocery list, all in one place so there are no surprises. 
					These amounts are for this week's menu as written. Please adjust to your preference or liking. 
					There are lots of items on this list that you may already have in your pantry from previous weeks.
					Happy shopping!
			 	@endif
			 </p>
		 </div>

   
		 <div class="row row-shopping-list">
				<div class="col-md-10 col-md-offset-1">
						<div class="meals_cnt">
							@foreach($ingre as $ingr)
							
								@if(isset($ingr['ingrednet']))
									<h3>{{isset( $ingr['department'] )? $ingr['department']:''}}</h3>
								@endif
                                 
                                <table class="table table-striped">            
								@if(isset($ingr['ingrednet']))
								
									@foreach($ingr['ingrednet'] as $ingr_data)
										
										<tr>
										
											<td width="80%">
												@if(isset($ingr_data['food']))
													<a href="/program/food/{{isset($ingr_data['food'])?$ingr_data['food']:''}}">{{isset($ingr_data['name'])?$ingr_data['name']:''}}</a>
												@else
													{{isset($ingr_data['name'])?$ingr_data['name']:''}}
												@endif
											</td>
											
											<td width="20%" align="right">
												@if(isset($ingr_data['total_quantity_w']))
													{{-- ---{{convert_to_pound($ingr_data['total_quantity_w']).'  pounds'.'--'.$ingr_data['total_quantity_w'].' oz'}} --}}
													{{$ingr_data['total_quantity_w'].' oz'}}
												@elseif(isset($ingr_data['total_quantity_s']))
													{{ceil($ingr_data['total_quantity_s'])}}
												@endif
										
												{{-- ----- Recipe Id : <strong>{{$ingr_data['recipe_ids']}}</strong> --}}
											</td>
											
										</tr>
										
									@endforeach
									
								@endif
								</table>
								
							@endforeach
												
						</div>  
				</div>     
			</div>

					
  
    

	
	 </div>
	 
 </div>
 
 

 </div>
 </div>
@endsection
