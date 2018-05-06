class FormSubmit {
	constructor() {
		this.submit();
	}
	validate() {

	}
	submit() {
		jQuery('.submit').on('click', function(e){
			e.preventDefault();
			var self = this;
			var action_url = $(this).parents('form').attr('action');
			var action_url_arr = action_url.split('/').reverse();
			var method = action_url_arr[0];
			var controller = action_url_arr[1];
			var params = [];
			var checkbox = [];
			var inputs = $(this).parents('div.form-wrapper').find('input');
			// separate checkboxes values of other inputs values
			for (var i = 0; i < inputs.length - 1; i++) {
				if ($(inputs[i]).attr('type') == 'checkbox' && inputs[i].checked) {
					checkbox.push(inputs[i].value);
				} else if ($(inputs[i]).attr('type') != 'checkbox') {
					params.push(inputs[i].value);
				}
			}
			// if there is textarea, add one to the params
			if ($(this).parents('div.form-wrapper').find('textarea').length != 0) {
				params.push($('textarea').val());
			}
			// if there is checkoboxes, add checked to the params
			if (checkbox.length != 0) {
				checkbox = checkbox.toString().replace(/,/g, ', ');
				params.push(checkbox);
			}
			
			$.ajax({
				type: "POST",
				url: root_url + "AjaxCalls/index",
				data: "ajax_fn=submitForm&params=" + JSON.stringify(params) + "&controller=" + controller + "&method=" + method,
				success: function(data){
					var response = JSON.parse(data);
					var keys = Object.keys(response);
					$(self).parents('div.form-wrapper').find('span').text(response[keys[0]]);
					var msg_span = $('div.form-wrapper span');
					if (msg_span.text() == "Success.") {
						$(self).parents('div.form-wrapper').find('input').not(':input[type=submit]').val('');
						$(self).parents('div.form-wrapper').find('textarea').val('');
						$('input:checked').prop('checked', false);
						msg_span.addClass('text-success');
					} else if (msg_span.text() == "Unsuccess.") {
						msg_span.addClass('text-danger');
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
			     	alert("some error"+errorThrown);
			 	}
			});
		});
	}
}