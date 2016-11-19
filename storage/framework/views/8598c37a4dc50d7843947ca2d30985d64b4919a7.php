<?php $__env->startSection('title'); ?>
	<?php echo e(!isset($workout->day) ? $workout->name . " - Exercise Room" : $workout->name . " - Today's Suggested Workout: "); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
	<meta property="og:site_name"          content="Summer Body Club" />
	<meta property="og:url"                content="<?php echo e(url('/workout/'.$workout->id)); ?>" />
	<meta property="og:type"               content="fitness.course" />
	<meta property="og:title"              content="<?php echo e($workout->name); ?>" />
	<meta property="og:description"        content="<?php echo e(isset($workout->instructions) ? $workout->instructions : 'Personalized Summer Body Club Workout'); ?>" />
	<meta property="og:image"              content="https://s3-us-west-1.amazonaws.com/summerbodyclub/video/<?php echo e($workout->video); ?>.jpg" />
	<meta property="og:image:width"   	   content="960" />
	<meta property="og:image:height"   	   content="540" />
	<meta property="fb:app_id"             content="1704618459777853" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">

 <div class="row">
   <div class="container1">
 
 
 
 
   
	 <div class="generic_left col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-<?php echo e(Session::get('program_id')); ?>">
			 <h1 class="icon-lg-program-<?php echo e(Session::get('program_id')); ?>">
			 	<?php echo e(!isset($workout->day) ? "Exercise Room: " . $workout->name : "Today's Suggested Workout: " . $workout->name); ?>

			 </h1>
		 </div>
		 
		 <?php /*
		 <div class="nav_content1">
			 <p>Generic message explaining the ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
		 </div>
		*/ ?>

   
		<div class="row row-program-activity">
				<div class="col-md-12">					
						

							<h2><?php echo e($workout->name); ?></h2>
							
							<div class="embed-responsive embed-responsive-16by9">
								<iframe src="https://player.vimeo.com/video/<?php echo e($workout->video); ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
							
							<?php if(isset($workout->instructions)): ?>
							<table class="table">
								<tr>
									<td>
										<?php echo e($workout->instructions); ?>

									</td>
								</tr>
							</table>
							<?php endif; ?>
		
			</div>     
		</div>

   
		<div class="row row-program-activity">
				<div class="col-md-12">		
							
							<div class="share-mod">
								You completed a Summer Body workout! Share the great news with your Facebook friends.<br><br>
								<button class="btn btn-fb btn-fb-share" id="shareBtn" ><i class="fa fa-facebook" aria-hidden="true"></i> SHARE ON FACEBOOK</button>
							</div>				
		
			</div>     
		</div>

	 </div>




	 
 </div>

</div>

</div>

<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: '<?php echo e(url("/program/workout/".$workout->id)); ?>',
  }, function(response){});
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>