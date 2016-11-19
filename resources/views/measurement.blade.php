@extends('layouts.app')

@section('title')
	Log Your Weight
@endsection

@section('content')

<div class="container">

 <div class="row">
   <div class="container1">
   
		 <div class="generic_left col-xs-12">
 
				 <div class="nav_content1 title_wide" style="@if(Session::has('program_id')) background: url({{ url('img/icon-program-'.Session::get('program_id').'.png') }}) @endif no-repeat left center;">
					<h2>Log Your Weight</h2>
				 </div>
		 
				 <div class="nav_content1">
					 <p>
						 Please remember to log your weight weekly to monitor your progress.
					 </p>
				 </div>
				
				
				@if (Session::has('status'))
					<div class="alert alert-success" role="alert">{{ Session::get('status') }}</div>
				@endif

				{!! Form::open(array('url' => 'measurement', 'class' => 'form-horizontal', 'id' => 'question')) !!}
				
						<input type="hidden" name="weight_unit" value="{{ $weight_unit }}">
	
						<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label" for="weight">Current Weight</label>
							<div class="col-sm-6">
								<div class="input-group">
									<input type="text" class="form-control" name="weight" value="{{ $weight }}"><div class="input-group-addon">{{ $weight_unit }}</div>	
								</div>

								@if ($errors->has('weight'))
									<span class="help-block">
										<strong>{{ $errors->first('weight') }}</strong>
									</span>
								@endif
							</div>
						</div>
	
						<div class="form-group">
						  <div class="col-md-offset-4 col-sm-6">
							<button type="submit" class="btn btn-primary bkgd-primary">Save</button>
						  </div>
						</div>
			
				{!! Form::close() !!}
					
					
				
			
		</div>{{-- end generic_left --}}

	</div>
 </div>
 
</div>
@endsection
