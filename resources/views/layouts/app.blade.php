<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="Summer Body Club is a brand new online weight loss subscription program that helps transform bodies from the inside out. Nutrition, behavior and physical help for you!">
@yield('meta')
<title>@yield('title') - Summer Body Club</title>

<!-- SET: FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<!-- END: FAVICON -->

@include('_partials./css')
@yield('css')

<!-- SET: SCRIPTS -->
<script type="text/javascript">
/*
$(document).ready(function() {
	$('.dummy_dev').clone().appendTo('.progress_cnt');
	$('header button').click(function(e) {
	    $('body').toggleClass('fx_head2');
	});
});
*/
</script>
<!-- END: SCRIPTS -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '267105050323847');
fbq('track', "PageView");
@yield('facebook_event_code')
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=267105050323847&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

<body>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1704618459777853',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

@include('_partials.analytics')

<!-- wrapper starts -->
<div class="wrapper"> 
  
  <!-- Header Starts -->
  <header>
    <div class="header header1 col-lg-12">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img12" src="{{ url('/img/logo1.png') }}" width="149" height="60" alt="logo">
                    <img class="img13" src="{{ url('/img/logo1.png') }}" width="149" height="60" alt="logo">
                    </a>
                 </div>
              <div class="collapse navbar-collapse clearfix" id="myNavbar">
                <ul class="nav navbar-nav budden_1">
                  <li><a href="{{ url('/home') }}">PERSONAL DASHBOARD </a></li>
                  <li class="last"><a href="{{ url('/about') }}">ABOUT THE PROGRAM</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right budden_2">
                
                	<!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="bkgd-primary">Register</a></li>
						<!-- <li><a href="{{ url('/registration/intro') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/account') }}">Account</a></li>
								<li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
              </div>
            </div>
          </nav>
         
        </div>
      </div>
      <div class="generic_content col-lg-12">

    @yield('content')
    
	</div>
    </div>
  </header>
  <!-- Header ends --> 
  
 
  
  
  
 

  
  @include('_partials.footer')
  
  
</div>
<!-- wrapper ends -->

	 @include('_partials./js')
	 
	 @yield('js')
	 
</body>
</html>