window.onload = function() {

	// makes ajax for pagination and filter
	var controller = window.location.href.split('/').reverse()[1];
	var filter = document.getElementById('filter');
	var pagination_links = document.querySelectorAll(".pagination li a");
	var ajax = new FilterAndPagination(filter, pagination_links, controller);

	// stylize forms on home page
    if (window.location.origin + window.location.pathname == root_url) {
		var first_input = document.querySelector('input');
		first_input.focus();
		jQuery('input').on('click', function(){
			$('div.form-wrapper').removeClass('col-6').addClass('col-3 opacity-5');
			$('div.form-wrapper span').contents().remove();
			$('div.form-wrapper span').removeClass('text-danger text-success');
			$('div.form-wrapper input').not(':input[type=submit]').not($(this).parents('div.form-wrapper').find('input')).val('');
			var input = $('div.form-wrapper input').not(':input[type=submit]').not($(this).parents('div.form-wrapper').find('input'));
			console.log(input);
			// input.style.setProperty('background-color', '#fff', 'important');;
			$('div.form-wrapper input.btn').prop('disabled', true);
			$('div.border').removeClass('border-primary').addClass('border-secondary');
			$(this).parents('div.form-wrapper').removeClass('col-3 opacity-5').addClass('col-6');
			$(this).parents('div.border').removeClass('border-secondary').addClass('border-primary');
			$(this).parents('div.form-wrapper').find('input.btn').removeAttr('disabled');
		});

		// form validate and submit
		var form = new FormSubmit();
		// style for msg span
		var msg_span = $('div.form-wrapper span');
		if (msg_span) {
			if (msg_span.text() == "Success.") {
				msg_span.addClass('text-success');
			} else if (msg_span.text() == "Unsuccess.") {
				msg_span.addClass('text-danger');
			}
		}
	}
}