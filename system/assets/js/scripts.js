
$(function() {

	setTimeout('removeAlerts()', 5000);

	$('.thrown-error').on('click', function() {
		$(this).fadeOut();
		return false;
	});

	$('.thrown-warning').on('click', function() {
		$(this).fadeOut();
		return false;
	});

	$('.thrown-success').on('click', function() {
		$(this).fadeOut();
		return false;
	});

});

function removeAlerts()
{
	$('.thrown-error').fadeOut();
	$('.thrown-warning').fadeOut();
	$('.thrown-success').fadeOut();
}