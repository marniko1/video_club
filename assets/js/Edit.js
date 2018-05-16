class Edit {
	constructor(){
		this.tdToInput();
	}
	tdToInput(){
		console.log($('.edit'));
		jQuery('.edit').on('click', function(e){
			// console.log($(this).parents('body').find('table.main tbody tr td'));
			var tds = $(this).parents('body').find('table.main tbody tr td');
			$.each(tds, function(key, td){
				var text = $(td).text();
				if (text.length > 20) {
					$(td).html('<textarea rows="3" style="width: 100%">'+text+'</textarea>');
				} else {
					$(td).html('<input type="text" name="edit" value="'+text+'" style="width: 100%">');
				}
			});
		});
	}
}