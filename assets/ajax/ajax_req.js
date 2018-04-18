window.onload = function() {
	var filter_rentals_by_client = document.getElementById('client_filter');
	if (filter_rentals_by_client) {
		filter_rentals_by_client.onkeyup = function () {
			document.querySelector('.pagination li.active').classList.remove('active');
			var httpReq = new XMLHttpRequest ();
			var pg = 1;

			httpReq.open('post', 'http://localhost:8080/homework/video_club/assets/lib/functiones-ajax.php');
			httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			httpReq.send('ajax_fn=client_filter&search_value='+filter_rentals_by_client.value.trim()  + '&pg=' + pg);

			httpReq.onreadystatechange = function(){
				if (httpReq.readyState == 4){
					var response = JSON.parse(this.responseText);
					var tbody = document.getElementsByTagName('tbody')[0];
					var html = ``;
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
						if (diff == 1) {
							pagination_links[3].classList.remove('d-none');
							pagination_links[4].classList.add('d-none');
						} else if (diff == 2) {
							pagination_links[3].classList.add('d-none');
							pagination_links[4].classList.add('d-none');
						}
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
				}
			}
		}
	}
	var pagination_links = document.querySelectorAll(".pagination li a");
	if (pagination_links) {
		for (var i = 0; i < pagination_links.length; i++) {
			var link = pagination_links[i];
			link.onclick = function (e) {
				e.preventDefault();
				document.querySelector('.pagination li.active').classList.remove('active');

				var httpReq = new XMLHttpRequest ();
			  	var pg = this.href.slice(-1);

			  	httpReq.open('post', 'http://localhost:8080/homework/video_club/assets/lib/functiones-ajax.php');
				httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				httpReq.send('ajax_fn=client_filter&search_value='+filter_rentals_by_client.value.trim() + '&pg=' + pg);

				httpReq.onreadystatechange = function(){
					if (httpReq.readyState == 4){
						var response = JSON.parse(this.responseText);
						var tbody = document.getElementsByTagName('tbody')[0];
						var tbody_html = ``;
						var pagination = document.querySelector('.pagination');
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
							var diff = pagination_links.length - response[1].length;
							if (diff == 1) {
								pagination_links[3].classList.remove('d-none');
								pagination_links[4].classList.add('d-none');
							} else if (diff == 2) {
								pagination_links[3].classList.add('d-none');
								pagination_links[4].classList.add('d-none');
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
					}
				}
			}
		}
	}
}