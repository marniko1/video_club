class FormSubmit {
	constructor() {
		this.submit();
	}
	validate() {

	}
	submit() {
		jQuery('.btn').on('click', function(e){
			e.preventDefault();
			var self = this;
			var action_url = $(this).parents('form').attr('action');
			var action_url_arr = action_url.split('/').reverse();
			var method = action_url_arr[0];
			var controller = action_url_arr[1];
			var params = [];
			var inputs = $(this).parents('div.form-wrapper').find('input');
			for (var i = 0; i < inputs.length - 1; i++) {
				params.push(inputs[i].value);
			}
			// console.log(params);


			$.ajax({
				type: "POST",
				url: "http://localhost:8080/homework/video_club/AjaxCalls/index",
				data: "ajax_fn=submitForm&params=" + JSON.stringify(params) + "&controller=" + controller + "&method=" + method,
				// dataType: 'json',
				success: function(data){
					var response = $.parseJSON(data);
					var keys = Object.keys(response);
					// console.log(response);
					$(self).parents('div.form-wrapper').find('span').text(response[keys[0]]);
					var msg_span = $('div.form-wrapper span');
					if (msg_span.text() == "Success.") {
						$(self).parents('div.form-wrapper').find('input').not(':input[type=submit]').val('');
						msg_span.addClass('text-success');
					} else if (msg_span.text() == "Unsuccess.") {
						msg_span.addClass('text-danger');
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
			     	alert("some error");
			 	}
			});
		});
	}
}