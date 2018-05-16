window.onload = function() {

	// makes ajax for pagination and filter
	var controller = window.location.href.split('/').reverse()[1];
	if (controller.match(/(\d+)/)) {
		controller = window.location.href.split('/').reverse()[2].slice(0, -1);
	}
	var filter = document.getElementById('filter');
	var pagination_links = document.querySelectorAll(".pagination li a");
	var ajax = new FilterAndPagination(filter, pagination_links, controller);

	// stylize forms on home page
    if (window.location.origin + window.location.pathname == root_url) {
    	// form validation
    	var frmvalidator = new Validator($('div.col-6.form-wrapper form'));

    	// add validation rules on fields
    	// add new_client fields validation rules
    	frmvalidator.addValidation('first_name', ['req', 'minLength=3', 'maxLength=20']);
    	frmvalidator.addValidation('last_name', ['req', 'minLength=3', 'maxLength=20']);
    	frmvalidator.addValidation('email', ['req', 'email']);
    	frmvalidator.addValidation('address', ['req', 'minLength=3', 'maxLength=20']);
    	// add new_film fields validation rules
    	frmvalidator.addValidation('title', ['req']);
    	frmvalidator.addValidation('price', ['req']);
    	frmvalidator.addValidation('stock', ['req']);
    	frmvalidator.addValidation("genre[]", ['checkedOne']);
    	frmvalidator.addValidation('description', ['req']);
    	// add new_rental fields validation rules
    	frmvalidator.addValidation('client', ['req']);
    	frmvalidator.addValidation('title1', ['req']);

		new FormSubmit(frmvalidator);
		
		var first_input = document.querySelector('input');
		first_input.focus();
		jQuery('input, textarea').on('click', function(){
			// $('input, textarea').not($(this).parents('div.form-wrapper').find('input, textarea')).css('box-shadow', 'initial').css('border', '1px solid #ced4da');
			$('input, textarea, .checkbox-wrapper').not($(this).parents('div.form-wrapper').find('input, textarea, .checkbox-wrapper')).removeClass('err-border');
			// $('.checkbox-wrapper').not($(this).parents('form').find('.checkbox-wrapper')).css('box-shadow', 'none').css('border', 'none');
			$('span.val').not($(this).parents('div.form-wrapper').find('span.val')).remove();
			$('.checkbox-holder').addClass('d-none');
			$('div.form-wrapper').removeClass('col-6').addClass('col-3 opacity-5');
			$('div.form-wrapper .msg-span').contents().remove();
			$('div.form-wrapper .msg-span').removeClass('text-danger text-success');
			$('div.form-wrapper input').not(':input[type=submit], :input[type=checkbox]').not($(this).parents('div.form-wrapper').find('input')).val('');
			$('div.form-wrapper input.btn').prop('disabled', true);
			$('div.border').removeClass('border-primary').addClass('border-secondary');
			$(this).parents('div.form-wrapper').removeClass('col-3 opacity-5').addClass('col-6');
			$(this).parents('div.border').removeClass('border-secondary').addClass('border-primary');
			$(this).parents('div.form-wrapper').find('input.btn').removeAttr('disabled');
			$(this).parents('div.form-wrapper.col-6').find('.checkbox-holder').removeClass('d-none');
		});
    	// add new rental proposals filters
    	new ShowNewRentalProposals;
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