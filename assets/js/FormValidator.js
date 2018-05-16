class Validator {
	constructor() {
		this.fields;
		this.isValid;
		this.checkboxesIsValid;
		this.checkboxes_wrapper_list_with_err = [];
		this.fieldsValidation = {};
		this.valErrMsgs = {
						'req': 'This field cannot be left blank.',
						'minLength': 'Minimum length $value chars.',
						'maxLength': 'Maximum length $value chars.',
						'email': 'Enter valid email.',
						'checkedOne': 'At list one genre must be selected.'
						};
		this.errMsg = '';
	}

	validation(form){
		this.checkboxes_wrapper_list_with_err = [];
		this.fields = $(form).find('input, textarea, select').not(':submit');
		this.isValid = true;
		var self = this;
		// presumation that all checkboxes in form are not valid, so put all checkboxes-wrappers in the black list 
		$.each($(this.fields).parents('form').find('.checkbox-wrapper'), function(key, value){
			self.checkboxes_wrapper_list_with_err.push(value);
		});
		// later, bellow, remove each of this elements from black list if checkboxes validation is true
		$('span.text-danger').remove();
		$.each(this.fields, function(key, field) {
			if (!$(field).is(':checkbox')) {
				$(field).removeClass('err-border');
				if ($(field).attr('id') in self.fieldsValidation) {
					var rules = self.fieldsValidation[$(field).attr('id')];
					$.each(rules, function(k, rule){
						if (rule.trim().indexOf('=') == -1) {
							if (!self[rule](field)) {
								self.errMsg = self.createErrMsg(rule);
								$(field).addClass('err-border');
								if ($(field).next('span.text-danger').length == 0) {
									$(field).after('<span class="val text-danger position-absolute"><small>' + self.errMsg + '</small></span>');
								}
								self.isValid = false;
							}
						} else {
							if (!self[rule.split('=')[0]](field, rule.split('=')[1])) {
								self.errMsg = self.createErrMsg(rule.split('=')[0], rule.split('=')[1]);
								$(field).addClass('err-border');
								if ($(field).next('span.text-danger').length == 0) {
									$(field).after('<span class="val text-danger position-absolute"><small>' + self.errMsg + '</small></span>');
								}
								self.isValid = false;
							}
						}
					});
				}
			} 
			else if ($(field).is(':checkbox')){
				$(field).parents('.checkbox-wrapper').removeClass('err-border');
				$(field).parents('.checkbox-wrapper').find('span.text-danger').remove();
				if ($(field).attr('name') in self.fieldsValidation) {
					var rules = self.fieldsValidation[$(field).attr('name')];
					$.each(rules, function(ke, rule){
						self.errMsg = self.createErrMsg(rule);
						// if checkboxes are valid
						if (self[rule](field)) {
							var checkbox_wrapper = $('.checkbox-wrapper').has(field);
							$.each(self.checkboxes_wrapper_list_with_err, function(k, v){
								if ($(v).is(checkbox_wrapper)) {
									// remove checkboxes wrappers from black list
									self.checkboxes_wrapper_list_with_err.splice(k, 1);
								}
							});
						}
					});
				} else {
					var checkbox_wrapper = $('.checkbox-wrapper').has(field);
					$.each(self.checkboxes_wrapper_list_with_err, function(k, v){
						if ($(v).is(checkbox_wrapper)) {
							self.checkboxes_wrapper_list_with_err.splice(k, 1);
						}
					});
				}
				if (self.checkboxes_wrapper_list_with_err.length != 0 && $(self.fields).parents('form').has(':checkbox').length != 0) {
					$.each(self.checkboxes_wrapper_list_with_err, function(k, wrapper){
						$(wrapper).addClass('err-border');
						if ($(wrapper).find('div.row').next('span.text-danger').length == 0) {
							$(wrapper).find('div.row').after('<span class="val text-danger position-absolute"><small>' + self.errMsg + '</small></span>');
						}
					});
				}
			}
		});
		// if chackboxes wrappers blacklist is empty, checkboxes are valid, skip bellow if
		if (!$.isEmptyObject(this.checkboxes_wrapper_list_with_err)) {
			return false;
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
	addValidation(field_id, rules){
		this.fieldsValidation[field_id] = rules;
	}
	createErrMsg(rule, value=0){
		if (value == 0) {
			return this.valErrMsgs[rule];
		} else {
			return this.valErrMsgs[rule].replace('$value', value)
		}
	}
}