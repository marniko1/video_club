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
			for (var i = 0; i < inputs.length - 1; i++) {
				if ($(inputs[i]).attr('type') == 'checkbox' && inputs[i].checked) {
					checkbox.push(inputs[i].value);
				} else if ($(inputs[i]).attr('type') != 'checkbox') {
					params.push(inputs[i].value);
				}
			}
			params.push($('textarea').val());
			console.log(params);
			console.log(root_url);
			console.log(controller);
			console.log(method);
			console.log(checkbox);
			console.log(JSON.stringify(params));
			console.log(JSON.stringify(checkbox));



			var httpReq = new XMLHttpRequest ();

			httpReq.open('post', root_url + "AjaxCalls/index");
			httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			httpReq.send("ajax_fn=submitForm&params=" + JSON.stringify(params) + "&controller=" + controller + "&method=" + method + "&checkbox=" + JSON.stringify(checkbox));

			httpReq.onreadystatechange = function(){
				if (httpReq.readyState == 4){
					var response = JSON.parse(this.responseText);
					var keys = Object.keys(response);
					$(self).parents('div.form-wrapper').find('span').text(response[keys[0]]);
					var msg_span = $('div.form-wrapper span');
					if (msg_span.text() == "Success.") {
						$(self).parents('div.form-wrapper').find('input').not(':input[type=submit]').val('');
						$('input:checked').prop('checked', false);
						msg_span.addClass('text-success');
					} else if (msg_span.text() == "Unsuccess.") {
						msg_span.addClass('text-danger');
					}
				}
			}
			// $.ajax({
			// 	type: "POST",
			// 	url: root_url + "AjaxCalls/index",
			// 	data: "ajax_fn=submitForm&params=" + JSON.stringify(params) + "&controller=" + controller + "&method=" + method + "&checkbox=" + JSON.stringify(checkbox),
			// 	// dataType: 'json',
			// 	success: function(data){
			// 		var response = JSON.parse(data);
			// 		var keys = Object.keys(response);
			// 		$(self).parents('div.form-wrapper').find('span').text(response[keys[0]]);
			// 		var msg_span = $('div.form-wrapper span');
			// 		if (msg_span.text() == "Success.") {
			// 			$(self).parents('div.form-wrapper').find('input').not(':input[type=submit]').val('');
			// 			$('input:checked').prop('checked', false);
			// 			msg_span.addClass('text-success');
			// 		} else if (msg_span.text() == "Unsuccess.") {
			// 			msg_span.addClass('text-danger');
			// 		}
			// 	},
			// 	error: function(XMLHttpRequest, textStatus, errorThrown) {
			//      	alert("some error"+errorThrown);
			//  	}
			// });
		});
	}
}