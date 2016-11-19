<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="Summer Body Club is a brand new online weight loss subscription program that helps transform bodies from the inside out. Nutrition, behavior and physical help for you!">
<?php echo $__env->yieldContent('meta'); ?>
<title><?php echo $__env->yieldContent('title'); ?> - Summer Body Club</title>

<!-- SET: FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<!-- END: FAVICON -->
    
<?php echo $__env->make('_partials./css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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

<body class="body_wrap <?php echo $__env->yieldContent('bg'); ?>">

<?php echo $__env->make('_partials.analytics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- wrapper starts -->
<div class="wrapper"> 
  
  <!-- Header Starts -->
  <header>
	<div class="header_top col-lg-12">
		<div class="container">
			<div class="row">
				<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('/img/logo1.png')); ?>" width="147" height="60" alt="logo1"></a> 
				
					<?php echo $__env->yieldContent('content'); ?>
					
			</div>
		</div> 
	</div>
  </header>
  <!-- Header ends --> 
  
  
  
  
  
   
  
</div>
<!-- wrapper ends -->

	 <?php echo $__env->make('_partials./js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	 <script type="text/javascript">
		$(document).ready(function() {
			<?php echo $__env->yieldContent('js'); ?>
		});
	</script>

</body>
</html>

