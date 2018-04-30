		<div class="container">
			<div class="row">
				<table class="table mt-5">
					<thead class="thead-dark">
					    <tr>
					      	<th scope="col" style="width: 5%">#</th>
						    <th scope="col" style="width: 30%">Title</th>
					      	<th scope="col" style="width: 35%">Description</th>
					      	<th scope="col" style="width: 10%">Genre</th>
					      	<th scope="col" style="width: 10%">Price</th>
					      	<th scope="col" style="width: 5%">Current Stock</th>
					      	<th scope="col" style="width: 5%">Stock</th>
					    </tr>
					</thead>
					<tbody>
						<tr>
					      	<th scope="row"><?php echo 1; ?></th>
						    <td><?php echo $this->data['film'][0]->title; ?></td>
						    <td><?php echo $this->data['film'][0]->description; ?></td>
						    <td><?php echo $this->data['film'][0]->genre; ?></td>
						    <td><?php echo $this->data['film'][0]->price; ?></td>
						    <td><?php echo $this->data['film'][0]->current_stock; ?></td>
						    <td><?php echo $this->data['film'][0]->stock; ?></td>
					    </tr>
					</tbody>
				</table>
				<div class="col-10 mt-5">
					<table class="col-10 table table-sm clients">
						<caption>List of clients that rented the film <?php echo $this->data['film'][0]->title; ?></caption>
						<thead>
							<th scope="col" style="width: 5%">#</th>
						    <th scope="col" style="width: 30%">Client</th>
					      	<th scope="col" style="width: 30%">Rented</th>
					      	<th scope="col" style="width: 30%">Returned</th>
					      	<th scope="col" style="width: 5%">Active</th>
						</thead>
						<tbody>
					<?php
					foreach ($this->data['film'] as $key => $value) {
					?>
							<tr>
								<th scope="row"><?php echo $key + 1; ?></th>
								<td><?php echo $this->data['film'][$key]->client; ?></td>
								<td><?php echo $this->data['film'][$key]->created; ?></td>
								<td><?php echo $this->data['film'][$key]->due; ?></td>
								<td><?php echo $this->data['film'][$key]->opened; ?></td>
							</tr>
					<?php
					}
					?>
						</tbody>
					</table>
					<nav class="col-12 mt-5" aria-label="...">
					    <ul class="pagination pagination-sm justify-content-center">
					    	<li class="page-item">
						      	<a class="page-link" href="#" aria-label="Previous">
						        	<span aria-hidden="true">&laquo;</span>
						        	<span class="sr-only">Previous</span>
						      	</a>
						    </li>
						    <li class="page-item"><a class="page-link" href="#">1</a></li>
						    <li class="page-item"><a class="page-link" href="#">2</a></li>
						    <li class="page-item"><a class="page-link" href="#">3</a></li>
						    <li class="page-item">
						      	<a class="page-link" href="#" aria-label="Next">
						        	<span aria-hidden="true">&raquo;</span>
						        	<span class="sr-only">Next</span>
						      	</a>
						    </li>
					    </ul>
					</nav>
				</div>