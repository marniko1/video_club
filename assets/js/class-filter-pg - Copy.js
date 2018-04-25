class filterAndPagination{
	constructor(filter, pagination_links, controller) {
		this.filter = filter;
		this.pagination_links = pagination_links;
		this.controller = controller;
		this.ajaxFilter();
	}
	ajaxFilter() {
		var controller = this.controller;
		if (this.filter) {
			var filter = this.filter;
			var self = this;
			filter.onkeyup = function () {
				var pagination = document.querySelector('.pagination');
				var filter_value = filter.value.trim();
				pagination.classList.remove('invisible');
				if (document.querySelector('.pagination li.active')) {
					document.querySelector('.pagination li.active').classList.remove('active');
				}
				var httpReq = new XMLHttpRequest ();
				var pg = 1;

				httpReq.open('post', 'http://localhost:8080/homework/video_club/AjaxCalls/index');
				httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				httpReq.send('ajax_fn=' + controller.toLowerCase() + 'Filter&search_value='+ filter_value + '&pg=' + pg);

				httpReq.onreadystatechange = function(){
					if (httpReq.readyState == 4){
						var response = JSON.parse(this.responseText);
						var tbody = document.getElementsByTagName('tbody')[0];
						var tbody_html = ``;
						if (response[0].length > 0) {
							tbody_html = self.prepareTbodyHTML(controller, response[0]);
							if (response[1].length == pagination_links.length) {
								for (var i = 0; i < response[1].length; i++) {
									pagination_links[i].classList.remove('d-none');
									pagination_links[i].href = response[1][i][0];
									pagination_links[i].innerText = response[1][i][1];
								}
							} else {
								var diff = pagination_links.length - response[1].length;
								var display_none_counter = 0;
								for (var i = 0; i < pagination_links.length; i++) {
									if (pagination_links[i].classList.contains('d-none')) {
										display_none_counter++;
									}
								}
								if (response[1].length - (pagination_links.length - display_none_counter) > 0) {	
									for (var i = pagination_links.length - display_none_counter; i <= response[1].length; i++) {
										pagination_links[i-1].classList.remove('d-none');
										pagination_links[i].classList.add('d-none');
									}
								} else {
									for (var i = pagination_links.length - 1; i >= response[1].length; i--) {
										pagination_links[i-1].classList.remove('d-none');
										pagination_links[i].classList.add('d-none');
									}
								}
								for (var i = 0; i < response[1].length; i++) {
									pagination_links[i].href = response[1][i][0];
									pagination_links[i].innerText = response[1][i][1];
								}
							}
							tbody.innerHTML = tbody_html;
							for (var i = 0; i < pagination_links.length; i++) {
								if (pagination_links[i].innerText == pg) {
									pagination_links[i].parentElement.classList.add('active');
								}
							}
						} else {
							tbody.innerHTML = '<tr><td colspan="6">No search results.</td></tr>';
							pagination.classList.add('invisible');
						}
					}
				}
			}
		}
		if (this.pagination_links) {
			var pagination_links = this.pagination_links;
			for (var i = 0; i < pagination_links.length; i++) {
				var link = pagination_links[i];
				var self = this;
				link.onclick = function (e) {
					e.preventDefault();
					document.querySelector('.pagination li.active').classList.remove('active');
					var filter_value = filter.value.trim();

					var httpReq = new XMLHttpRequest ();
				  	var pg = this.href.slice(-1);

				  	httpReq.open('post', 'http://localhost:8080/homework/video_club/AjaxCalls/index');
					httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					httpReq.send('ajax_fn=' + controller.toLowerCase() + 'Filter&search_value='+ filter_value + '&pg=' + pg);

					httpReq.onreadystatechange = function(){
						if (httpReq.readyState == 4){
							var response = JSON.parse(this.responseText);
							var tbody = document.getElementsByTagName('tbody')[0];
							var tbody_html = ``;
							if (response[0].length > 0) {
								tbody_html = self.prepareTbodyHTML(controller, response[0]);
								if (response[1].length == pagination_links.length) {
									for (var i = 0; i < response[1].length; i++) {
										pagination_links[i].classList.remove('d-none');
										pagination_links[i].href = response[1][i][0];
										pagination_links[i].innerText = response[1][i][1];
									}
								} else {
									// difference begins here
									var diff = pagination_links.length - response[1].length;
									if (diff != 0) {
										for (var i = pagination_links.length - 1; i >= response[1].length; i--) {
											pagination_links[i-1].classList.remove('d-none');
											pagination_links[i].classList.add('d-none');
										}
									}
									for (var i = 0; i < response[1].length; i++) {
										pagination_links[i].href = response[1][i][0];
										pagination_links[i].innerText = response[1][i][1];
									}
								}
								// difference ends here
								tbody.innerHTML = tbody_html;
								for (var i = 0; i < pagination_links.length; i++) {
									if (pagination_links[i].innerText == pg) {
										pagination_links[i].parentElement.classList.add('active');
									}
								}
								// difference begins here
							} else {
								pagination_links[1].parentElement.classList.add('active');
							}
							// difference ends here
						}
					}
				}
			}
		}
	}
	prepareTbodyHTML(controller, response) {
		var tbody_html = ``;
		for (var i = 0; i < response.length; i++) {
			tbody_html += `<tr style="cursor: pointer" onclick="document.location.href='/homework/video_club/`+controller+`/${response[i].id}'">
			<th scope="row">${i+1}</th>`;
			for (var key in response[i]) {
				if (key != 'id') {
					tbody_html += `<td>${response[i][key]}</td>`;
				}
			}
			tbody_html += `</tr>`
		}
		return tbody_html;
	}
}