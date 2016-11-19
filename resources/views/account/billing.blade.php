@extends('layouts.onboarding')


@section('title')
	Payment
@endsection

@section('content')

<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Payment Information</h1>
        </div>
    </div>

	@if (Session::has('message'))
	   <div class="alert alert-danger">{{ Session::get('message') }}</div>
	@endif

    <div class="row row-intro primary">
        <div class="col-md-8 col-md-offset-2">
			<h2>${{ $price or ''}}/Month Subscription</h2>
			<h3>{{ Session::get("AUTHORIZE_TRIAL_MONTHS","0") }} Month Free</h3>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">

                    
                    
                    {{-- Form::open(array('url' => '/registration/question', 'class' => 'form-horizontal', 'id' => 'payment-form')) --}}
				  	{!! Form::model($user, ['url' => '/account/billing', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'payment-form']) !!}
					
							<div class="row">
								<div class="col-sm-12">									
									<h5 class="secondary">BILLING INFO</h5>
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="first_name">First Name</label>
								<div class="col-sm-6">
									{!! Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']) !!}

									@if ($errors->has('first_name'))
										<span class="help-block">
											<strong>{{ $errors->first('first_name') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="last_name">Last Name</label>
								<div class="col-sm-6">
									{!! Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']) !!}

									@if ($errors->has('last_name'))
										<span class="help-block">
											<strong>{{ $errors->first('last_name') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="country">Country</label>
								<div class="col-sm-6">
									{!! Form::select('country', 
									['' => 'Select'],
										null, 
										['id' => 'country', 'class' => 'form-control']) !!}

										@if ($errors->has('country'))
											<span class="help-block">
												<strong>{{ $errors->first('country') }}</strong>
											</span>
										@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="address1">Address</label>
								<div class="col-sm-6">
									{!! Form::text('address1', null, ['id' => 'address1', 'class' => 'form-control']) !!}

									@if ($errors->has('address1'))
										<span class="help-block">
											<strong>{{ $errors->first('address1') }}</strong>
										</span>
									@endif
								</div>
							</div>
				
							<div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="address2"></label>
								<div class="col-sm-6">
									{!! Form::text('address2', null, ['placeholder' => 'Optional', 'id' => 'address2', 'class' => 'form-control']) !!}

									@if ($errors->has('address2'))
										<span class="help-block">
											<strong>{{ $errors->first('address2') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="city">City</label>
								<div class="col-sm-6">
									{!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control']) !!}

									@if ($errors->has('city'))
										<span class="help-block">
											<strong>{{ $errors->first('city') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="state">State / Province</label>
								<div class="col-sm-6">
									{!! Form::select('state', 
										['' => 'Select'],
										null, 
										['id' => 'state', 'class' => 'form-control']) !!}

										@if ($errors->has('state'))
											<span class="help-block">
												<strong>{{ $errors->first('state') }}</strong>
											</span>
										@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="zip">Zip</label>
								<div class="col-sm-6">
									{!! Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control']) !!}

									@if ($errors->has('zip'))
										<span class="help-block">
											<strong>{{ $errors->first('zip') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="phone">Phone</label>
								<div class="col-sm-6">
									{!! Form::text('phone', null, ['placeholder' => 'xxx-xxx-xxxx', 'id' => 'phone', 'class' => 'form-control']) !!}

									@if ($errors->has('phone'))
										<span class="help-block">
											<strong>{{ $errors->first('phone') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<br>
							
							<div class="row">
								<div class="col-sm-12">									
									<h5 class="secondary">PAYMENT INFO</h5>
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('credit_card_number') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_number">Credit Card Number</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="credit_card_number" name="credit_card_number">

									@if ($errors->has('credit_card_number'))
										<span class="help-block">
											<strong>{{ $errors->first('credit_card_number') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('credit_card_code') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_code">Card Security Code</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="credit_card_code" name="credit_card_code">

									@if ($errors->has('credit_card_code'))
										<span class="help-block">
											<strong>{{ $errors->first('credit_card_code') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('credit_card_expiration_month') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_expiration_month">Expiration Month</label>
								<div class="col-sm-6">
									<!--select class="form-control" id="credit_card_expiration_month" name="credit_card_expiration_month">
										<option value="12">December</option>
									</select-->
									{!! Form::select('credit_card_expiration_month', [
										'' => 'Select',
										'01' => 'January',
										'02' => 'February',
										'03' => 'March',
										'04' => 'April',
										'05' => 'May',
										'06' => 'June',
										'07' => 'July',
										'08' => 'August',
										'09' => 'September',
										'10' => 'October',
										'11' => 'November',
										'12' => 'December'
										],
										null, 
										['id' => 'credit_card_expiration_month', 'class' => 'form-control']) !!}

										@if ($errors->has('credit_card_expiration_month'))
											<span class="help-block">
												<strong>{{ $errors->first('credit_card_expiration_month') }}</strong>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('credit_card_expiration_year') ? ' has-error' : '' }}">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_expiration_year">Expiration Year</label>
								<div class="col-sm-6">
									<!--select class="form-control" id="credit_card_expiration_year" name="credit_card_expiration_year">
										<option value="2015">2015</option>
									</select-->
									{!! Form::selectRange('credit_card_expiration_year', 2016, 2026, null, array('id' => 'credit_card_expiration_year', 'class' => 'form-control')) !!}

									@if ($errors->has('credit_card_expiration_year'))
										<span class="help-block">
											<strong>{{ $errors->first('credit_card_expiration_year') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<br>
					
							<div class="row row-text">
								<div class="col-sm-12">									
									<h5 class="secondary">SUBSCRIPTION TERMS</h5>
									<p>
										<strong>Automatic Renewal and Cancellation:</strong>  You agree that your subscription automatically renews at the end of your initial payment plan and that you will be charged at the standard monthly fee (currently ${{ $price }}) until you cancel.
										You can cancel at any time by visiting http://www.summerbodyclub.com/cancel
									</p>
									<p>
										<strong>Terms and Conditions:</strong>  You understand that your subscription is goverend by the Subscription Agreement.  You acknowledge our Privacy Policy and Notice of Privacy Practices.
									</p>
								</div>
							</div>
					
							<div class="form-group{{ $errors->has('agree') ? ' has-error' : '' }} row-text">
								<div class="col-sm-12">
									{!! Form::checkbox('agree', '1') !!}
									By checking this box, you acknowledge that you have read and agree to be bound by the terms avoce, including the Subscription Agreement.

									@if ($errors->has('agree'))
										<span class="help-block">
											<strong>{{ $errors->first('agree') }}</strong>
										</span>
									@endif
								</div>
							</div>
					
							<div class="form-group row-text">
								<div class="col-sm-12">
								{!! Form::checkbox('optin', '1', true) !!}
								I would like to receive newsletter, offers, and other updates.
								</div>
							</div>
							
							
							<input type="hidden" id="old_country_value" value="{{ old('country') }}"></input>
							<input type="hidden" id="old_state_value" value="{{ old('state') }}"></input>

					
							<div class="form-group">
							  <div class="col-sm-offset-5 col-sm-4">
								<button type="submit" class="btn btn-primary bkgd-primary btn-block">Process Payment</button>
							  </div>
							</div>
							
					
			{!! Form::close() !!}
               
            </div>
        </div>
    </div>
    
</div>


<script type="text/javascript">
	window.onload=function(e){

		var old_country_value=$("#old_country_value").val()||"US";
		var old_state_value=$("#old_state_value").val();		
			
		var city_object={};
		$.getJSON("{{ url('/js/data.json') }}",function(data){

			var country_str="<option value=''>Select</option>";
			$.each(data,function(k,v){
				country_str+="<option value='"+v.countryShortCode+"'>"+v.countryName+"</option>";
				city_object[v.countryShortCode]=v.regions;
			});	
			
			$("#country").html(country_str);			
			$("#country").val(old_country_value).trigger("change");
						
			if(old_state_value)
			{
				setTimeout(function(){ 				
					$("#state").val(old_state_value);
				},400);
			}
			
		});

		$("#country").on("change",function(e){

			var country=$(this).val();
			var state_names=city_object[country];			
			var state_str="";
			$.each(state_names,function(k,v){
				state_str+="<option value='"+v.shortCode+"'>"+v.name+"</option>";
			});

			$("#state").html(state_str);
		});
	}
</script>

@endsection
