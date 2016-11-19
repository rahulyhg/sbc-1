<?php $__env->startSection('trial'); ?>

	<?php if($number_of_trial_months > 0): ?>
		<h3>Sign up now to receive <?php echo e($number_of_trial_months); ?> Month Free Trial.</h3>
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.welcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>