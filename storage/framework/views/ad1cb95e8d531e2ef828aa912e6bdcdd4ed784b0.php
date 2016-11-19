<?php $__env->startSection('title'); ?>
	Measurements
<?php $__env->stopSection(); ?>

<?php $__env->startSection('facebook_event_code'); ?>
	fbq('track', 'Purchase', {value: '<?php echo e(config('global.price')); ?>', currency: 'USD'});
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
.input-unit-section
{
	height: 100%;
	padding: 1px;
	border:none;
	background-color: #eee;
	width: 42px;
	text-align: center;

}
.padding-zero
{
	padding: 0px;
}
input[name="height_feet"],input[name="height_inch"]
{
	width: 50% !important; 
}
input[name="height_cm"]
{
	display: none;
}
</style>



<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Measurements</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<?php if(Session::has('message')): ?>
			   <div class="alert alert-success"><?php echo e(Session::get('message')); ?></div>
			<?php endif; ?>
        </div>
    </div>

    <div class="row row-intro primary">
        <div class="col-md-8 col-md-offset-2">
			<h2>Please tell us a little bit more about yourself so we can personalize the program for you.</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                    <?php echo Form::open(array('url' => '/registration/measurements', 'class' => 'form-horizontal', 'id' => 'measurements')); ?>

					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="weight">Current Weight</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="weight" value="<?php echo e(old('weight')); ?>">
										<div class="input-group-addon padding-zero">
											<select class="input-unit-section" name="weight_unit" id="old_weight_unit">
												<option value="lb">lb</option>
												<option value="kg">kg</option>
											</select>
										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="height">Height</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="height_feet" placeholder="Feet" value="<?php echo e(old('height_feet')); ?>">
										<input type="text" class="form-control" name="height_inch" placeholder="Inches" value="<?php echo e(old('height_inch')); ?>">
										<input type="text" class="form-control" name="height_cm" placeholder="Centimeters" value="<?php echo e(old('height_cm')); ?>">
										<div class="input-group-addon padding-zero">											
											<select class="input-unit-section" id="height_unit" name="height_unit">
												<option value="in">in</option>
												<option value="cm">cm</option>
											</select>

										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="weight_goal">Weight Goal</label>
								<div class="col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" name="weight_goal" value="<?php echo e(old('weight_goal')); ?>">
										<div class="input-group-addon padding-zero">
											<select class="input-unit-section" id="new_weight_unit">
												<option>lb</option>
												<option>kg</option>
											</select>
										</div>
									</div>
								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-5 col-sm-6 ">
								<button type="submit" class="btn btn-primary bkgd-primary btn-block">Continue</button>
							  </div>
							</div>
							
					<?php echo Form::close(); ?>

					
        </div>
    </div>
    
</div>

<script type="text/javascript">
window.onload=function()
{
	$('input[name="height_cm"]').hide();

	$("#old_weight_unit").on("change",function(e){
		$("#new_weight_unit").val($("#old_weight_unit").val());
	});

	$("#new_weight_unit").on("change",function(e){
		$("#old_weight_unit").val($("#new_weight_unit").val());
	});

	$("#height_unit").on("change",function(e){
		if($(this).val()=="cm")
		{
			$('input[name="height_feet"],input[name="height_inch"]').hide();
			$('input[name="height_cm"]').show();
		}
		else
		{
			$('input[name="height_cm"]').hide();
			$('input[name="height_feet"],input[name="height_inch"]').show();
		}
	})
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.onboarding', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>