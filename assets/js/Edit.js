class Edit {
	constructor(){
		this.tdToInput();
	}
	tdToInput(){
		var self = this;
		jQuery('.edit').on('click', function(){
			var tds = $(this).parents('body').find('table.main tbody tr td');
			var data_to_store = {};
			$.each(tds, function(key, td){
				var text = $(td).text();
				data_to_store[$(td).data('name')] = text;
				if (text.length > 20) {
					$(td).html('<textarea rows="3" style="width: 100%" name="'+$(td).data('name')+'">'+text+'</textarea>');
				} else {
					$(td).html('<input type="text" value="'+text+'" style="width: 100%" name="'+$(td).data('name')+'">');
				}
			});
			localStorage.removeItem('for_cancel');
			localStorage.setItem('for_cancel', JSON.stringify(data_to_store));
			var path = self.makeFormActionPath($(this).parents('form'), 'edit');
			$(this).parents('form').attr('action', root_url + path);
			$(this).parent('div.btn-holder').html('<input type="submit" name="submit" value="Save" class="btn edit btn-success"><input type="button" name="cancel" value="Cancel" class="btn edit ml-2 btn-danger">');
			self.cancel();
		});
	}
	cancel(){
		var self = this;
		jQuery('[name="cancel"]').on('click', function(){
			var tds_text = JSON.parse(localStorage.getItem('for_cancel'));
			var tds = $(this).parents('body').find('table.main tbody tr td');
			$.each(tds, function(key, td){
				$(td).html(tds_text[$(td).data('name')]);
			});
			var path = self.makeFormActionPath($(this).parents('form'), 'remove');
			$(this).parents('form').attr('action', root_url + path);
			$(this).parent('div.btn-holder').html('<input type="button" name="edit" value="Edit" class="btn edit btn-info"><input type="submit" name="delete" value="Remove client" class="btn btn-danger ml-1">');
			self.tdToInput();
		});
	}
	makeFormActionPath(form, action){
		var path = '';
		if ($(form).attr('action').indexOf('Clients') >= 0) {
			if (action == 'remove') {
				path =  'Clients/removeClient';
			} else {
				path =  'Clients/editClientData';
			}
		} else if ($(form).attr('action').indexOf('Films') >= 0) {
			if (action == 'remove') {
				path =  'Films/removeFilm';
			} else {
				path =  'Films/editFilmData';
			}
		}
		return path;
	}
}