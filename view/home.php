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
								<input type="submit" value="Submit" class="btn btn-primary submit">
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg1'])) ? $this->data['msg']['msg1'] : false ?></span>
					</div>
				</div>
				<div class="col-3 form-wrapper d-flex opacity-5">
					<div class="col-12 border border-secondary mt-2 rounded">
						<form class="mt-5 row" method="post" action="<?php echo INCL_PATH.'Films/addNewFilm'; ?>">
							<h5 class="col-12">Add new film</h5>
							<div class="form-group col-12">
								<label for="title">Title: </label>
								<input type="text" name="title" id="title" class="form-control">
							</div>
							<div class="form-group col-6">
								<label for="price">Price: </label>
								<input type="number" name="price" id="price" class="form-control">
							</div>
							<div class="form-group col-6">
								<label for="stock">Stock: </label>
								<input type="number" step="0.01" name="stock" id="stock" class="form-control">
							</div>
							<div class="col-3 checkbox-holder d-none">
								<div class="form-check form-check-inline ml-2">									
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox1" value="Comedy">
	  								<label class="form-check-label" for="checkbox1">Comedy</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox2" value="Sci-Fi">
	  								<label class="form-check-label" for="checkbox2">Sci-Fi</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox3" value="Horror">
	  								<label class="form-check-label" for="checkbox3">Horror</label>
								</div>
							</div>
							<div class="col-3 checkbox-holder d-none">
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox4" value="Romance">
	  								<label class="form-check-label" for="checkbox4">Romance</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox5" value="Action">
	  								<label class="form-check-label" for="checkbox5">Action</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox6" value="Thriller">
	  								<label class="form-check-label" for="checkbox6">Thriller</label>
								</div>
							</div>
							<div class="col-3 checkbox-holder d-none">
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox7" value="Drama">
	  								<label class="form-check-label" for="checkbox7">Drama</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox8" value="Mystery">
	  								<label class="form-check-label" for="checkbox8">Mystery</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox9" value="Crime">
	  								<label class="form-check-label" for="checkbox9">Crime</label>
								</div>
							</div>
							<div class="col-3 checkbox-holder d-none">
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox10" value="Animation">
	  								<label class="form-check-label" for="checkbox10">Animation</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox11" value="Adventure">
	  								<label class="form-check-label" for="checkbox11">Adventure</label>
								</div>
								<div class="form-check form-check-inline ml-2">
									<input class="form-check-input" type="checkbox" name="genre[]" id="checkbox12" value="Fantasy">
	  								<label class="form-check-label" for="checkbox12">Fantasy</label>
								</div>
							</div>
							<div class="form-group col-12 mt-2">
								<label for="title">Description: </label>
								<textarea class="form-control" rows="3" name="description"></textarea>
							</div>
							<div class="form-group col-12">
								<input type="submit" value="Submit" class="btn btn-primary submit mt-2" disabled>
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg2'])) ? $this->data['msg']['msg2'] : false ?></span>
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
								<input type="submit" value="Submit" class="btn btn-primary submit" disabled>
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg3'])) ? $this->data['msg']['msg3'] : false ?></span>
					</div>
				</div>