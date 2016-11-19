@extends('layouts.app')

@section('title')
	Program Options
@endsection

@section('content')

<div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-xs-12">
 
				 <div class="nav_content1 title_icon title_wide icon-program-{{ Session::get('program_id') }}">
					 <h1 class="icon-lg-program-{{ Session::get('program_id') }}">Summer Body Club Program Options</h1>
				 </div>
		 
				 <div class="nav_content1">
					 <p>
						 You can switch to a different Summer Body Club program by selecting the one that most closely matches your personality.
						 The content of your daily email and dashboard will reflect your new program's parameters but your place in the new program will remain the same. 
						 For example, if you're in day 20 in your current program you will be placed in day 20 in the new program.
					 </p>
				 </div>
	 
		
				<div id="message" style="display: none">
						<div id="inner-message" class="alert">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<span></span>
						</div>

				</div>
				

				

				@if (Session::has('status'))
					<div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
				@endif

				{!! Form::open(array('url' => '/account/program-options', 'class' => 'form-horizontal', 'id' => 'programOption')) !!}
			
						@foreach($programs as $program)
							<div class="form-group{{ $errors->has('option') ? ' has-error' : '' }}">
								<div class="radio col-sm-1">
								  <label>
									{{ Form::radio('option', $program->id, $user_program == $program->id) }}
								  </label>
								</div>
								<div class="col-sm-11">
									<h4>{{ $program->name }} Program</h4>
									{{ $program->description }} 
								</div>
							</div>
						@endforeach
	
						<div class="form-group">
						  <div class="col-md-offset-1 col-sm-11">
							<button type="submit" class="btn btn-primary bkgd-primary">Change Program</button>
						  </div>

							@if ($errors->has('option'))
								<span class="help-block">
									<strong>{{ $errors->first('option') }}</strong>
								</span>
							@endif
						</div>				
	
				{!! Form::close() !!}
			

            </div>{{-- end generic_left --}}

        </div>
    </div>
    

</div>
@endsection
