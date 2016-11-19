<?php $__env->startSection('title'); ?>
Chart for your weight program
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">

	<div class="row">
		<div class="container1">
			<div class="generic_left col-xs-12">
			
				 <div class="nav_content1 title_icon title_wide icon-program-<?php echo e(Session::get('program_id')); ?>">
					 <h1 class="icon-lg-program-<?php echo e(Session::get('program_id')); ?>">Weight Chart</h1>
				 </div>
				 
				<div class="col-md-8 col-xs-12">
					<a id='week' class="btn btn-info">Weekly</a>
					<a id='month' class="btn btn-info">Monthly</a>
					<?php /*<a id='year' class="btn btn-info">Year</a>*/ ?>
				</div>

				<div class="col-md-4 col-xs-12">
					<input type="text" class="form-control pull-right" name="daterange" value="<?php echo $firstday;?> - <?php echo $lastday;?> " />
				</div>
			
    <div id='' style="width:100%;">
       <canvas id="canvas" height="700" width="1170"></canvas>
        <label class="alert alert-success col-md-12" id="main-chart" style="display: none;"></label>
       <!-- <div class="main_goal"><p class="weight_goal">
           My Weight Goal: <?php if($weight_unit == 'lb'): ?>
            <?php echo e(round(convert_to_lb($weight_goal),2)); ?> <?php echo e($weight_unit); ?>

           <?php else: ?>
            <?php echo e(round($weight_goal,1)); ?> <?php echo e($weight_unit); ?>

           <?php endif; ?>
       </P></div> -->
    </div>
	<input type="hidden" value="<?php echo e($weight_unit); ?>" name="weight_unit" id="weight_unit">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js"></script>
    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script>
        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
var weight_unit=$('#weight_unit').val();
            <?php /*var date = new Date();*/ ?>
            <?php /*var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);*/ ?>
            <?php /*var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);*/ ?>
            <?php /*var startDate = moment($.now()).startOf('month').format('YYYY-MM-DD');*/ ?>
            <?php /*var endDate = moment($.now()).endOf('month').format('YYYY-MM-DD');*/ ?>
        <?php /*console.log(startDate+' '+endDate);*/ ?>
//alert(dateFrom);
            $.ajax({
url: 'chart-ajax',
type: "post",
dataType: 'json',
data:{'_token': $('input[name=_token]').val(),'startdate':"<?php echo $firstday?>",'enddate':"<?php echo $lastday?>"},
success: function (data) {
$('#canvas').show();
            console.log(data.data.labels.length);
            if(data.data.labels.length>0){
    data.options.tooltips.callbacks= {
                    label: function(tooltipItems, data1) {
                        if(data1.datasets[tooltipItems.datasetIndex].label=='Weight'){
return data1.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' ' + weight_unit;
}else{
    return 'Weight Goal' +': ' + tooltipItems.yLabel;
}
                    }
                }
     window.myLine = new Chart(ctx, data);



}else{
$('#canvas').hide();
$('#main-chart').show();
$('#main-chart').text('');
    $('#main-chart').append('No Data Found');
}
}

});

$('#month').on('click',function(){
    window.myLine.destroy();
$.ajax({
url: 'chart-ajax-month',
type: "post",
dataType: 'json',
data:{'_token': $('input[name=_token]').val()},
success: function (data1) {
$('#canvas').show();
$('#main-chart').hide();
//console.log(data.options.tooltips);
data1.options.tooltips.callbacks= {
        label: function(tooltipItems, data2) {
            if(data2.datasets[tooltipItems.datasetIndex].label=='Weight'){
return data2.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' ' + weight_unit;
}else{
return 'Weight Goal' +': ' + tooltipItems.yLabel;
}
        }
    }
    var ctx = document.getElementById("canvas").getContext("2d");

window.myLine = new Chart(ctx, data1);
}
});
});

