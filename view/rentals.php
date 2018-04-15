		<div class="container">
			<div class="row">
				<form class="mt-2">
					<input type="text" name="client_filter" placeholder="Filter by client's name" id="client_filter">
				</form>
				<div  class="table-holder" style="min-height: 450px">
					<table class="table table-hover mt-1">
						<caption>List of rentals</caption>
						<thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Client</th>
						      <th scope="col">Total</th>
						      <th scope="col">Created</th>
						      <th scope="col">Due</th>
						      <th scope="col">Opened</th>
						    </tr>
						</thead>
						<div class="table-content">
							<tbody class="tbody">
								<?php
								foreach ($this->data['rentals'] as $key => $value) {
								?>
									<tr style="cursor: pointer;" onclick="document.location.href='<?php echo INCL_PATH.'Rentals/'.$value->id; ?>'">
									    <th scope="row" style="width: 5%"><?php echo $key+1; ?></th>
									    <td style="width: 30%"><?php echo $value->client; ?></td>
									    <td style="width: 10%"><?php echo $value->totals; ?></td>
									    <td style="width: 25%"><?php echo $value->created; ?></td>
									    <td style="width: 25%"><?php echo $value->due; ?></td>
									    <td style="width: 5%"><?php echo ($value->opened == 0)?'No':'Yes'; ?></td>
								    </tr>
								<?php
								}
								?>
							 </tbody>
						</div>
					</table>
				</div>
				<nav class="col-12">
				    <ul class="pagination justify-content-center">
				    	<?php
					    foreach ($this->data['pagination_links'] as $link) {
					    	echo  '<li class="page-item"><a href="'.$link[0].'" class="page-link">'.$link[1].'</a></li>';
					    }
					    ?>
				    </ul>
				</nav>