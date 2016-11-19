@extends('layouts.onboarding')

@section('title')
	Do you want to know the secret to achieving lasting weight loss? - Personality Quiz
@endsection

@section('facebook_event_code')
	fbq('track', 'IntroQuestion');
@endsection

@section('content')

<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Personality Quiz</h1>
        </div>
    </div>

	<div class="row row-intro primary" id="introQuestion">
		<div class="col-md-10 col-md-offset-1">
			<h2>Do you want to know the secret to achieving lasting weight loss?</h2>
		</div>
	</div>

    <div class="row-quiz" id="introForm">
        <div class="col-md-8 col-md-offset-2">
        	
           
				<div class="row">
                    {!! Form::open(array('url' => '/registration/intro', 'class' => 'form-inline', 'id' => 'question')) !!}
	
						<div class="clear"></div>
			
						<h6>Fill in your email address below to find out.</h6>

						<ul>
							<li><input class="inp1" type="text" id="userEmail" name="userEmail" placeholder ="Email Address" ></li>
							<li><input class="but1 btn btn-primary bkgd-primary" type="button" name="getSampleDailyProgram" id="getSampleDailyProgram" value="Tell Me" onclick="return sendEmail();"></li>
						</ul>
						
						<div class="clear"></div>
						
					{!! Form::close() !!}
				</div>	
             
        </div>
    </div>

	<div class="row row-intro secondary">
		<div class="col-md-10 col-md-offset-1">
			<div id="introAnswer"></div>
		</div>
	</div>

	<div class="row row-intro secondary" id="introContinue">
		<div class="col-md-10 col-md-offset-1">
			<a href="{{ url('/registration/question/1') }}" class="btn btn-primary bkgd-primary" id="signUpButton">Continue</a>
		</div>
	</div>
					
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
			url: "/save_intro_email/"+emailProgram,
			beforeSend:function(){
				var bSend = '<img src="{{url("/img/ajax/loader.gif")}}" class="img-responsive"> <span style="color:green;">Please Wait...</span>';
				$('#introAnswer').html(bSend);
			},
			success: function(response){
				var msg = '<span>'+response+'</span>';
				$('#introQuestion').hide();
				$('#introForm').hide();
				$('#introContinue').show();
				$('#introAnswer').html(msg);
			}
		});
	}
</script>

@endsection