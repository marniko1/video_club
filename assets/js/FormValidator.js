class Validator {
	constructor(form_id) {
		this.fields = $(form_id).find('input, textarea, select').not(':submit');
		this.validation(this.fields);
		this.isValid = true;
		// console.log(this.fields);
	}

	validation(fields){
		// var method_name = condition;
		// var field_validation = true;
		// console.log(field_validation);
		var self = this;
		$.each(fields, function(key, value) {
			var rules = $(value).data().validationRules.split(',');
			$.each(rules, function(k, v){
				console.log(v.trim());
			});
			// console.log($(value).data());
			// console.log(rules);
		});
		// if (!this[condition](field_id)) {
		// 	this.isValid = false;
		// }
		// return this.isValid;
	}
	req(field){
		console.log('neophodno polje');
		console.log($(field_id).data());
		var field_length = $(field_id).val().trim().length;
		if (field_length == 0) {
			return false;
		}
		return true;
	}
	minLength(field){

	}
	maxLength(field){

	}
	email(field){

	}
	addValidation(field_id, rule, msg){

	}
}