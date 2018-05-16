class FormSubmit {
	constructor(frmvalidator) {
		this.frmvalidator = frmvalidator;
		this.submit(frmvalidator);
	}
	validate(form) {
		return this.frmvalidator.validation(form);
	}
	submit() {
		var that = this;
		jQuery('.submit').on('click', function(e){
			e.preventDefault();
			if(!that.validate($(this).parents('form'))){
				return;
			}
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
			// if there is textarea, add value of it to the params
			if ($(this).parents('div.form-wrapper').find('textarea').length != 0) {
				params.push($('textarea').val());
			}
			// if there is checkoboxes, add value of checked to the params
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
					console.log(response);
					var keys = Object.keys(response);
					console.log(keys);
					if (keys[0].match(/^msg\d$/)) {
						$(self).parents('div.form-wrapper').find('span.msg-span').text(response[keys[0]]);
						var msg_span = $('div.form-wrapper span');
						if (msg_span.text() == "Success.") {
							$(self).parents('div.form-wrapper').find('input').not(':input[type=submit]').val('');
							$(self).parents('div.form-wrapper').find('textarea').val('');
							$('input:checked').prop('checked', false);
							msg_span.addClass('text-success');
						} else {
							msg_span.addClass('text-danger');
						}
					} else if (keys[0].match(/^unav_film_msg\d$/)){
						$.each(response, function(key, value){
							var key_num = key.replace('unav_film_msg', '');
							$('#title' + key_num).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
							$('#title' + key_num).after('<span class="val text-danger position-absolute"><small>'+value+'</small></span>');
						});
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
			     	alert("some error"+errorThrown);
			 	}
			});

		});
	}
}