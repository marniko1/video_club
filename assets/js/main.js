window.onload = function() {

	// makes ajax for pagination and filter
	var controller = window.location.href.split('/').reverse()[1];
	var filter = document.getElementById('filter');
	var pagination_links = document.querySelectorAll(".pagination li a");
	var ajax = new FilterAndPagination(filter, pagination_links, controller);

	// stylize forms on home page
    if (window.location.pathname == '' || window.location.pathname == '/homework/video_club/') {
		var first_input = document.querySelector('input');
		first_input.focus();
		jQuery('input').on('click', function(){
			$('div.form-wrapper').removeClass('col-6').addClass('col-3 opacity-5');
			$('div.border').removeClass('border-primary').addClass('border-secondary');
			$(this).parents('div.form-wrapper').removeClass('col-3 opacity-5').addClass('col-6');
			$(this).parents('div.border').removeClass('border-secondary').addClass('border-primary');
		});
		// style for msg span
		var msg_span = $('div.form-wrapper span');
		console.log(msg_span);
		if (msg_span) {
			if (msg_span.text() == "Success.") {
				msg_span.addClass('text-success');
			} else {
				msg_span.addClass('text-danger');
			}
		}
	}
}