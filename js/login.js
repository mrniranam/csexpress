$(function() {

    $('#customer-form-link').click(function(e) {
		$("#customer-form").delay(200).fadeIn(200);
 		$("#staff-form").fadeOut(200);
		$('#staff-active').removeClass('active');
		$('#cus-active').addClass('active');
		e.preventDefault();
	});
	$('#staff-form-link').click(function(e) {
		$('#staff-form').removeClass('hide');
		$("#staff-form").delay(200).fadeIn(200);
 		$("#customer-form").fadeOut(200);
		$('#cus-active').removeClass('active');
		$('#staff-active').addClass('active');
		e.preventDefault();
	});

});