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
					var response = JSON.parse(this.responseText)
					var tbody = document.getElementsByTagName('tbody')[0];
					var html = ``;
					for (var i = 0; i < response.length; i++) {
						html += `<tr style="cursor: pointer" onclick="document.location.href='/homework/video_club/Rentals/${response[i].id}'">
									<th scope="row">${i+1}</th>
								    <td>${response[i].client}</td>
								    <td>${response[i].totals}</td>
								    <td>${response[i].created}</td>
								    <td>${response[i].due}</td>
								    <td>${(response[i].due == 0)? 'Yes':'No'}</td>
								</tr>`
					}
					tbody.innerHTML = html;
				}
			}
		}
	}
}