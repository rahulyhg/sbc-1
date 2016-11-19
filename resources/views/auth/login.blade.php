@extends('layouts.onboarding')

@section('bg')
	body_wrap_login
@endsection

@section('meta')
	<meta property="og:site_name"          content="Summer Body Club" />
	<meta property="og:url"                content="{{ url('/') }}" />
	<meta property="og:title"              content="I just finished a personalized Summer Body Club workout!" />
	<meta property="og:description"        content="Summer Body Club is a brand new online weight loss subscription program that helps transform bodies from the inside out. Nutrition, behavior and physical help for you!" />
	<meta property="og:image"              content="{{ url('/img/logo-fb.png') }}" />
	<meta property="fb:app_id"             content="1704618459777853" />
@endsection

@section('title')
	A brand new online weight loss subscription program that helps transform bodies from the inside out
@endsection

@section('content')

<div class="header_topmid header_topmid_signup header_topmid_login col-lg-5">

	
			


           
               <div class="row">
					<div class="col-md-12">
							
							<a href="{{ url('/fb_redirect/?type=login') }}" class="btn btn-primary btn-fb btn-block">  Login with Facebook </a>
					
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
					<div class="col-md-12">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input type="email" class="form-control inp1" name="email" value="{{ old('email') }}" placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input type="password" class="form-control inp1" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-group-condensed">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                      
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary btn-block bkgd-primary">
                                   Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                        
                    </form>
                					
                	</div>
				</div>
           
           		<hr>
           		
				<div class="row">
					<div class="col-md-12">
							<a href="{{ url('registration/question/1') }}" class="btn btn-primary btn-lg btn-block bkgd-secondary" role="button">Sign Up</a>
					</div>
				</div>
    
</div>

@endsection
