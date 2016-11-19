<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="Summer Body Club is a brand new online weight loss subscription program that helps transform bodies from the inside out. With daily healthy meal plans, at home workouts, and motivational mindsets, Summer Body Club is the last diet you’ll ever need. Join the club and start losing weight now!">
	<meta property="og:site_name"          content="Summer Body Club" />
	<meta property="og:url"                content="<?php echo e(url('/')); ?>" />
	<meta property="og:title"              content="Want to lose weight? Get a summer body all year long with Summer Body Club!" />
	<meta property="og:description"        content="Summer Body Club is a brand new online weight loss subscription program that helps transform bodies from the inside out. With daily healthy meal plans, at home workouts, and motivational mindsets, Summer Body Club is the last diet you’ll ever need. Join the club and start losing weight now!" />
	<meta property="og:image"              content="<?php echo e(url('/img/logo-fb.png')); ?>" />
	<meta property="fb:app_id"             content="1704618459777853" />
<title>Summer Body Club</title>

<!-- SET: FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<!-- END: FAVICON -->

<?php echo $__env->make('_partials.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '267105050323847');
fbq('track', "PageView");
<?php echo $__env->yieldContent('facebook_event_code'); ?>
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=267105050323847&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>

<body class="body_home">

<?php echo $__env->make('_partials.analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- wrapper starts -->
<div class="wrapper"> 
  
  <!-- Header Starts -->
  <header>
    <div class="header col-lg-12">
      <div class="container">
        <div class="row">
          <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="#"><img src="<?php echo e(url('/img/logo.png')); ?>" width="149" height="60" alt="logo"></a> </div>
              <div class="collapse navbar-collapse clearfix" id="myNavbar">
                <ul class="nav navbar-nav budden_1">
                  <li><a href="<?php echo e(url('/home')); ?>">PERSONAL DASHBOARD </a></li>
                  <li class="last"><a href="<?php echo e(url('/about')); ?>">ABOUT THE PROGRAM</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right budden_2">
                  <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>" class="bkgd-primary">Register</a></li>
						<!-- <li><a href="<?php echo e(url('/registration/intro')); ?>" class="">Register</a></li> -->
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->first_name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/account')); ?>">Account</a></li>
								<li><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
              </div>
            </div>
          </nav>

          <div class="banner_in col-sm-7 col-md-7 col-lg-7">
          	<div class="banner_middle col-lg-offset-1 col-lg-11 col-md-10 col-xs-10">
            
			  <!--video_content Starts -->
			  <div class="video_content col-xs-12">
					<h2>Watch our video to learn more about Summer Body Club!</h2>
					
					<div class="embed-responsive embed-responsive-16by9">
						<iframe src="https://player.vimeo.com/video/177311019?autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					
			  </div>
			  <!-- video_content ends --> 
		  
              <h1>Now is Your Chance!</h1>
              <h2>Start Your Journey to Having a Summer Body!</h2>
              <?php echo $__env->yieldContent('trial'); ?>
              <a href="<?php echo e(url('/registration/intro')); ?>">SIGN ME UP</a>
              
            </div>
          </div>
          
          <div class="banner_in col-sm-5 col-md-5 col-lg-5">
            <img src="<?php echo e(url('/img/before-after-animation.gif')); ?>" id="before-after" class="" width="276" height="688" alt="Photos of Before and After Weight Loss Program">
            <div class="caption">*These before/after photos are from real people who followed weight loss plans created by the team behind the Summer Body Club.</div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Header ends --> 
  
  <!--tagline Starts -->
  <div class="tagline col-lg-12">
    <div class="container">
      <div class="row">
		<p>A weight loss program created by the team that has helped millions of people lose millions of pounds.</p>
      </div>
    </div>
  </div>
  <!-- tagline ends --> 
  
  <?php /*
  <!--video_content Starts -->
  <div class="personality_content col-xs-12">
    <div class="container">
      <div class="row">
		<h2>Watch our video to learn more about Summer Body Club!</h2>
		<div class="col-xs-12 col-md-8 col-md-offset-2">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="https://player.vimeo.com/video/172799831" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		 </div>
		</div>
      </div>
    </div>
  </div><br><br>
  <!-- video_content ends --> 
  */ ?>
  
  <!--personality_content Starts -->
  <div class="personality_content col-lg-12">
    <div class="container">
      <div class="row">
		<h2>Which Type of Summer Body Are You?</h2>
		<a href="<?php echo e(url('/registration/intro')); ?>">TAKE THE QUIZ</a>
		<p>What’s your personality got to do with weight loss? Way more than you realize! Take the quiz and get your personalized weight loss plan now!</p>
      </div>
    </div>
  </div>
  <!-- personality_content ends --> 
  
  <!--adventure_content Starts -->
  <div class="adventure_content col-lg-12 clearfix">
    <div class="container">
      <div class="row">
        <div class="adventure1 col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="adven_inner">
            <h3>Here’s how it works: </h3>
            <ol>
              <li>
                <p>Take a dip into our <a href="<?php echo e(url('/registration/intro')); ?>">Summer Body Quiz.</a></p>
              </li>
              <li>
                <p>Crack open your personalized Summer Body plan</p>
              </li>
              <li>
                <p>Surf on over to the <a href="https://www.facebook.com/SummerBodyClub/?fref=ts" target="_blank">Summer Body Club Community</a></p>
              </li>
              <li class="divine">
                <p>Dive into Day 1!</p>
              </li>
         	 </ol>
          </div>
        </div>
        <div class="adventure2 col-md-6 col-sm-6 col-xs-12">
          <p>Whether you’re a chronic yo-yo dieter, have a tough time sticking to a plan, or just looking for a little motivation, we can help you start down a path to your very own Summer Body.
          </p>
          <h4>Navigator</h4>
          <small>A mapped out weight loss program that lets you focus on the important things like fun in the sun, pool parties, and backyard BBQs!</small>
          <h5>Adventurer</h5>
          <small>Receive guidelines on weight loss with the ability to customize your meal plans and workouts so you feel empowered and confident while you’re creating summer adventures! </small> </div>
      </div>
    </div>
  </div>
  <!--adventure_content ends -->  
  
  <!-- meal_content  Starts -->
  <div class="meal_content col-lg-12">
    <div class="container-fluid">
      <div class="row">
        <figure><img src="<?php echo e(url('/img/home-section-meals.jpg')); ?>" width="1170" height="290" alt="img"></figure>
        <div class="meal_middle">
          <div class="container">
            <div class="row">
              <div class="tbl">
                <div class="tbl_cell">
                  <div class="left_meal col-sm-7 col-xs-7">
                    <h2>Meal Plans</h2>
                    <p>Get instant access to the exact foods that have been shown to help you get that Summer Body FAST and learn how to put them together into quick, delicious, mouth-watering meals. And since we’re always in a summer state of mind, we keep the recipes simple so you can toss them together in just minutes! </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- meal_content ends --> 
  
  <!-- workout_content  Starts -->
  <div class="workout_content col-lg-12">
    <div class="container-fluid">
      <div class="row">
        <figure><img src="<?php echo e(url('/img/home-section-workouts.jpg')); ?>" width="1170" height="290" alt="home-section-workouts"></figure>
        <div class="workout_middle">
          <div class="container">
            <div class="row">
              <div class="tbl">
                <div class="tbl_cell">
                  <div class="left_workout col-sm-7 col-xs-7">
                    <h2>Workouts</h2>
                    <p>Receive a custom workout that can be done in just 30 minutes per day! There’s no sweating it out at the gym for hours. These simple workouts have been proven to burn fat while helping you tone up FAST! Plus, they’re so much fun to do you won’t even feel like you’re working out!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- workout_content ends --> 
  
  <!-- meal_content  Starts -->
  <div class="mind_content col-lg-12">
    <div class="container-fluid">
      <div class="row">
        <figure><img src="<?php echo e(url('/img/home-section-mind.jpg')); ?>" width="1170" height="290" alt="home-section-mind"></figure>
        <div class="mind_middle">
          <div class="container">
            <div class="row">
              <div class="tbl">
                <div class="tbl_cell">
                  <div class="left_mind col-sm-7 col-xs-7">
                    <h2>Mindfulness</h2>
                    <p>A Summer Body goes far beyond just what you see in the mirror. It takes a whole new outlook to permanently lose weight. Each day, you’ll learn amazing ways that you can bring about change, from the inside out. Life isn’t always serving up sun-kissed, tropical vacation days, but with the right mental tools, you can learn how to stop the rough waters from rocking your boat!</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- meal_content ends --> 
  
  <!-- maincontent Starts -->
  <div class="main_content col-lg-12">
    <div class="container">
      <div class="row">
        <div class="rock_content col-lg-7"><a href="<?php echo e(url('/registration/intro')); ?>">I’m Ready to Rock a Summer Body!</a>
          <p> $<?php echo e(config('global.price')); ?>/Month - Cancel Anytime</p>
        </div>
      </div>
    </div>
  </div>
  <!-- maincontent ends --> 
  
  <?php echo $__env->make('_partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
</div>
<!-- wrapper ends -->

	 <?php echo $__env->make('_partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>