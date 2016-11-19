<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Shopping List for Days {{ $first_day_number }} - {{ $last_day_number }}</title>

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
h3{border-bottom: 1px dotted;
    color: #e54b17;
    font-family: "Lato-Regular";
    font-size: 20px;
    font-style: normal;
    font-weight: normal;
    line-height: 0;
    margin: 0 0 10px -20px;
    padding: 5px 0 10px;
    text-align: left;
margin-top:20px;}
.table-striped td{
    border-top: 1px solid #ddd;
    line-height: 1.42857;
    padding: 8px;
    vertical-align: top;

}
        .table-striped > tbody > tr:nth-of-type(2n+1) {
            background-color: #f9f9f9;
        }
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
    Your Shopping List for Days {{ $first_day_number }} - {{ $last_day_number }}}
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
                                <td align="center" style="font-size: 30px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; padding-top: 30px;" class="padding-copy">
                                <p>Your Shopping List for Days {{ $first_day_number }} - {{ $last_day_number }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; padding-top: 0px;" class="padding-copy">
                                    <p>Here is your weekly Summer Body grocery list, all in one place so there are no surprises. Happy shopping!</p>
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
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px;" class="padding">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
                <tr>
                    <td align="center" valign="top" width="500">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;" class="responsive-table">
                <tr>
                    <td style="padding: 10px 0 0 0; border-top: 1px dashed #aaaaaa;">
                        <!-- THREE COLUMNS -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" class="mobile-wrapper">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="33%" style="width: 33%;" align="center">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- CENTER COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="33%" style="width: 33%;" align="center">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="33%" style="width: 33%;" align="center">
                                        <tr>
                                            <td style="padding: 0 0 10px 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="right" style="font-family: Arial, sans-serif; color: #333333; font-size: 16px;">

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
</table>





<!-- ONE COLUMN SECTION -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 15px 0 15px 0;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="600" style="max-width: 600px;" class="responsive-table">
                <tr>
                    <td>
                        <!-- COPY -->

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td bgcolor="#ffffff" width="33%" align="left" valign="top" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #e5115a; text-decoration: none;">
                                    @foreach($ingre as $ingr)

                                        @if(isset($ingr['ingrednet']))
                                            <h3 style="border-bottom: 1px dotted;
    color: #e54b17;
    font-family: 'ato-Regular';
                                            font-size: 20px;
                                            font-style: normal;
                                            font-weight: normal;
                                            line-height: 0;
                                            margin: 0 0 10px -20px;
                                            padding: 5px 0 10px;
                                            text-align: left;
                                            margin-top:20px;">{{isset( $ingr['department'] )? $ingr['department']:''}}</h3>
                                        @endif

                                        <table width="100%" class="table table-striped" style="color:#000;">
                                            @if(isset($ingr['ingrednet']))

                                                @foreach($ingr['ingrednet'] as $ingr_data)

                                                    <tr style="padding: 8px; border-top: 1px solid #ddd;">

                                                        <td width="80%">{{isset($ingr_data['name'])?$ingr_data['name']:''}}</td>

                                                        <td width="20%" align="right">
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

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>



<!-- FOOTER -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#ffffff" align="center">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
                <tr>
                    <td style="padding: 70px 0px 20px 0px;" align="center">
                        <!-- FOOTER -->
                        <table width="500" border="0" cellspacing="0" cellpadding="0" align="center" class="responsive-table">
                            <tr>
                                <td align="center" style="font-size: 12px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color:#666666;">
                                    <span class="appleFooter" style="color:#666666;">&copy; Summer Body Club. All rights reserved.<br>[Address]</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>