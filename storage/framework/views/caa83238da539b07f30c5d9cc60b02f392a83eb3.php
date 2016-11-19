<?php $__env->startSection('title'); ?>
	<?php echo e($question->question); ?> - Personality Quiz
<?php $__env->stopSection(); ?>

<?php $__env->startSection('facebook_event_code'); ?>
	fbq('track', 'Question<?php echo e($id ? $id : ""); ?>');
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Personality Quiz</h1>
        </div>
    </div>
    
    <div class="row-quiz">
        <div class="col-md-8 col-md-offset-2">
        	<h2><?php echo e($id ? $id : ''); ?>: <?php echo e($question->question); ?></h2>
           
				<div class="row">
                    <?php echo Form::open(array('url' => '/registration/question/'.$id, 'class' => 'form-inline', 'id' => 'question')); ?>

					
							
							  <div class="col-sm-6">
								<input type="submit" name="yes" class="btn btn-primary btn-lg btn-block bkgd-primary" value="Yes">
							  </div>
							
							  <div class="col-sm-6">
								<input type="submit" name="no" class="btn btn-default btn-lg btn-block bkgd-secondary" value="No">
							  </div>
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">															
							<input type="hidden" name="question_id" value="<?php echo e($question->id); ?>">
							<input type="hidden" name="question_group" value="<?php echo e($question->group); ?>">
					<?php echo Form::close(); ?>

				</div>	
             
        </div>
    </div>
					
	<div class="clear"></div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.onboarding', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>