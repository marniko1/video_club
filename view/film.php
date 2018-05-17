		<div class="container">
			<div class="row">
				<form method="post" action="<?php echo INCL_PATH.'Films/editFilmData';?>">
					<table class="table mt-5 main">
						<thead class="thead-dark">
						    <tr>
						      	<th scope="col" style="width: 5%">#</th>
							    <th scope="col" style="width: 30%">Title</th>
						      	<th scope="col" style="width: 35%">Description</th>
						      	<th scope="col" style="width: 10%">Genre</th>
						      	<th scope="col" style="width: 10%">Price</th>
						      	<th scope="col" style="width: 5%">CurSt</th>
						      	<th scope="col" style="width: 5%">Stock</th>
						    </tr>
						</thead>
						<tbody>
							<tr>
						      	<th scope="row"><?php echo 1; ?></th>
							    <td data-name="title"><?php echo $this->data['film'][0]->title; ?></td>
							    <td data-name="descripton"><?php echo $this->data['film'][0]->description; ?></td>
							    <td data-name="genre"><?php echo $this->data['film'][0]->genre; ?></td>
							    <td data-name="price"><?php echo $this->data['film'][0]->price; ?></td>
							    <td data-name="current_stock"><?php echo $this->data['film'][0]->current_stock; ?></td>
							    <td data-name="stock"><?php echo $this->data['film'][0]->stock; ?></td>
						    </tr>
						</tbody>
					</table>
					<div class="btn-holder">
						<input type="button" name="edit" value="Edit" class="btn edit btn-info">
					</div>
				</form>
				<div class="col-10 mt-5">
					<div class="table-wrapper" style="min-height: 200px">
						<table class="col-10 table table-sm clients">
							<caption>List of clients that rented the film <?php echo $this->data['film'][0]->title; ?></caption>
							<thead>
								<th scope="col" style="width: 5%">#</th>
							    <th scope="col" style="width: 30%">Client</th>
						      	<th scope="col" style="width: 30%">Rented</th>
						      	<th scope="col" style="width: 30%">Returned</th>
						      	<th scope="col" style="width: 5%">Active</th>
							</thead>
							<tbody class="tbody">
					<?php if ($this->data['film'][0]->client != null):
						foreach ($this->data['film'] as $key => $value) {
						?>
								<tr style="cursor: pointer;" onclick="document.location.href='<?php echo INCL_PATH.'Rentals/'.$value->id; ?>'">
									<th scope="row"><?php echo $key + 1; ?></th>
									<td><?php echo $this->data['film'][$key]->client; ?></td>
									<td><?php echo $this->data['film'][$key]->created; ?></td>
									<td><?php echo $this->data['film'][$key]->due; ?></td>
									<td><?php echo $this->data['film'][$key]->opened; ?></td>
								</tr>
						<?php
						}
						else: ?>
						<tr><td colspan="6">Not rented yet.</td></tr>
					<?php endif ?>
							</tbody>
						</table>
					</div>
					<?php if ($this->data['film'][0]->client != null): ?>
					<nav class="col-12 mt-5" aria-label="...">
					    <ul class="pagination pagination-sm justify-content-center">
					    	<?php
						    foreach ($this->data['pagination_links'] as $link) {
						    	echo  '<li class="page-item"><a href="'.$link[0].'" class="page-link">'.$link[1].'</a></li>';
						    }
						    ?>
					    </ul>
					</nav>
					<?php endif ?>
				</div>