class Validator {
	constructor(form_id) {
		this.fields = $(form_id).find('input, textarea, select');
		this.isValid = true;
		// console.log(this.fields);
	}

	addValidation(field_id, condition, msg){
		var method_name = condition;
		var field_validation = true;
		field_validation = this[condition](field_id);
		if (!field_validation) {
			this.isValid = false;
		}
		// return this.isValid;
	}
	req(field_id){
		console.log('neophodno polje');
		var field_length = $(field_id).val().trim().length;
		if (field_length == 0) {
			return false;
		}
	}
	minLength(field_id){

	}
	maxLength(field_id){

	}
	email(field_id){

	}
}