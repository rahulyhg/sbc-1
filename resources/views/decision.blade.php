@extends('layouts.onboarding')

@section('title')
	You are a {{$program->name}}! - Personality Quiz Results
@endsection

@section('facebook_event_code')
	fbq('track', 'Lead');
@endsection

@section('content')


<div class="header_topmid col-lg-7">

	
			<img src="{{ url('/img/inner1_icon1.png') }}" width="58" height="58" alt="inner1_icon1">

			<div class="row row-intro primary">
				<div class="col-md-10 col-md-offset-1">
					<h2>You are {{ $program->name == 'Navigator' ? 'a ' : 'an ' }}{{$program->name}}!</h2>
				</div>
			</div>
			
			<p>
				{{$program->description}}
			</p>
			
			<small>Sign up now and get instant access to your personalized meals, workouts, and mindset tools.</small>
			
			@if(!Auth::check())
				<a href="{{ url('/register') }}" class="btn btn-primary bkgd-primary" id="signUpButton">Sign Up</a> 
			@else
				<a href="{{ url('/registration/payment') }}" class="btn btn-primary bkgd-primary" id="signUpButton">Continue</a>
			@endif
	
			<div class="clear"></div>
			
			<h6>Not ready to sign up? Check out this video tutorial by the program's author, Cynthia Pasquella and get a glimpse of what the daily program looks like.</h6>
			
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/172837945" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<br><br>

			<ul>
				<li><input class="inp1" type="text" id="userEmail" name="userEmail" placeholder ="Email Address" ></li>
				<li><input class="but1 bkgd-secondary" type="button" name="getSampleDailyProgram" id="getSampleDailyProgram" value="Get Sample Daily Program" onclick="return sendEmail();"></li>
			</ul>
			
			<div id="resultDiv"></div>
			
			<div class="clear"></div>

</div>

<script type="text/javascript">
	function validateEmail(email){
		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(filter.test(email))
			return 'true';
		else
			return 'false';
	}

	function sendEmail(){
		var emailProgram = $('#userEmail').val();
		if(emailProgram == ''){
			alert('Please Provide Email!');
			$('#userEmail').focus();
			return false;
		}else{
			if(validateEmail(emailProgram) != 'true'){
				alert('Please Provide Email!');
				$('#userEmail').focus();
				return false;
			}
		}

		// send ajax
		$.ajax({
			type: "GET",
			url: "send_results_email/"+emailProgram,
			beforeSend:function(){
				var bSend = '<img src="img/ajax/loader.gif" class="img-responsive"> <span style="color:green;">Please Wait...</span>';
				$('#resultDiv').html(bSend);
				$('#getSampleDailyProgram').hide();
				$('#signUpButton').hide();
			},
			success: function(response){
				if(response == '1'){
					var msg = '<span style="color:green;">Email Has Been Sent!</span>';
				}else{
					var msg = '<span style="color:#FF0000;;">'+response+'</span>';
				}
				$('#resultDiv').html(msg);
				$('#getSampleDailyProgram').show();
				$('#signUpButton').show();
			}
		});
	}
</script>

@endsection