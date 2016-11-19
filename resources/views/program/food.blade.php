@extends('layouts.app')

@section('title')
	Summer Body Friendly Foods: {{ $food->name }}
@endsection

@section('content')

 <div class="container">

 <div class="row">
   <div class="container1">
 
 
 
 
   
	 <div class="generic_left col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
			 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Summer Body Friendly Foods</h1>
		 </div>


   
		<div class="row row-program-activity">
				<div class="col-md-10 col-md-offset-1">					
						

							<h2>{{ $food->name }}</h2>
					
							<table class="table">
								<tr>
									<td>
										
											{!! nl2br($food->description) !!}
										
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
