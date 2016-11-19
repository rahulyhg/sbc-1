@extends('layouts.onboarding')

@section('title')
	Measurements
@endsection

@section('facebook_event_code')
	fbq('track', 'Purchase', {value: '{{ config('global.price') }}', currency: 'USD'});
@endsection

@section('content')

<style>
.input-unit-section
{
	height: 100%;
	padding: 1px;
	border:none;
	background-color: #eee;
	width: 42px;
	text-align: center;

}
.padding-zero
{
	padding: 0px;
}
input[name="height_feet"],input[name="height_inch"]
{
	width: 50% !important; 
}
input[name="height_cm"]
{
	display: none;
}
</style>



<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Measurements</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			@if (Session::has('message'))
			   <div class="alert alert-success">{{ Session::get('message') }}</div>
			@endif
        </div>
    </div>

    <div class="row row-intro primary">
        <div class="col-md-8 col-md-offset-2">
			<h2>Please tell us a little bit more about yourself so we can personalize the program for you.</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                    {!! Form::open(array('url' => '/registration/measurements', 'class' => 'form-horizontal', 'id' => 'measurements')) !!}
					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="weight">Current Weight</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="weight" value="{{ old('weight') }}">
										<div class="input-group-addon padding-zero">
											<select class="input-unit-section" name="weight_unit" id="old_weight_unit">
												<option value="lb">lb</option>
												<option value="kg">kg</option>
											</select>
										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="height">Height</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="height_feet" placeholder="Feet" value="{{ old('height_feet') }}">
										<input type="text" class="form-control" name="height_inch" placeholder="Inches" value="{{ old('height_inch') }}">
										<input type="text" class="form-control" name="height_cm" placeholder="Centimeters" value="{{ old('height_cm') }}">
										<div class="input-group-addon padding-zero">											
											<select class="input-unit-section" id="height_unit" name="height_unit">
												<option value="in">in</option>
												<option value="cm">cm</option>
											</select>

										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="weight_goal">Weight Goal</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="weight_goal" value="{{ old('weight_goal') }}">
										<div class="input-group-addon padding-zero">
											<select class="input-unit-section" id="new_weight_unit">
												<option>lb</option>
												<option>kg</option>
											</select>
										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-5 col-sm-6 ">
								<button type="submit" class="btn btn-primary bkgd-primary btn-block">Continue</button>
							  </div>
							</div>
							
					{!! Form::close() !!}
					
        </div>
    </div>
    
</div>

<script type="text/javascript">
window.onload=function()
{
	$('input[name="height_cm"]').hide();

	$("#old_weight_unit").on("change",function(e){
		$("#new_weight_unit").val($("#old_weight_unit").val());
	});

	$("#new_weight_unit").on("change",function(e){
		$("#old_weight_unit").val($("#new_weight_unit").val());
	});

	$("#height_unit").on("change",function(e){
		if($(this).val()=="cm")
		{
			$('input[name="height_feet"],input[name="height_inch"]').hide();
			$('input[name="height_cm"]').show();
		}
		else
		{
			$('input[name="height_cm"]').hide();
			$('input[name="height_feet"],input[name="height_inch"]').show();
		}
	})
}
</script>

@endsection
