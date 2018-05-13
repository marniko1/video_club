class Validator {
	constructor() {
		this.fields;
		this.isValid;
		this.checkboxesIsValid;
		this.checkboxes_wrapper_list_with_err = [];
	}

	validation(form){
		this.checkboxes_wrapper_list_with_err = [];
		this.fields = $(form).find('input, textarea, select').not(':submit');
		this.isValid = true;
		this.checkboxesIsValid = false;
		if ($(this.fields).parents('form').has(':checkbox').length != 0) {
			$(this.fields).parents('form').find('.checkbox-wrapper').css('box-shadow', 'none').css('border', 'none');
			this.checkboxes_wrapper_list_with_err.push($(this.fields).parents('form').find('.checkbox-wrapper'));
		}
		var self = this;
		$('span.text-danger').remove();
		$.each(this.fields, function(key, field) {
			if (!$(field).is(':checkbox')) {
				$(field).css('box-shadow', 'initial').css('border', '1px solid #ced4da');
				if ($(field).data().validationRules) {
					var rules = $(field).data().validationRules.split(',');
					var err_msgs = $(field).data().validationErrMsg.split(',');
					$.each(rules, function(k, v){
						if (v.trim().indexOf('=') == -1) {
							if (!self[v](field)) {
								$(field).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
								if ($(field).next('span.text-danger').length == 0) {
									$(field).after('<span class="val text-danger"><small>'+err_msgs[k]+'</small></span>');
								}
								self.isValid = false;
							}
						} else {
							if (!self[v.split('=')[0]](field, v.split('=')[1])) {
								$(field).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
								if ($(field).next('span.text-danger').length == 0) {
									$(field).after('<span class="val text-danger"><small>'+err_msgs[k]+'</small></span>');
								}
								self.isValid = false;
							}
						}
					});
				}
			} else if ($(field).is(':checkbox')){
				if ($(field).data().validationRules) {
					var rule = $(field).data().validationRules;
					var err_msg = $(field).data().validationErrMsg;
					if (self[rule](field)) {
						self.checkboxesIsValid = true;
						var checkbox_wrapper = $('.checkbox-wrapper').has(field);
						$.each(self.checkboxes_wrapper_list_with_err, function(k, v){
							if ($(v).is(checkbox_wrapper)) {
								self.checkboxes_wrapper_list_with_err.splice(k, 1);
							}
						});
					}
				}
			}
		});
		if (!this.checkboxesIsValid && $(this.fields).parents('form').has(':checkbox').length != 0) {
			// console.log('ovde');
			$.each(this.checkboxes_wrapper_list_with_err, function(key, value){
				var checkbox = $(value).find(':checkbox')[0];
				$(value).css('box-shadow', '0 0 0 0.2rem rgba(200, 35, 51, 0.25)').css('border', '1px solid red');
				$(value).after('<span class="val text-danger"><small>'+$(checkbox).data().validationErrMsg+'</small></span>');
			});
			return this.checkboxesIsValid;
		}
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
	}
	checkedOne(field){
		if ($(field).is(':checked')) {
			return true;
		}
		return false;
	}
	paternVal(field, rule){
		
	}
	addValidation(field_id, rule, msg){
		if ($(field_id).attr('data-validation-rules')) {
			$(field_id).attr('data-validation-rules', $(field_id).attr('data-validation-rules') + ',' + rule);
		} else {
			$(field_id).attr('data-validation-rules', rule);
		}
		if ($(field_id).attr('data-validation-err-msg')) {
			$(field_id).attr('data-validation-err-msg', $(field_id).attr('data-validation-err-msg') + ',' + msg);
		} else {
			$(field_id).attr('data-validation-err-msg', msg);
		}
	}
}