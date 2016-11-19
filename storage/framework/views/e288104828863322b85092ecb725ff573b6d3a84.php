<?php $__env->startSection('title'); ?>
	Payment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('facebook_event_code'); ?>
	fbq('track', 'AddPaymentInfo');
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="header_topmid header_topmid_heading col-lg-7">
				
    <div class="row row-quiz">
        <div class="col-md-12 text-left">
			<h1>Payment Information</h1>
        </div>
    </div>

	<?php if(Session::has('message')): ?>
	   <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
	<?php endif; ?>

    <div class="row row-intro primary">
        <div class="col-md-8 col-md-offset-2">
			<?php if(Session::get("AUTHORIZE_TRIAL_MONTHS") > 0): ?>
				<h2><?php echo e(Session::get("AUTHORIZE_TRIAL_MONTHS","0")); ?> Month Free Trial</h2>				
				<h3>$<?php echo e(config('global.price')); ?>/Month Thereafter</h3>
				<p>You will not be charged until your free month is up. After your free month, you’ll automatically be charged  $<?php echo e(config('global.price')); ?>/month, on a recurring basis, for your subscription to Summer Body Club. You can cancel your subscription at any time on your account page to stop payments. To cancel during your free trial, simply go to your account page and click “cancel”.</p>
				<p style="font-size:17px">(Price includes all sales tax.)</p>
			<?php else: ?>
				<h2>$<?php echo e(config('global.price')); ?>/Month Subscription</h2>
			<?php endif; ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">

                    
                    
                
				  	<?php echo Form::model($user, ['url' => '/registration/process_payment', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'payment-form']); ?>

				
							<div class="row">
								<div class="col-sm-12">									
									<h5 class="secondary">
										<?php if(Session::get("AUTHORIZE_TRIAL_MONTHS") > 0): ?> PERSONAL INFO
										<?php else: ?> BILLING INFO
										<?php endif; ?>
									</h5>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="first_name">First Name</label>
								<div class="col-sm-6">
									<?php echo Form::text('first_name', null, ['id' => 'first_name', 'class' => 'form-control']); ?>


									<?php if($errors->has('first_name')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('first_name')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="last_name">Last Name</label>
								<div class="col-sm-6">
									<?php echo Form::text('last_name', null, ['id' => 'last_name', 'class' => 'form-control']); ?>


									<?php if($errors->has('last_name')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('last_name')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="country">Country</label>
								<div class="col-sm-6">
									<?php echo Form::select('country', 
									['' => 'Select'],
										null, 
										['id' => 'country', 'class' => 'form-control']); ?>


										<?php if($errors->has('country')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('country')); ?></strong>
											</span>
										<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="address1">Address</label>
								<div class="col-sm-6">
									<?php echo Form::text('address1', null, ['id' => 'address1', 'class' => 'form-control']); ?>


									<?php if($errors->has('address1')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('address1')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
				
							<div class="form-group<?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="address2"></label>
								<div class="col-sm-6">
									<?php echo Form::text('address2', null, ['placeholder' => 'Optional', 'id' => 'address2', 'class' => 'form-control']); ?>


									<?php if($errors->has('address2')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('address2')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="city">City</label>
								<div class="col-sm-6">
									<?php echo Form::text('city', null, ['id' => 'city', 'class' => 'form-control']); ?>


									<?php if($errors->has('city')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('city')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="state">State / Province</label>
								<div class="col-sm-6">
									<?php echo Form::select('state', 
										['' => 'Select'],
										null, 
										['id' => 'state', 'class' => 'form-control']); ?>


										<?php if($errors->has('state')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('state')); ?></strong>
											</span>
										<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="zip">Zip</label>
								<div class="col-sm-6">
									<?php echo Form::text('zip', null, ['id' => 'zip', 'class' => 'form-control']); ?>


									<?php if($errors->has('zip')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('zip')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
								<label class="col-sm-offset-1 col-sm-4 control-label" for="phone">Phone</label>
								<div class="col-sm-6">
									<?php echo Form::text('phone', null, ['placeholder' => 'xxx-xxx-xxxx', 'id' => 'phone', 'class' => 'form-control']); ?>


									<?php if($errors->has('phone')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('phone')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<br>
							
							
							
								<div class="row">
									<div class="col-sm-12">									
										<h5 class="secondary">PAYMENT INFO</h5>
									</div>
								</div>
					
								<div class="form-group<?php echo e($errors->has('credit_card_number') ? ' has-error' : ''); ?>">
									<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_number">Credit Card Number</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="credit_card_number" name="credit_card_number">

										<?php if($errors->has('credit_card_number')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('credit_card_number')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
					
								<div class="form-group<?php echo e($errors->has('credit_card_code') ? ' has-error' : ''); ?>">
									<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_code">Card Security Code</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" id="credit_card_code" name="credit_card_code">

										<?php if($errors->has('credit_card_code')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('credit_card_code')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>

								<div class="form-group<?php echo e($errors->has('credit_card_expiration_month') ? ' has-error' : ''); ?>">
									<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_expiration_month">Expiration Month</label>
									<div class="col-sm-6">
										<!--select class="form-control" id="credit_card_expiration_month" name="credit_card_expiration_month">
											<option value="12">December</option>
										</select-->
										<?php echo Form::select('credit_card_expiration_month', [
											'' => 'Select',
											'01' => 'January',
											'02' => 'February',
											'03' => 'March',
											'04' => 'April',
											'05' => 'May',
											'06' => 'June',
											'07' => 'July',
											'08' => 'August',
											'09' => 'September',
											'10' => 'October',
											'11' => 'November',
											'12' => 'December'
											],
											null, 
											['id' => 'credit_card_expiration_month', 'class' => 'form-control']); ?>


											<?php if($errors->has('credit_card_expiration_month')): ?>
												<span class="help-block">
													<strong><?php echo e($errors->first('credit_card_expiration_month')); ?></strong>
												</span>
											<?php endif; ?>
									</div>
								</div>

								<div class="form-group<?php echo e($errors->has('credit_card_expiration_year') ? ' has-error' : ''); ?>">
									<label class="col-sm-offset-1 col-sm-4 control-label" for="credit_card_expiration_year">Expiration Year</label>
									<div class="col-sm-6">
										<!--select class="form-control" id="credit_card_expiration_year" name="credit_card_expiration_year">
											<option value="2015">2015</option>
										</select-->
										<?php echo Form::selectRange('credit_card_expiration_year', 2016, 2026, null, array('id' => 'credit_card_expiration_year', 'class' => 'form-control')); ?>


										<?php if($errors->has('credit_card_expiration_year')): ?>
											<span class="help-block">
												<strong><?php echo e($errors->first('credit_card_expiration_year')); ?></strong>
											</span>
										<?php endif; ?>
									</div>
								</div>
					
								<br>

							
					
							<div class="row row-text">
								<div class="col-sm-12">									
									<h5 class="secondary">SUBSCRIPTION TERMS</h5>
									<p>
										<strong>Automatic Renewal and Cancellation:</strong>  You agree that your subscription automatically renews at the end of your initial payment plan and that you will be charged at the standard monthly fee (currently $<?php echo e(config('global.price')); ?>) until you cancel.
										You can cancel at any time by visiting http://www.summerbodyclub.com/account
									</p>
									<p>
										<strong>Terms of Service:</strong>  You understand that your subscription is governed by the <a href="<?php echo e(url('/terms-service')); ?>" target="_blank">Terms of Service Agreement.</a>  You acknowledge our <a href="<?php echo e(url('/privacy-policy')); ?>" target="_blank">Privacy Policy</a>.
									</p>
								</div>
						
								<div class="col-sm-12">	
									<textarea class="form-control" rows="5" id="disclaimer" readonly>
The material provided on this website is for educational purposes only. This information on this website has not been evaluated by the FDA and is not intended to treat, diagnose, cure or prevent any disease. The author and publisher are not engaged in rendering medical or psychological advice and this website is solely for informational and educational purposes and is not medical or psychological advice. This information is not intended as a substitute for the advice or medical care of a qualified health care professional and you should seek the advice of your health care professional before undertaking any dietary or lifestyle changes.

The author and publisher make no representation or warranties with respect to the accuracy, applicability, fitness, or completeness of the contents of this plan. Therefore, if you wish to apply ideas contained in this Program, you are taking full responsibility for your actions. The author and publisher specifically disclaim all responsibility for any liability, loss, or risk which is incurred as a consequence, directly or indirectly, of the use and application of any of the contents of this plan. Individuals differ and their results will differ even when using the same program.

All links are for information purposes only and are not warranted for content, accuracy or any other implied or explicit purpose.

The material discussed on this webpage is copyrighted. No part of this may be copied, or changed in any format, sold, or used in any way other than what is outlined within this Plan under any circumstances.
									</textarea>
								</div>
							</div>
					
							<div class="form-group<?php echo e($errors->has('agree') ? ' has-error' : ''); ?> row-text"> 
								<div class="col-sm-12">
									<?php echo Form::checkbox('agree', '1'); ?>

									By checking this box, you acknowledge that you have read and agree to be bound by the Terms of Service, including the Subscription Agreement.

									<?php if($errors->has('agree')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('agree')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
							</div>
					
							<div class="form-group row-text">
								<div class="col-sm-12">
								<?php echo Form::checkbox('optin', '1', true); ?>

								I would like to receive newsletter, offers, and other updates.
								</div>
							</div>
							
							
							<input type="hidden" id="old_country_value" value="<?php echo e(old('country')); ?>"></input>
							<input type="hidden" id="old_state_value" value="<?php echo e(old('state')); ?>"></input>

					
							<div class="form-group">
							  <div class="col-sm-offset-5 col-sm-4">
								<button type="submit" class="btn btn-primary bkgd-primary btn-block">
									<?php if(Session::get("AUTHORIZE_TRIAL_MONTHS") > 0): ?> Activate Free Trial
									<?php else: ?> Process Payment
									<?php endif; ?>
								</button>
							  </div>
							</div>
							
					
			<?php echo Form::close(); ?>

               
            </div>
        </div>
    </div>
    
</div>


<script type="text/javascript">
	window.onload=function(e){

		var old_country_value=$("#old_country_value").val()||"US";
		var old_state_value=$("#old_state_value").val();		
			
		var city_object={};
		$.getJSON("<?php echo e(url('/js/data.json')); ?>",function(data){

			var country_str="<option value=''>Select</option>";
			$.each(data,function(k,v){
				country_str+="<option value='"+v.countryShortCode+"'>"+v.countryName+"</option>";
				city_object[v.countryShortCode]=v.regions;
			});	
			
			$("#country").html(country_str);			
			$("#country").val(old_country_value).trigger("change");
						
			if(old_state_value)
			{
				setTimeout(function(){ 				
					$("#state").val(old_state_value);
				},400);
			}
			
		});

		$("#country").on("change",function(e){

			var country=$(this).val();
			var state_names=city_object[country];			
			var state_str="";
			$.each(state_names,function(k,v){
				state_str+="<option value='"+v.shortCode+"'>"+v.name+"</option>";
			});

			$("#state").html(state_str);
		});
	}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.onboarding', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>