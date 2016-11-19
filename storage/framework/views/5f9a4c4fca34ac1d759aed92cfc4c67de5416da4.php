<?php $__env->startSection('title'); ?>
	Account Information
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div id="message" style="display: none">
					<div id="inner-message" class="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<span></span>
					</div>
			</div>
			
			
 
			 <div class="nav_content">
				 <h1>Account Information</h1>
			 </div>
			 
            <div class="panel panel-default">
                <div class="panel-heading">Personal Info</div>
                
                <div class="panel-body">
                	
					<div id="messagePersonal" style="display: none">
							<div id="inner-message" class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<span></span>
							</div>
					</div>

                    <?php echo Form::open(array('url' => '/', 'class' => 'form-horizontal', 'id' => 'update-info')); ?>


							<div class="form-group">
								<label class="col-sm-4 control-label" for="first_name">First Name</label>
								<div class="col-sm-6">
									<?php echo Form::text('first_name', isset($user->first_name) ? $user->first_name : '' , ['id' => 'first_name', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-4 control-label" for="last_name">Last Name</label>
								<div class="col-sm-6">
									<?php echo Form::text('last_name', isset($user->last_name) ? $user->last_name : '', ['id' => 'last_name', 'class' => 'form-control']); ?>

								</div>
							</div>
					<div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
						<label class="col-sm-4 control-label" for="country">Country</label>
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

					<div class="form-group">
								<label class="col-sm-4 control-label" for="address">Address</label>
								<div class="col-sm-6">
									<?php echo Form::text('address1', isset($user->address1) ? $user->address1 : '', ['id' => 'address1', 'class' => 'form-control']); ?>

								</div>
							</div>
				
							<div class="form-group">
								<label class="col-sm-4 control-label" for="address2"></label>
								<div class="col-sm-6">
									<?php echo Form::text('address2', isset($user->address2) ? $user->address2 : '', ['placeholder' => 'Optional', 'id' => 'address2', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-4 control-label" for="city">City</label>
								<div class="col-sm-6">
									<?php echo Form::text('city', isset($user->city) ? $user->city : '', ['id' => 'city', 'class' => 'form-control']); ?>

								</div>
							</div>

					<div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
						<label class="col-sm-4 control-label" for="state">State / Province</label>
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

					<div class="form-group">
								<label class="col-sm-4 control-label" for="zip">Zip</label>
								<div class="col-sm-6">
									<?php echo Form::text('zip', isset($user->zip) ? $user->zip : '', ['id' => 'zip', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-4 control-label" for="phone">Phone</label>
								<div class="col-sm-6">
									<?php echo Form::text('phone', isset($user->phone) ? $user->phone : '', ['placeholder' => 'xxx-xxx-xxxx', 'id' => 'phone', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-4 col-sm-6">
								<button type="button" class="btn btn-primary bkgd-primary" id="profile_update">Update</button>
							  </div>
							</div>
							
					
			<?php echo Form::close(); ?>

			
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div id="subscription_panel" class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Subscription Info</div>

                <div class="panel-body">
                	
					<div id="messageSubscription" style="display: none">
							<div id="inner-message" class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<span></span>
							</div>
					</div>
			
					<?php if(!empty($subs)): ?>
                    <div class="col-sm-12">
						Subscription renews on <?php echo e($subs->renewal_date); ?><br><br>
					</div>
                    <div class="col-sm-12">
						<button type="button" id="cancel_subs" class="btn btn-primary bkgd-primary">Cancel Subscription</button>
					</div>
						<div id="confirm" class="modal hide fade">
							<div class="modal-body">
								Are you sure?
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Yes</button>
								<button type="button" data-dismiss="modal" class="btn">Cancel</button>
							</div>
						</div>
						<?php else: ?>
						Your subscription has been cancelled. You can continue accessing the site until your next renewal date. After that you can purchase new subscription.
						<?php /*
						<div class="col-sm-8 col-sm-offset-4">
							<button type="button" id="add_subs" class="btn btn-primary bkgd-primary">Add Subscription</button>
						</div>
						*/ ?>
						<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row row-text">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Goals and Preferences</div>
                
                <div class="panel-body">
                	
					<div id="messageGoal" style="display: none">
							<div id="inner-message" class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<span></span>
							</div>
					</div>
                    
                    <?php echo Form::open(array('url' => '/', 'class' => 'form-horizontal', 'id' => 'weight-update')); ?>

					
							<div class="form-group">
								<label class="col-xs-12 col-sm-4 control-label" for="address">Weight Goal</label>
								<div class="col-xs-12 col-sm-5">
								<?php if($user->weight_unit == 'lb'): ?>

										<?php /* */
										$weight=convert_to_lb($user->weight_goal);

										/* */ ?>

									<?php else: ?>
										<?php /* */
                                            $weight=round_kg($user->weight_goal);

                                            /* */ ?>
									<?php endif; ?>
									<?php echo Form::text('weight_goal', isset($weight) ? $weight : '', ['id' => 'height', 'class' => 'form-control']); ?>

									<span id="goal_unit"></span>
									<input type="hidden" name="goal_unit" id="hgoal_unit">
								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-4 col-sm-6">
								<button type="button" id="goal_update" class="btn btn-primary bkgd-primary">Update</button>
							  </div>
							</div>
							
					<?php echo Form::close(); ?>

					
					
					
                    <p>Let us know if you would like to see your weight in pounds or kilograms and measurements in inches or centimeters.</p>
                	
					<div id="messagePreferences" style="display: none">
							<div id="inner-message" class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<span></span>
							</div>
					</div>
                    
                    <?php echo Form::open(array('url' => '/', 'class' => 'form-horizontal', 'id' => 'unit-update')); ?>

					
							<div class="form-group">
								<label class="col-sm-4 control-label" for="address">Weight</label>
								<div class="col-sm-6">
									<?php echo Form::select('weight_unit', [
										'lb' => 'Pounds',
										'kg' => 'Kilograms'
										],
										isset($user->weight_unit)?$user->weight_unit:'',
										['id' => 'weight', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
								<label class="col-sm-4 control-label" for="address">Height</label>
								<div class="col-sm-6">
									<?php echo Form::select('height_unit', [
										'in' => 'Inches',
										'cm' => 'Centimeters'
										],
										isset($user->height_unit)?$user->height_unit:'',
										['id' => 'height', 'class' => 'form-control']); ?>

								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-4 col-sm-6">
								<button type="button" id="pref_update" class="btn btn-primary bkgd-primary">Update</button>
							  </div>
							</div>
						<input type="hidden" id="old_country_value" value="<?php echo e(isset($user->country_id) ? $user->country_id : ''); ?>"></input>
						<input type="hidden" id="old_state_value" value="<?php echo e(isset($user->state_id) ? $user->state_id : ''); ?>"></input>

					<?php echo Form::close(); ?>

					
					
					
                	
					<div id="messageNotifications" style="display: none">
							<div id="inner-message" class="alert">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<span></span>
							</div>
					</div>
					
					<?php echo Form::open(array('url' => '/', 'class' => 'form-horizontal', 'id' => 'notifications-update')); ?>

					
							<div class="form-group">
								<label class="col-xs-12 col-sm-4 control-label" for="address">Email Preferences</label>
								<div class="col-xs-12 col-sm-5">
										
									<div class="checkbox">
										<label>
										  <input type="checkbox" name="notifications" id="notifications" value="<?php echo e($user->notifications); ?>" <?php echo e($user->notifications==1 ? 'checked' : ''); ?>> I would like to receive a daily email with my program's details.
										</label>			    			    
									</div>
									
								</div>
							</div>
					
							<div class="form-group">
							  <div class="col-sm-offset-4 col-sm-6">
								<button type="button" id="notifications_update" class="btn btn-primary bkgd-primary">Update</button>
							  </div>
							</div>
							
					<?php echo Form::close(); ?>

					
					
                </div>
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
var weight_unit=$('#weight').val();
$('#goal_unit').text(weight_unit);
$('#hgoal_unit').val(weight_unit);
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

	$('#weight').on('change',function(){
		var weight_unit= $(this).val();
		//$('#goal_unit').text(weight_unit);
		$('#hgoal_unit').val(weight_unit);
	});
	}


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>