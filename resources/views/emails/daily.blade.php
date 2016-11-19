<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to Day {{ $current_day }}</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
    table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
    img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

    /* RESET STYLES */
    img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
    table{border-collapse: collapse !important;}
    body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* MOBILE STYLES */
    @media screen and (max-width: 525px) {

        /* ALLOWS FOR FLUID TABLES */
        .wrapper {
          width: 100% !important;
            max-width: 100% !important;
        }

        /* ADJUSTS LAYOUT OF LOGO IMAGE */
        .logo img {
          margin: 0 auto !important;
        }

        /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
        .mobile-hide {
          display: none !important;
        }

        .img-max {
          max-width: 100% !important;
          width: 100% !important;
          height: auto !important;
        }

        /* FULL-WIDTH TABLES */
        .responsive-table {
          width: 100% !important;
        }

        /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
        .padding {
          padding: 10px 5% 15px 5% !important;
        }

        .padding-meta {
          padding: 30px 5% 0px 5% !important;
          text-align: center;
        }

        .padding-copy {
             padding: 10px 5% 10px 5% !important;
          text-align: center;
        }

        .no-padding {
          padding: 0 !important;
        }

        .section-padding {
          padding: 50px 15px 50px 15px !important;
        }

        /* ADJUST BUTTONS ON MOBILE */
        .mobile-button-container {
            margin: 0 auto;
            width: 100% !important;
        }

        .mobile-button {
            padding: 15px !important;
            border: 0 !important;
            font-size: 21px !important;
            display: block !important;
        }

    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Welcome to Day {{ $current_day }} {{ $program->name }}
</div>

<!-- HEADER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="wrapper">
                <!-- LOGO/PREHEADER TEXT -->
                @include('emails.partials.logo')
                <tr>
                    <td style="padding: 20px 0px 0px 0px;" class="logo" align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="90%">
                            <tr>
                                <td bgcolor="#ffffff" width="100" align="center"><a href="{{url('/home')}}" target="_blank"><img alt="Summer Body Club" src="https://s3-us-west-1.amazonaws.com/summerbodyclub/email/email-feature-program-{{ $program->id }}.jpg" width="600" height="376" style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px;" border="0"></a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="responsive-table">
                <tr>
                    <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                                <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; padding-top: 10px;" class="padding-copy"> 
                                	Welcome to <span style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; font-weight: bold; color: #e5115a; padding-top: 10px;">Day {{ $current_day }}</span><br> {{ $program->name }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
   
   
    
    
    
   <!-- WORKOUT SECTION -->  
   <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0 0 24px 0;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
            
            
            
            
                            
                <!-- WORKOUT HEADER -->
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px #aaaaaa; background-color: #e54b17;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="padding: 6px 0 6px 0; font-family: Arial, sans-serif; color: #ffffff; font-size: 21px; font-weight: normal; text-align:center">
															Today's Workout	
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                      
                <!-- WORKOUT IMAGE -->
                <tr>
                    <td style="padding: 0;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="padding: 0; font-family: Arial, sans-serif; color: #ffffff; font-size: 21px; font-weight: normal; text-align:center">
															<img src="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/{{ $workout->video }}.jpg" alt="{{ $workout->name }}" width="600" height="338"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            
            	
            	<!-- WORKOUT -->
                <tr>
                    <td style="padding: 0; border-top: 1px #aaaaaa; background-color: #fff9eb;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="28" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="font-family: Arial, sans-serif; color: #222222; font-size: 16px; font-weight: normal; line-height: 21px;">
                                                        
															@if(!isset($workout->instructions))
																<span style="color:#e54b17; font-weight:bold;">Visit your personal dashboard for selection of workouts.</span><br>
															@endif
															
															@if($program->id == 1)
                                 		
																{{ isset($workout->instructions) ? $workout->instructions : '' }}
										
															@else
									
																As an Adventurer we know you want to build things from scratch. Create your own 30 minute workout from our Exercise Room. 
																You must start with a warm up and you must end with a cool down. And your choice of any 4 cardio, 3 resistance, and 2 abs/core exercises.
																
																<br><br>
																
																<span style="color:#e54b17; font-weight:bold;">Visit Exercise Room and build your workout.</span><br>
										
															@endif
									
															<br><br>
															
															{{--
															<span style="color:#e54b17">New to workouts?</span>
															<span style="color:#222222"><a href="{{ url('/program/workout-prep') }}" style="color: #0a8cce">Try our 5 Day Prep Program</a></span>
															--}}
															
															@if($program->id == 1)
																@if(!isset($workout->id))
																<table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
																	<tr>
																		<td align="center" style="border-radius: 6px;" bgcolor="#faaf06"><a href="{{url('/home')}}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight:bold; color: #ffffff; text-decoration: none; border-radius: 6px; padding: 15px 25px; border: 1px solid #faaf06; display: inline-block; min-width: 186px;" class="mobile-button">Choose Videos</a></td>
																	</tr>
																</table>
																@else
																<table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
																	<tr>
																		<td align="center" style="border-radius: 6px;" bgcolor="#faaf06"><a href="{{url('/program/workout/'.$workout->id)}}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight:bold; color: #ffffff; text-decoration: none; border-radius: 6px; padding: 15px 25px; border: 1px solid #faaf06; display: inline-block; min-width: 186px;" class="mobile-button">View Video</a></td>
																	</tr>
																</table>
																@endif
															@else
																<table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
																	<tr>
																		<td align="center" style="border-radius: 6px;" bgcolor="#faaf06"><a href="{{url('/program/exercise-room')}}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight:bold; color: #ffffff; text-decoration: none; border-radius: 6px; padding: 15px 25px; border: 1px solid #faaf06; display: inline-block; min-width: 186px;" class="mobile-button">View Video</a></td>
																	</tr>
																</table>
															@endif
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                
                
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
       
   <!-- MEALS SECTION --> 
   <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0 0 24px 0;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
            
            
            
            
                            
                <!-- MEALS HEADER -->
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px #aaaaaa; background-color: #e54b17;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="padding: 6px 0 6px 0; font-family: Arial, sans-serif; color: #ffffff; font-size: 21px; font-weight: normal; text-align:center">
															Today's Meals	
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            
            	
            	<!-- MEALS -->
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px #aaaaaa; background-color: #fff9eb;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="28" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="font-family: Arial, sans-serif; color: #222222; font-size: 16px; font-weight: normal; line-height: 21px;">
                                                        
															@if($program->id == 1)
                                    
																@if($recipes->count() == 0)
																	
																	<span style="color:#e54b17; font-weight:bold;">Visit your personal dashboard for selection of workouts.</span><br>
																
																@else
																
																	@foreach ($recipes_other as $recipe)
																		<div class="meals_cnt">
						
							
																					<span style="color:#222222">{{ $recipe->name }}</span>
																					<br><br>
						
								
																		</div>	
																	@endforeach  
				
																	@foreach ($recipes as $recipe_group)
										
																				<span style="color:#e54b17; font-weight:bold;">{{ $recipe_group->first()->meal->name }}:</span><br>
																				@foreach ($recipe_group as $recipe)
																					<span style="color:#222222">{{ $recipe->name }}</span>
																					<br><br>
																				@endforeach 				
										 
																	@endforeach 
																	
																@endif
			
															@else
			
																As an Adventurer you can create your own meal plans using the <a href="{{url('/program/overview')}}" style="color:#222222">Summer Body Club guidelines</a>.
																
																<br><br>
																
																<span style="color:#e54b17; font-weight:bold;">Looking for some ideas? Browse our recipe lounge.</span><br>
			
															@endif
									
															<br><br>
															
															<table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
																<tr>
																	<td align="center" style="border-radius: 6px;" bgcolor="#faaf06"><a href="{{url('/home')}}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight:bold; color: #ffffff; text-decoration: none; border-radius: 6px; padding: 15px 25px; border: 1px solid #faaf06; display: inline-block; min-width: 186px;" class="mobile-button">View Recipes</a></td>
																</tr>
															</table>
															
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                
                
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
   
   
    
    
    
   <!-- MINDSET SECTION -->  
   <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0 0 24px 0;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
            
            
            
            
                           
                <!-- MINDSET HEADER -->
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px #aaaaaa; background-color: #e54b17;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="padding: 6px 0 6px 0; font-family: Arial, sans-serif; color: #ffffff; font-size: 21px; font-weight: normal; text-align:center">
															Today's Mindset	
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            
            	
            	<!-- MINDSET -->
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px #aaaaaa; background-color: #fff9eb;">
                        <!-- ONE COLUMN -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100%;" align="left">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="28" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="font-family: Arial, sans-serif; color: #020202; font-size: 16px; font-weight: normal; line-height: 21px;">
                                                        
															<span style="color:#e54b17; font-weight:bold;">{!! isset($mindset->name) ? nl2br($mindset->name) : "Visit your personal dashboard for today's mindset." !!}</span><br>
															
															@if(isset($mindset->instructions))
																{!! nl2br($mindset->instructions) !!}
															@endif
									
															<br><br>
															
															<table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
																<tr>
																	<td align="center" style="border-radius: 6px;" bgcolor="#faaf06"><a href="{{url('/home')}}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight:bold; color: #ffffff; text-decoration: none; border-radius: 6px; padding: 15px 25px; border: 1px solid #faaf06; display: inline-block; min-width: 186px;" class="mobile-button">Read More</a></td>
																</tr>
															</table>
															
														</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                
                
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    
    @if($current_day % 7 == 0)
   <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px 0 15px 0;" class="section-padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
            <tr>
            <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
                
                <!-- 1 COLUMN --> 
                <tr>
                    <td>
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
								 <td bgcolor="#ffffff" width="100%" align="center">
                   	              	<table width="100%"  border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                        <tr>
                                            <td width="100%" align="center" bgcolor="#fb9132" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; margin: 0 0; padding: 35px 25px;"><a href="{{ url('/measurement') }}" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff;">Remember to log your weight today!</a> This will help you see your progress over time.</td>
                                        </tr>
                                    </table>
                                 </td>
							</tr>									
                        </table> 
                        
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    @endif
   
</table>


@include('emails.partials.footer')

</body>
</html>