$('#year').on('click',function(){
    window.myLine.destroy();
$.ajax({
url: 'chart-ajax-year',
type: "post",
dataType: 'json',
data:{'_token': $('input[name=_token]').val()},
success: function (data1) {
$('#canvas').show();
$('#main-chart').hide();
//console.log(data.options.tooltips);
data1.options.tooltips.callbacks= {
        label: function(tooltipItems, data2) {
            if(data2.datasets[tooltipItems.datasetIndex].label=='Weight'){
return data2.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' ' + weight_unit;
}else{
return 'Weight Goal' +': ' + tooltipItems.yLabel;
}
        }
    }
    var ctx = document.getElementById("canvas").getContext("2d");

window.myLine = new Chart(ctx, data1);
}
});
});


$('#week').on('click',function(){
    window.myLine.destroy();
$.ajax({
url: 'chart-ajax-week',
type: "post",
dataType: 'json',
data:{'_token': $('input[name=_token]').val()},
success: function (data1) {
$('#canvas').show();
$('#main-chart').hide();
//console.log(data.options.tooltips);
data1.options.tooltips.callbacks= {
        label: function(tooltipItems, data2) {
            if(data2.datasets[tooltipItems.datasetIndex].label=='Weight'){
return data2.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' ' + weight_unit;
}else{
return 'Weight Goal' +': ' + tooltipItems.yLabel;
}
        }
    }
    var ctx = document.getElementById("canvas").getContext("2d");

window.myLine = new Chart(ctx, data1);
}
});
});

var d = new Date();
var startDate;
var endDate;

  $('input[name="daterange"]').daterangepicker({
      locale: {
format: 'YYYY-MM-DD'
},
maxDate:moment(),
minDate:'<?php echo date('Y-m-d',strtotime($created_at));?>'
},
function(start, end) {
console.log("Callback has been called!");
// $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format('D MMMM YYYY'));
startDate = start.format('YYYY-MM-DD');
endDate = end.format('YYYY-MM-DD');
console.log(startDate);
console.log(endDate);
window.myLine.destroy();

$.ajax({
url: 'chart-ajax',
type: "post",
dataType: 'json',
data:{'_token': $('input[name=_token]').val(),'startdate':startDate,'enddate':endDate,'search':'yes'},
success: function (data) {
$('#canvas').show();
$('#main-chart').hide();
            console.log(data.data.labels.length);
            if(data.data.labels.length>0){
    data.options.tooltips.callbacks= {
                    label: function(tooltipItems, data1) {
                        if(data1.datasets[tooltipItems.datasetIndex].label=='Weight'){
return data1.datasets[tooltipItems.datasetIndex].label +': ' + tooltipItems.yLabel + ' ' + weight_unit;
}else{
    return 'Weight Goal' +': ' + tooltipItems.yLabel;
}
                    }
                }
     window.myLine = new Chart(ctx, data);



}else{
$('#canvas').hide();
$('#main-chart').show();
$('#main-chart').text('');    $('#main-chart').append('No Data Found');
}
}

});

});


        };

    </script>
	
        <div class="col-md-12">
            <br>
            <h2>Measurement History</h2>
            <br>
            <ul class="list-group">
                <?php foreach($measurements as $measurement): ?>
                    <li class="list-group-item"><?php echo e(date('M d, Y',strtotime($measurement->date))); ?>

                        <span class="pull-right">
                            <?php if($weight_unit == 'lb'): ?>
                                <?php echo e(round(convert_to_lb($measurement->weight),2)); ?> <?php echo e($weight_unit); ?>

                            <?php else: ?>
                                 <?php echo e(round($measurement->weight,1)); ?> <?php echo e($weight_unit); ?>

                            <?php endif; ?>
                        </span>
                        </li>
                <?php endforeach; ?>

                    <li class="list-group-item">
                <?php echo e(date('M d, Y',strtotime($created_at))); ?>

                        <span class="pull-right">
                            <?php if($weight_unit == 'lb'): ?>
                             <?php echo e(round(convert_to_lb($weight),2)); ?> <?php echo e($weight_unit); ?>

                            <?php else: ?>
                             <?php echo e(round($weight,1)); ?> <?php echo e($x_unit); ?>

                            <?php endif; ?>
                        </span>
                    </li>
            </ul>
        </div>
        
        </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>