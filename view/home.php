		<div class="container">
			<div class="row">
				<div class="col-6 form-wrapper d-flex">
					<div class="col-12 border border-primary mt-2 rounded">
						<form class="mt-5" method="post" action="<?php echo INCL_PATH.'Clients/addNewClient'; ?>">
							<h5>Add new client</h5>
							<div class="form-group">
								<label for="first_name">First name: </label>
								<input type="text" name="first_name" id="first_name" class="form-control">
							</div>
							<div class="form-group">
								<label for="last_name">Last name: </label>
								<input type="text" name="last_name" id="last_name" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="email" name="email" id="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="address">Address: </label>
								<input type="text" name="address" id="address" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
						<?php echo (isset($this->data['msg']['msg1'])) ? "<span>" . $this->data['msg']['msg1'] . "</span>" : false ?>
					</div>
				</div>
				<div class="col-3 form-wrapper d-flex opacity-5">
					<div class="col-12 border border-secondary mt-2 rounded">
						<form class="mt-5" method="post" action="">
							<h5>Add new film</h5>
							<div class="form-group">
								<label for="title">Title: </label>
								<input type="text" name="title" id="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="price">Price: </label>
								<input type="text" name="price" id="price" class="form-control">
							</div>
							<div class="form-group">
								<label for="stock">Stock: </label>
								<input type="text" name="stock" id="stock" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
						<?php echo (isset($this->data['msg']['msg2'])) ? "<span>" . $this->data['msg']['msg2'] . "</span>" : false ?>
					</div>
				</div>
				<div class="col-3 form-wrapper d-flex opacity-5">
					<div class="col-12 border border-secondary mt-2 rounded">
						<form class="mt-5" method="post" action="">
							<h5>Create new rental</h5>
							<div class="form-group">
								<label for="title">Title: </label>
								<input type="text" name="title" id="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="price">Price: </label>
								<input type="text" name="price" id="price" class="form-control">
							</div>
							<div class="form-group">
								<label for="stock">Stock: </label>
								<input type="text" name="stock" id="stock" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
						<?php echo (isset($this->data['msg']['msg3'])) ? "<span>" . $this->data['msg']['msg3'] . "</span>" : false ?>
					</div>
				</div>