		<div class="container">
			<div class="row">
				<table class="table mt-5">
					<thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Price</th>
					    </tr>
					</thead>
					<tbody>
						<?php
						foreach ($this->data['rental'] as $key => $value) {
						?>
							<tr>
						      	<th scope="row"><?php echo $key+1; ?></th>
						     	<td><?php echo '<a class="nav-link" href="'.INCL_PATH.'Films/'.$value->id.'/p1">'.$value->title.'</a>'; ?></td>
						      	<td><?php echo $value->price; ?></td>
						    </tr>
						<?php
						}
						?>
					    <tr>
					      	<th scope="row">TOTAL</th>
					      	<td></td>
					      	<td><?php echo $this->data['rental'][0]->totals; ?></td>
					    </tr>
					</tbody>
				</table>
				<ul>
					<li>Client: <?php echo $this->data['rental'][0]->client; ?></li>
					<li>Active: <?php echo $this->data['rental'][0]->opened; ?></li>
					<li>Date created: <?php echo $this->data['rental'][0]->created; ?></li>
					<li>Due: <?php echo $this->data['rental'][0]->due; ?></li>
				</ul>