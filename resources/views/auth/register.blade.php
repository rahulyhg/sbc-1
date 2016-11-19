@extends('layouts.onboarding')

@section('bg')
	body_wrap_login
@endsection

@section('title')
	Sign Up
@endsection

@section('facebook_event_code')
	fbq('track', 'InitiateCheckout');
@endsection

@section('content')

<div class="header_topmid header_topmid_signup header_topmid_heading col-lg-8">
				


    <div class="row row-signup">
        <div class="col-md-12 text-left">
			<h1>Sign Up</h1>
        </div>
    </div>

    <div class="row row-intro primary">
        <div class="col-md-10 col-md-offset-1">
			<h2>Today is the day to start reaching your goal with your personalized weight loss plan.</h2>
        </div>
    </div>


	<div class="row">
		<div class="col-xs-12 col-md-offset-3 col-md-6">
				
				<a href="{{ url('/fb_redirect/?type=signup') }}" class="btn btn-primary btn-fb btn-block">  Sign Up with Facebook </a>
		
		</div>
	</div>

	 <div class="row">
		<div class="col-xs-5">
			<hr>
		</div>
		<div class="col-xs-2">
			<div class="option_label">OR</div>
		</div>
		<div class="col-xs-5">
			<hr>
		</div>
	</div>
    
    <div class="row">
        <div class="col-sm-12">
            
               @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif

             
					
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="col-sm-12 has-error">
                            @if ($errors->has('dob'))
                                <span class="help-block">
                                    <strong>You must be at least 18 years of age in order to register.</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">First Name</label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">Last Name</label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('birthdate_month') ? ' has-error' : '' }}">
							  <label for="birth_date_month" class="col-sm-offset-1 col-sm-4 control-label">Birthdate</label>
							  <div class="col-sm-6">
								<div class="row">
								  <div class="col-xs-12 col-md-4">
								  	{{-- Form::selectMonth('birthdate_month', null, array('class' => 'form-control')) --}}
								  	{!! Form::select('birthdate_month', array(
										'' => 'Month',
										'1' => 'January',
										'2' => 'February',
										'3' => 'March',
										'4' => 'April',
										'5' => 'May',
										'6' => 'June',
										'7' => 'July',
										'8' => 'August',
										'9' => 'September',
										'10' => 'October',
										'11' => 'November',
										'12' => 'December'
									   ),null, array('class' => 'form-control form-control-row')) !!}
								  </div>
								  <div class="col-xs-12 col-md-4">								  	
									{{-- Form::selectRange('birthdate_day', 1, 31, null, array('class' => 'form-control')) --}}
									{!! Form::select('birthdate_day', array('' => 'Day') + array_combine($r = range(1, 31), $r), null, array('class' => 'form-control form-control-row')) !!}
								  </div>
								  <div class="col-xs-12 col-md-4">									
									{!! Form::select('birthdate_year', array('' => 'Year') + array_combine($r = range(2016, 1915), $r), null, array('class' => 'form-control form-control-row')) !!}
								  </div>
								  
								  @if ($errors->has('birthdate_month'))
								  <div class="col-xs-12">									
								  	<span class="help-block">
                                        <strong>{{ $errors->first('birthdate_month') }}</strong>
                                    </span>
								  </div>
                                 @endif
								  
								  @if ($errors->has('birthdate_day'))
								  <div class="col-xs-12">									
								  	<span class="help-block">
                                        <strong>{{ $errors->first('birthdate_day') }}</strong>
                                    </span>
								  </div>
                                 @endif
								  
								  @if ($errors->has('birthdate_year'))
								  <div class="col-xs-12">									
								  	<span class="help-block">
                                        <strong>{{ $errors->first('birthdate_year') }}</strong>
                                    </span>
								  </div>
                                 @endif
                                 
                                 
                                
								</div>
									<span id="helpBlock" class="help-block"><strong>
										<a tabindex="0" class="text-link" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" 
										data-content="Age, weight, height, etc. are important factors to consider when beginning a weight loss journey. Summer Body Club will collect users' birthdays so we can use their age to inform their customized weight loss plan, goals and progress updates.">
										Why do we collect your date of birth?
										</a>
									</strong></span>
									
								  
							  </div>

                                
						</div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">Gender</label>

                            <div class="col-sm-6">
                         
                            	<div class="radio">
								  <label>
									{!! Form::radio('gender', 'f') !!} Female
								  </label>
                            	</div>
                            	
                            	<div class="radio">
								  <label>
									{!! Form::radio('gender', 'm') !!} Male
								  </label>
                            	</div>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">E-Mail Address</label>

                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">Password</label>

                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-sm-offset-1 col-sm-4 control-label">Confirm Password</label>

                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-6">
                                <button type="submit" class="btn btn-primary bkgd-primary btn-block">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
    
</div>
@endsection

@section('js')
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})
@endsection
