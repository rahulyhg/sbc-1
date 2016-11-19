<!DOCTYPE html>
<html lang="en">
<head>
<title>Your Weekly {{ $program->name }} Email for Days {{ $first_day_number }} - {{ $last_day_number }}</title>

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
            font-size: 16px !important;
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
	Your Weekly {{ $program->name }} Email for Days {{ $first_day_number }} - {{ $last_day_number }}
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
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                                <td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; padding-top: 0px;" class="padding-copy"> 
                                	Weekly {{ $program->name }} Update
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
 
    @if($program->id == 1)
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;">
            <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
<tr>
<td align="center" valign="top" width="500">
<![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td align="center">
                        <!-- COPY -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" style="font-size: 30px; font-family: Helvetica, Arial, sans-serif; color:#e54b17; padding-top: 30px;">
                                    <p>Your Shopping List for Days {{ $first_day_number }} - {{ $last_day_number }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #603840; padding-top: 0px;">
                                    <p>Here is your weekly Summer Body grocery list, all in one place so there are no surprises. These amounts are for this week's menu as written. Please adjust to your preference or liking. Happy shopping!</p>
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
    </tr><tr>
    <td bgcolor="#ffffff" align="center" style="padding: 15px;">
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
<tr>
<td align="center" valign="top" width="500">
<![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="responsive-table">
            <tr>
                <td align="center">
                    <!-- COPY -->
                    <table width="90%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td bgcolor="#ffffff" width="33%" align="left" valign="top" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; text-decoration: none;">
                                @foreach($ingre as $ingr)

                                @if(isset($ingr['ingrednet']))
                                <table width="100%" style="color:#000;">
                                    <tr style="padding: 8px;">

                                        <td width="100%" style="border-bottom: 1px dotted;
                                                                color: #e54b17;
                                                                font-family: Helvetica, Arial, sans-serif; 
                                                                font-size: 20px;
                                                                font-style: normal;
                                                                font-weight: normal;
                                                                line-height: 0;
                                                                padding: 35px 8px 15px 8px;
                                                                text-align: left;
                                                                margin-top:20px;">
                                            {{isset( $ingr['department'] )? $ingr['department']:''}}		
                                        </td>

                                    </tr>
                                </table>
                                @endif

                                <table width="100%" style="color:#000;">
                                    @if(isset($ingr['ingrednet']))

                                    @foreach($ingr['ingrednet'] as $ingr_data)

                                    <tr style="padding: 8px; border-bottom: 1px dotted #ddd;">

                                        <td width="80%" style="padding: 8px; border-bottom: 1px dotted #ddd;">
												@if(isset($ingr_data['food']))
													<a href="{{url('/program/food/'.$ingr_data['food'])}}">{{isset($ingr_data['name'])?$ingr_data['name']:''}}</a>
												@else
													{{isset($ingr_data['name'])?$ingr_data['name']:''}}
												@endif
                                        </td>

                                        <td width="15%" align="right" style="padding: 8px; border-bottom: 1px solid #ddd;">
                                            @if(isset($ingr_data['total_quantity_w']))
                                            {{-- ---{{convert_to_pound($ingr_data['total_quantity_w']).'  pounds'.'--'.$ingr_data['total_quantity_w'].' oz'}} --}}
                                            {{$ingr_data['total_quantity_w'].' oz'}}
                                            @elseif(isset($ingr_data['total_quantity_s']))
                                            {{ceil($ingr_data['total_quantity_s'])}}
                                            @endif

                                            {{-- ----- Recipe Id : <strong>{{$ingr_data['recipe_ids']}}</strong> --}}
                                        </td>

                                    </tr>

                                    @endforeach

                                    @endif
                                </table>

                                @endforeach

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










<!-- FOOTER -->
@include('emails.partials.footer')

</body>
</html>