window.onload = function() {
	var filter_rentals_by_client = document.getElementById('client_filter');
	if (filter_rentals_by_client) {
		filter_rentals_by_client.onkeyup = function () {
			var httpReq = new XMLHttpRequest ();

			httpReq.open('post', 'http://localhost:8080/homework/video_club/assets/lib/functiones-ajax.php');
			httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			httpReq.send('ajax_fn=client_filter&search_value='+filter_rentals_by_client.value.trim());

			httpReq.onreadystatechange = function(){
				if (httpReq.readyState == 4){
					var response = JSON.parse(this.responseText);
					console.log(response[1]);
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
					tbody.innerHTML = html;
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
				this.parentElement.classList.add('active');

				var httpReq = new XMLHttpRequest ();
			  	var pg = this.href.slice(-1);
			  	console.log(pg);

			  	httpReq.open('post', 'http://localhost:8080/homework/video_club/assets/lib/functiones-ajax.php');
				httpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				httpReq.send('ajax_fn=client_filter&search_value='+filter_rentals_by_client.value.trim() + '&pg=' + pg);

				httpReq.onreadystatechange = function(){
					if (httpReq.readyState == 4){
						var response = JSON.parse(this.responseText);
						console.log(response[1]);
						var tbody = document.getElementsByTagName('tbody')[0];
						var tbody_html = ``;
						var pagination_links = document.querySelectorAll('.pagination li a');
						console.log(pagination_links);
						var pagination_links_html =``;
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
						for (var i = 0; i < response[1].length; i++) {
							pagination_links_html += `<li class="page-item"><a href="${response[1][i][0]}" class="page-link">${response[1][i][1]}</a></li>`;
						}
						tbody.innerHTML = tbody_html;
						console.log(pagination_links_html);
					}
				}

			};
		}
		// $(pagination_links).on('click', function (e) {
		//     e.preventDefault();
		//     $('li.active').removeClass('active');
		//   	$(this).parent('li').addClass('active');

		  	
		// });
	}
}