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
			$(this).parent('div.btn-holder').html('<input type="submit" name="submit" value="Save" class="btn edit btn-success"><input type="button" name="cancel" value="Cancel" class="btn edit ml-2 btn-danger">');
			self.cancel();
		});
	}
	cancel(){
		// console.log($('[name="cancel"]'));
		var self = this;
		jQuery('[name="cancel"]').on('click', function(){
			var tds_text = JSON.parse(localStorage.getItem('for_cancel'));
			var tds = $(this).parents('body').find('table.main tbody tr td');
			$.each(tds, function(key, td){
				$(td).html(tds_text[$(td).data('name')]);
			});
			$(this).parent('div.btn-holder').html('<input type="button" name="edit" value="Edit" class="btn edit btn-info">');
			self.tdToInput();
		});
	}
}

// localStorage.setItem(key,value); to set

// localStorage.getItem(key); to get.