window.onload = function() {
	var filter = document.getElementById('filter');
	var pagination_links = document.querySelectorAll(".pagination li a");
	if (filter) {
		filter.onkeyup = function () {
			var pagination = document.querySelector('.pagination');
			pagination.classList.remove('invisible');
			if (document.querySelector('.pagination li.active')) {
				document.querySelector('.pagination li.active').classList.remove('active');
			}
			var httpReq = new XMLHttpRequest ();
			var pg = 1;

			httpReq.open('post', 'http://localhost:8080/homework/video_club/AjaxCalls/index');
			httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			httpReq.send('ajax_fn=rentalsFilter&search_value='+filter.value.trim()  + '&pg=' + pg);

			httpReq.onreadystatechange = function(){
				if (httpReq.readyState == 4){
					var response = JSON.parse(this.responseText);
					console.log(response);
					var tbody = document.getElementsByTagName('tbody')[0];
					var html = ``;
					if (response[0].length > 0) {
						for (var i = 0; i < response[0].length; i++) {
							html += `<tr style="cursor: pointer" onclick="document.location.href='/homework/video_club/Rentals/${response[0][i].id}'">
										<th scope="row">${i+1}</th>
									    <td>${response[0][i].client}</td>
									    <td>${response[0][i].totals}</td>
									    <td>${response[0][i].created}</td>
									    <td>${response[0][i].due}</td>
									    <td>${(response[0][i].due == 0)? 'Yes':'No'}</td>
									</tr>`
						}
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
							//?????????????????????????????????????????
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
							// ????????????????????????????????????????????????????
							for (var i = 0; i < response[1].length; i++) {
								pagination_links[i].href = response[1][i][0];
								pagination_links[i].innerText = response[1][i][1];
							}
						}
						tbody.innerHTML = html;
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
	if (pagination_links) {
		for (var i = 0; i < pagination_links.length; i++) {
			var link = pagination_links[i];
			link.onclick = function (e) {
				e.preventDefault();
				document.querySelector('.pagination li.active').classList.remove('active');

				var httpReq = new XMLHttpRequest ();
			  	var pg = this.href.slice(-1);

			  	httpReq.open('post', 'http://localhost:8080/homework/video_club/AjaxCalls/index');
				httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				httpReq.send('ajax_fn=rentalsFilter&search_value='+filter.value.trim() + '&pg=' + pg);

				httpReq.onreadystatechange = function(){
					if (httpReq.readyState == 4){
						var response = JSON.parse(this.responseText);
						var tbody = document.getElementsByTagName('tbody')[0];
						var tbody_html = ``;
						if (response[0].length > 0) {
							for (var i = 0; i < response[0].length; i++) {
								tbody_html += `<tr style="cursor: pointer" onclick="document.location.href='/homework/video_club/Rentals/${response[0][i].id}'">
											<th scope="row">${i+1}</th>
										    <td>${response[0][i].client}</td>
										    <td>${response[0][i].totals}</td>
										    <td>${response[0][i].created}</td>
										    <td>${response[0][i].due}</td>
										    <td>${(response[0][i].due == 0)? 'Yes':'No'}</td>
										</tr>`
							}
							if (response[1].length == pagination_links.length) {
								for (var i = 0; i < response[1].length; i++) {
									pagination_links[i].classList.remove('d-none');
									pagination_links[i].href = response[1][i][0];
									pagination_links[i].innerText = response[1][i][1];
								}
							} else {
								// ??????????????????????????????????????????????????
								var diff = pagination_links.length - response[1].length;
								if (diff != 0) {
									for (var i = pagination_links.length - 1; i >= response[1].length; i--) {
										pagination_links[i-1].classList.remove('d-none');
										pagination_links[i].classList.add('d-none');
									}
								}
								// ???????????????????????????????????????????????????
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
							pagination_links[1].parentElement.classList.add('active');
						}
					}
				}
			}
		}
	}
}