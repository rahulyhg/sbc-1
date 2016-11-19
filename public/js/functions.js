$(document).ready(function () {

$('#profile_update').on('click',function(){
$.ajax({
url: 'personal-info',
type: "post",
dataType: "json",
data: $('#update-info').serialize(),
success: function (data) {
	$('#messagePersonal > #inner-message').removeClass();
	$('#messagePersonal > #inner-message').addClass('alert alert-'+data.type);
	$('#messagePersonal > #inner-message').find('span').text(data.message);
	$("#messagePersonal").alert();
	$("#messagePersonal").fadeTo(5000, 500).slideUp(500, function(){
		$("#messagePersonal").alert('close');
	});
}
});

});

$('#goal_update').on('click',function(){
$.ajax({
	url: 'goal-update',
	type: "post",
	dataType: "json",
	data: $('#weight-update').serialize(),
	success: function (data) {
		$('#messageGoal > #inner-message').removeClass();
		$('#messageGoal > #inner-message').addClass('alert alert-'+data.type);
		$('#messageGoal > #inner-message').find('span').text(data.message);
		$("#messageGoal").alert();
		$("#messageGoal").fadeTo(2000, 500).slideUp(500, function(){
			$("#messageGoal").alert('close');
		});
	}
	});
});


$('#pref_update').on('click',function(){
$.ajax({
url: 'preference-update',
type: "post",
dataType: "json",
data: $('#unit-update').serialize(),
success: function (data) {
	$('#messagePreferences > #inner-message').removeClass();
	$('#messagePreferences > #inner-message').addClass('alert alert-'+data.type);
	$('#messagePreferences > #inner-message').find('span').text(data.message);
	$("#messagePreferences").alert();
	$("#messagePreferences").fadeTo(2000, 500).slideUp(500, function(){
		$("#messagePreferences").alert('close');
	});
}
});

});

$('#notifications_update').on('click',function(){
$.ajax({
	url: 'notifications-update',
	type: "post",
	dataType: "json",
	data: $('#notifications-update').serialize(),
	success: function (data) {
		$('#messageNotifications > #inner-message').removeClass();
		$('#messageNotifications > #inner-message').addClass('alert alert-'+data.type);
		$('#messageNotifications > #inner-message').find('span').text(data.message);
		$("#messageNotifications").alert();
		$("#messageNotifications").fadeTo(2000, 500).slideUp(500, function(){
			$("#messageNotifications").alert('close');
		});
	}
	});
});

$('#cancel_subs').on('click',function(e){
 e.preventDefault();
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#delete', function (e) {


$.ajax({
url: 'cancel-subscription',
type: "post",
dataType: "json",
success: function (data) {
	$("#messageSubscription > #inner-message").removeClass();
	$("#messageSubscription > #inner-message").addClass('alert alert-'+data.type);
	$("#messageSubscription > #inner-message").find('span').text(data.message);
	$("#messageSubscription").alert();
	$("#messageSubscription").fadeTo(5000, 500);
}
});
 });
});


	$('#jumpstart').on('click',function(e){
		e.preventDefault();
		$('#confirm').modal({ backdrop: 'static', keyboard: false })
		.on('click', '#delete', function (e) {

			$.ajax({
				url: 'jumpstart',
				type: "post",
				dataType: "json",
				success: function (data) {
					$('#inner-message').removeClass();
					$('#inner-message').addClass('alert alert-'+data.type);
					$('#inner-message').find('span').html(data.message);
					$("#message").alert();
					//$("#message").fadeTo(2000, 500).slideUp(500, function(){
					//	$("#message").alert('close');
					//});
					$("#message").fadeTo(2000, 500);
				}
			});
		
		 });
	});



    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
});

function toggleIcon(e) {

        $(e.target)
            .prev('.panel-heading')
            .find(".icon-fixed-width")
            .toggleClass('fa-plus fa-minus');
    }
    Number.prototype.padDigit = function () {
        return (this < 10) ? '0' + this : this;
    }
    $(document).ready(function(){
    var video_length=0;
 var t1 = "00:00";
       var mins = 0;
       var sec = 0;

        $('input[type="checkbox"]').click(function(){

            if($(this).prop("checked") == true){
//
                    t1 = t1.split(':');
                    var t2=$(this).next('label').find('.video_length').val().split(':');
                    console.log(Number(t1[1]) + Number(t2[1]))
                    sec = Number(t1[1]) + Number(t2[1]);
                                secmin = Math.floor(parseInt(sec / 60));
                                min = Number(t1[0]) + Number(t2[0]) + secmin;
                                            sec = sec % 60;
                                            t1 = min.padDigit() + ':' + sec.padDigit();
                                            console.log(t1);
//                 video_length=parseFloat(video_length)+parseFloat(current_length);


                      $('.total_time').text(t1);


            }

            else if($(this).prop("checked") == false){


              t1 = t1.split(':');
                                  var t2=$(this).next('label').find('.video_length').val().split(':');
                                  console.log(Number(t1[1]) - Number(t2[1]))
                                  sec = Number(t1[1]) - Number(t2[1]);
                                              secmin = Math.floor(parseInt(sec / 60));
                                              console.log(secmin);
                                                hour_carry = 0;
                                                  if(sec < 0){
                                                      sec += 60;
                                                      hour_carry += 1;
                                                  }

                                              min = Number(t1[0]) - Number(t2[0]) - hour_carry;
                                                          sec = sec % 60;
                                                          console.log(min);
                                                          t1 = min.padDigit() + ':' + sec.padDigit();
                                                          console.log(t1);
                                                          $('.total_time').text(t1);
            }

             var warm_total= $('.warm_video').find("[type='checkbox']:checked").length;
                    $('#warm_total').val(warm_total);

                    var cool_down= $('.cooldown').find("[type='checkbox']:checked").length;
                                        $('#cool_down').val(cool_down);

        });


        $('.create_workout').on('click',function(){

        var cool_down = $('#cool_down').val();
        var warm_up= $('#warm_total').val();

                //(warm_up);
               // alert('adfsdff');

        if(cool_down==0 || warm_up==0){
                        $('#inner-message').removeClass();
        					$('#inner-message').addClass('alert alert-danger');
        					$('#inner-message').find('span').html('Select at least one Cool Down and one Warm Up exercise.');
        $("#message").alert();
                       $("#message").fadeTo(5000, 500).slideUp(500, function(){
                      $("#message").alert('close');
                       });
        }else{
        $('#exercise_room').submit();
        }


        });


    });