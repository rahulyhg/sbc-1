<?php $__env->startSection('title'); ?>
	Program Overview
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <div class="container">

 <div class="row">
   <div class="container1">
   
	 <div class="generic_left col-lg-9  col-md-9  col-sm-8  col-xs-12">
 
		 <div class="nav_content1 title_icon title_wide icon-program-<?php echo e(Session::get('program_id')); ?>">
			 <h1 class="icon-lg-program-<?php echo e(Session::get('program_id')); ?>">Summer Body Club Program Overview</h1>
		 </div>

		 <div class="learn_more learn_more_<?php echo e($phase_number); ?>">
			<p><?php echo e($phase); ?></p>
		 </div>
	 
		 <div class="overview_block overview_block_last">
		 	<h3>
				<?php if($phase_number == 1): ?>
					The goal of the Summer Body Club Jumpstart is to get you headed in the right direction toward maximizing weight loss.
				<?php elseif($phase_number == 2): ?>
					The 5-Day Acceleration follows the 9-Day Jumpstart.
				<?php else: ?>
					<?php if($program->id == 1): ?>
						As a <?php echo e($program->name); ?> you will receive meal plans that have been created especially for you daily!
					<?php else: ?>
						As an <?php echo e($program->name); ?> you can create your own meal plans using the guidelines below.
					<?php endif; ?>
				<?php endif; ?>
			</h3>
		 
		 	<p>
			<?php if($phase_number == 1): ?>
				<?php if($program->id == 1): ?>
					Your meal plans will be designed using the following guidelines below. You will start your day with a smoothie that includes a <a href="<?php echo e(url('/program/food/7')); ?>">plant-based protein powder.</a> This breakfast will serve as your first protein of the day. 
				<?php else: ?>
					Your meal plans should be designed using the following guidelines below. You should start your day with a smoothie that includes a <a href="<?php echo e(url('/program/food/7')); ?>">plant-based protein powder.</a> This breakfast will serve as your first protein of the day. 
				<?php endif; ?>
				
			<?php elseif($phase_number == 2): ?>
				<?php if($program->id == 1): ?>
					Your daily meal plans are designed using the below guidelines.
				<?php else: ?>
					
				<?php endif; ?>
			<?php else: ?>
				<?php if($program->id == 1): ?>
					Your daily meal plans are designed using the below guidelines.
				<?php else: ?>
					
				<?php endif; ?>
			<?php endif; ?>
			</p>
		 </div>
		 
		 <?php if($phase_number == 1): ?>
			 <div class="overview_block">
				<h2>9-Day Summer Body Jumpstart Daily Meal Plan Overview</h2>
				<ol>
					<li><a href="<?php echo e(url('/program/food/8')); ?>">Protein</a> – 3 servings of 3 oz per day</li>
					<li><a href="<?php echo e(url('/program/food/4')); ?>">Healthy Fats</a> – 3 servings per day*</li>
					<li><a href="<?php echo e(url('/program/food/9')); ?>">Vegetables</a> – unlimited</li>
					<li>Water – 8-10 eight ounce glasses per day</li>
				</ol>
			 </div>
		<?php elseif($phase_number == 2): ?>
			 <div class="overview_block">
				<h2>5-Day Acceleration Daily Meal Plan Overview</h2>
				<ol>
					<li>Day 1 & 2 – Same as 9-Day Jumpstart Daily Meal Plan Overview + add in 1 serving of grains*</li>
					<li>Day 3 & 4 - Same as 9-Day Jumpstart Daily Meal Plan Overview + add in 2 servings of fruit** with the grains you added in on Day 1 & 2</li>
					<li>Day 5 – Same as 9-Day Jumpstart Daily Meal Plan Overview + can switch up breakfast to a meal instead of a smoothie in addition to the grains and fruits added on Days 1 – 4.</li>
				</ol>	
			 </div> 
		<?php else: ?>
			 <div class="overview_block">
				<h2>Summer Body Club Daily Meal Plan Overview</h2>
				<ol>
					<li><a href="<?php echo e(url('/program/food/8')); ?>">Protein</a> – 3 servings of 3 oz per day</li>
					<li><a href="<?php echo e(url('/program/food/4')); ?>">Healthy Fats</a> – 3 servings per day*</li>
					<li><a href="<?php echo e(url('/program/food/9')); ?>">Vegetables</a> – unlimited</li>
					<li><a href="<?php echo e(url('/program/food/2')); ?>">Fruits</a> – 2 servings per day**</li>
					<li>Water – 8-10 eight ounce glasses per day</li>
					<li><a href="<?php echo e(url('/program/food/3')); ?>">Grains</a> – 1 serving of ½ cup per day***</li>
				</ol>
			 </div>     
		<?php endif; ?>
		 
		 <div class="overview_block overview_block_last">
			 
			<?php if($phase_number == 1): ?>
			
				* ½ avocado is one serving while one tablespoon of coconut oil is one serving size. Also, one tablespoon of nut butters is one serving while one serving of nuts is a small handful (approximately 10 – 15 nuts).
				<br><br>
			
			<?php elseif($phase_number == 2): ?>
			
				* 1 serving = 1/2 cup of cooked grains; 1 slice of gluten-free bread, 1 medium-sized ear of corn.
				<br><br>
			
				** For whole fruits like apples, oranges, or bananas, a serving size is one medium-size piece. Fruits that need to be sliced and diced
	like pineapple and melon, one serving size is 1/2 cup. One serving of berries is 1/2 cup.
				<br><br>
				
			<?php else: ?>
			
				* ½ avocado is one serving while one tablespoon of coconut oil is one serving size. Also, one tablespoon of nut butters is one serving while one serving of nuts is a small handful (approximately 10 – 15 nuts).
				<br><br>
			
				** For whole fruits like apples, oranges, or bananas, a serving size is one medium-size piece. Fruits that need to be sliced and diced
	like pineapple and melon, one serving size is 1/2 cup. One serving of berries is 1/2 cup.
				<br><br>
				
				*** 1 serving = 1/2 cup of cooked grains; 1 slice of gluten-free bread, 1 medium-sized ear of corn.
				<br><br>
 			
			<?php endif; ?>
 			
 			
 			Some recipes, like a smoothie for breakfast or salad for lunch, work well as one serving.  If you’d like to make enough to feed your partner or family, you can simply double or quadruple the ingredients as needed. Other recipes, mainly entrees, are more convenient when made in a larger batch. This makes cooking for friends or family much easier and you can always split the recipe in half or refrigerate the extra to use as leftovers throughout the week. 
 			<br><br>
 			
			<strong>Considerations for Vegetarians and Vegans:</strong>
			If a meal plan references animal protein, you  can substitute a <a href="<?php echo e(url('/program/food/7')); ?>">plant-based protein</a>  based on the list of Summer Body Friendly Foods.
			
			<br><br>
			
			<strong>Allergies:</strong>
			If you have any allergies to nuts, try unsalted sunflower seeds or pumpkin seeds. If you have any allergies to fish or shellfish, you can substitute with chicken breast or other lean <a href="<?php echo e(url('/program/food/8')); ?>">protein sources.</a>

		 </div>
		 
		 
		 
		 <div class="learn_more learn_more_<?php echo e($phase_number); ?>">
		 	<p>Core Concepts of The Summer Body Club</p>
		 </div>
	 
		 <div class="overview_block overview_block_last">
			<ol>
				<li>Eat only real food that’s as close to its natural state as possible (i.e. rather than eating canned tomatoes, reach for real ones from the produce aisle!) while avoiding processed foods.</li>
				<li>Avoid gluten when possible</li>
				<li>Avoid dairy when possible</li>
				<li>Avoid sugar except when it occurs naturally (example: fruit)</li>
				<li>Allow yourself 3 glasses or fewer of red wine per week and up to 1 toxin-free caffeinated beverage per day, non-toxic coffee or green or black tea</li>
				<li>Aim to get 40 grams of fiber per day</li>
				<li>Stick to specified portion sizes</li>
				<li>Eat 3 meals a day, 4 – 6 hours apart, and enjoy a snack only if needed</li>
				<li>Stay hydrated – 8-10 eight ounce glasses per day</li>
				<li>Enjoy the highest quality food possible (example: grass-fed beef, organic vegetables, pasture-raised eggs, cage-free, organic, non-GMO eggs)</li>
				<li>Eat when you’re hungry and stop when you’re full, regardless of the specified portion sizes. In other words, if you are full, then you don’t need to eat the full portion size of food.</li>
				<li>Calories are not measured. If you follow the Summer Body Club weight loss plan as it’s designed, you will have optimal energy for workouts and weight loss will occur naturally.</li>
			</ol>	
		 </div>
		 
		 <div class="learn_more learn_more_<?php echo e($phase_number); ?>">
		 	<p>Summer Body Friendly Foods</p>
		 </div>
	 
		 <div class="overview_block">
			<ol>
				<li><a href="<?php echo e(url('/program/food/8')); ?>">Protein</a></li>
				<li><a href="<?php echo e(url('/program/food/9')); ?>">Vegetables</a></li>
				<li><a href="<?php echo e(url('/program/food/2')); ?>">Fruit</a></li>
				<li><a href="<?php echo e(url('/program/food/7')); ?>">Plant-based protein powder</a></li>
				<li><a href="<?php echo e(url('/program/food/6')); ?>">Plant-based milks, unsweetened</a> </li>
				<li><a href="<?php echo e(url('/program/food/1')); ?>">Beans and legumes</a></li>
				<li><a href="<?php echo e(url('/program/food/5')); ?>">Nuts and Seeds</a></li>
				<li><a href="<?php echo e(url('/program/food/3')); ?>">Grains</a></li>
				<li><a href="<?php echo e(url('/program/food/4')); ?>">Healthy fats</a></li>
			</ol>	
		 </div>
		 
		 <div class="overview_block overview_block_last" id="summer">
			<h2>Add Some Summer Spice</h2>
			<h3>Spice up your meals with these yummy additions: </h3>
			<div class="row row-text-list">
				<div class="col-sm-4">
					- Apple cider vinegar<br>
					- Balsamic vinegar<br>
					- Herbs<br>
					- Spices<br>
					- Black pepper<br>
					- Coconut aminos<br>
				</div>
				<div class="col-sm-4">
					- Sea salt<br>
					- Dijon mustard<br>
					- Mustard<br>
					- Dairy-free mayonnaise<br>
					- Garlic powder<br>
				</div>
				<div class="col-sm-4">
					- Onion powder<br>
					- Ginger powder<br>
					- Nutritional yeast<br>
					- Gluten-free soy sauce<br>
					- Stevia (liquid)<br>
				</div>
			</div>	
		 </div>

	 </div>

 
 
 
	 <div class="generic_right col-lg-3  col-md-3  col-sm-4  col-xs-12">
 
		
	
	 </div>
	 
	 
	 
 </div>
 
 

 </div>
 </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>