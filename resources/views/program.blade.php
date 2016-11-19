@extends('layouts.onboarding')

@section('title')
	Your Personalized Program
@endsection

@section('facebook_event_code')
	fbq('track', 'CompleteRegistration');
@endsection

@section('content')




<div class="header_topmid header_topmid_heading header_topmid_program col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Your Personalized Program</h1>
        </div>
    </div>

    <div class="row row-intro primary">
        <div class="col-md-8 col-md-offset-2">
			<h2>Congratulations on starting Summer Body Club Weight Loss Program</h2>
        </div>
    </div>
    
    <div class="row row-intro">
        <div class="col-md-8 col-md-offset-2">
			<h3>Based on your initial answers we recommend that you start with our <strong>{{ $program->name }} Program</strong>.</h3>
			
			<p>{{ $program->description }}</p>
			
			{{--
			<h4>Video tutorial by the program's author, Cynthia Pasquella</h4>
			
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/172837945" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<br><br>
			--}}
			
			<p>For more information please see <a href="{{url('/program/overview')}}">Program Overview</a>.</p>
			
			<hr>
			
			<p>Your personal dashboard will be updated daily with suggested recipes, workout and mindset for the day. Log your weight weekly to stay on track!</p>
			
			<p>If you would like to have your daily program delivered to your email inbox please check the box below.</p>				
			
			<div class="checkbox">
			    <label>
			      <input type="checkbox" name="daily_email" id="daily-email" value="1"> I would like to receive a daily email with my program's details.
			    </label>			    			    
			</div>
			
			<div id="daily-email-status"  class="alert alert-danger" style="display: none;"></div>


			<p><a class="btn btn-primary bkgd-primary btn-block" href="{{ url('/home') }}" role="button">VIEW DASHBOARD</a></p>
        </div>
    </div>
    
</div>


<script type="text/javascript">
	var token="{{csrf_token()}}";	
	window.onload=function(){
		$("#daily-email").on("change",function(e){
			$("#daily-email-status").html("").hide();
			var status=0;
			if($(this).is(":checked"))
			{
				status=1;
			}
			$.ajax({
				url:"user/update_email_preference",
				data:"status="+status+"&_token="+token,
				dataType:"json",
				method:"PUT",
				success:function(data)
				{
					if(data.status=="success")
					{
						$("#daily-email-status").toggleClass("alert-success alert-danger").show().text("Your preference to receive daily emails has been updated.");
					}
				}
			});
		});
	}
</script>

@endsection