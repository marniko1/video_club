class Validator {
	constructor(form_id) {
		this.fields = $(form_id).find('input, textarea, select').not(':submit');
		// this.validation(this.fields);
		this.isValid;
		// console.log(this.fields);
	}

	validation(){
		this.isValid = true;
		var self = this;
		$.each(this.fields, function(key, value) {
			$(value).css('box-shadow', 'initial').css('border', '1px solid #ced4da');
			$('span.text-danger').remove();
			var rules = $(value).data().validationRules.split(',');
			$.each(rules, function(k, v){
				if (v.trim().indexOf('=') == -1) {
					if (!self[v](value)) {
						$(value).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
						$(value).after('<span clas="text-danger">'+$(value).data().validationErrMsg+'</span>');
						self.isValid = false;
					}
				} else {
					if (!self[v.split('=')[0]](value, v.split('=')[1])) {
						$(value).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
						$(value).after('<span clas="text-danger">'+$(value).data().validationErrMsg+'</span>');
						self.isValid = false;
					}
				}
			});
		});
		return this.isValid;
	}
	req(field){
		var field_length = $(field).val().trim().length;
		if ($(field).val().trim().length == 0) {
			return false;
		}
		return true;
	}
	minLength(field, rule){
		if ($(field).val().trim().length < rule) {
			return false;
		}
		return true;
	}
	maxLength(field, rule){
		if ($(field).val().trim().length > rule) {
			return false;
		}
		return true;
	}
	email(field){
		var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		return emailReg.test($(field).val().trim());
		// return true;
	}
	checked(field){

	}
	addValidation(field_id, rule, msg){
		if ($(field_id).attr('data-validation-rules')) {
			$(field_id).attr('data-validation-rules', $(field_id).attr('data-validation-rules') + ',' + rule);
		} else {
			$(field_id).attr('data-validation-rules', rule);
		}
		$(field_id).attr('data-validation-err-msg', msg);
	}
}