@extends('layouts.app')

@section('title')
	Program Reset
@endsection

@section('content')

<div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-xs-12">
 
				 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
					 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Summer Body Club Program Reset</h1>
				 </div>

				 <div class="nav_content1">
				 	<h4>Return to the 9-Day Jumpstart</h4>
					 <p>
						 Sometimes we all need a little bit of a reboot, whether we have a big event coming up, or we just want a little kick in the pants!
					 </p>
					 <a href="{{url('/account/program-reset-jumpstart')}}" class="btn btn-primary bkgd-primary">Return to the 9-Day Jumpstart</a>
					 
					 
				 </div>
				 
				 
				 
				 
				 
		 		@if(count($past_days) > 1)
		 		
				 <div class="nav_content1">
				 
				 	{!! Form::open(array('url' => '/account/program-reset', 'class' => 'form-horizontal', 'id' => 'programReset')) !!}
				 	
				 	
				 		<h4>Missed a day or two?</h4>
						<p>
							 You can go back 10 days in your program. Selecting a day below will reset your program to that day.
						</p>
					 
						
					
						<div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
							<div class="col-sm-6">
								{{ Form::select('day', $past_days, null, ['class' => 'form-control']) }}
							</div>

							@if ($errors->has('day'))
								<span class="help-block">
									<strong>{{ $errors->first('day') }}</strong>
								</span>
							@endif
						</div>
					
						<div class="form-group">
						  <div class="col-sm-6">
							<button type="submit" class="btn btn-primary bkgd-primary">Reset Program</button>
						  </div>
						</div>
					 
					{!! Form::close() !!}
					 
				 </div>
					
				@endif
				
			

            </div>{{-- end generic_left --}}

        </div>
    </div>
    

</div>
@endsection


	
	

@section('js')

    <script>
			
			
            
            
		</script>
      
    
@endsection
