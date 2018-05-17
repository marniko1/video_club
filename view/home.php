		<div class="container">
			<div class="row">
				<div class="col-6 form-wrapper d-flex">
					<div class="col-12 border border-primary mt-2 rounded">
						<form class="mt-5" method="post" action="<?php echo INCL_PATH.'Clients/addNewClient';?>" id="new-client">
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
							<div class="form-group mt-5">
								<input type="submit" value="Submit" class="btn btn-primary submit mt-5">
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg1'])) ? $this->data['msg']['msg1'] : false ?></span>
					</div>
				</div>
				<div class="col-3 form-wrapper d-flex opacity-5">
					<div class="col-12 border border-secondary mt-2 rounded">
						<form class="mt-5 row ml-2 mr-2" method="post" action="<?php echo INCL_PATH.'Films/addNewFilm';?>" id="new-film">
							<h5 class="col-12">Add new film</h5>
							<div class="form-group col-12 pl-0 pr-0">
								<label for="title">Title: </label>
								<input type="text" name="title" id="title" class="form-control">
							</div>
							<div class="form-group col-5 pl-0 pr-0">
								<label for="price">Price: </label>
								<input type="number" min="0.01" step="0.01" name="price" id="price" class="form-control">
							</div>
							<div class="col-2"></div>
							<div class="form-group col-5 pr-0 pl-0">
								<label for="stock">Stock: </label>
								<input type="number" min="1" name="stock" id="stock" class="form-control">
							</div>
							<div class="checkbox-wrapper col-12 form-group mt-3 rounded">
								<div class="row position-relative">
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
								</div>
							</div>
							<div class="form-group col-12 mt-2 pl-0 pr-0">
								<label for="description">Description: </label>
								<textarea class="form-control" rows="3" name="description" id="description"></textarea>
							</div>
							<div class="form-group col-12 mt-5">
								<input type="submit" value="Submit" class="btn btn-primary submit mt-5" disabled>
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg2'])) ? $this->data['msg']['msg2'] : false ?></span>
					</div>
				</div>
				<div class="col-3 form-wrapper d-flex opacity-5">
					<div class="col-12 border border-secondary mt-2 rounded">
						<form class="mt-5" method="post" action="<?php echo INCL_PATH.'Rentals/addNewRental';?>" id="new-rental">
							<h5>Create new rental</h5>
							<div class="form-group">
								<label for="client">Client: </label>
								<input type="text" name="client" id="client" class="form-control new-rent-input">
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="title1">Title1: </label>
								<input type="text" name="title1" id="title1" class="form-control new-rent-input">
								<span class="film_err_span text-danger" id="unav_film_msg1"><small><?php echo (isset($this->data['msg']['unav_film_msg1'])) ? $this->data['msg']['unav_film_msg1'] : false ?></small></span>
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="title2">Title2: </label>
								<input type="text" name="title2" id="title2" class="form-control new-rent-input">
								<span class="film_err_span text-danger" id="unav_film_msg2"><small><?php echo (isset($this->data['msg']['unav_film_msg2'])) ? $this->data['msg']['unav_film_msg2'] : false ?></small></span>
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="title3">Title3: </label>
								<input type="text" name="title3" id="title3" class="form-control new-rent-input">
								<span class="film_err_span text-danger" id="unav_film_msg3"><small><?php echo (isset($this->data['msg']['unav_film_msg3'])) ? $this->data['msg']['unav_film_msg3'] : false ?></small></span>
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="title4">Title4: </label>
								<input type="text" name="title4" id="title4" class="form-control new-rent-input">
								<span class="film_err_span text-danger" id="unav_film_msg4"><small><?php echo (isset($this->data['msg']['unav_film_msg4'])) ? $this->data['msg']['unav_film_msg4'] : false ?></small></span>
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<label for="title5">Title5: </label>
								<input type="text" name="title5" id="title5" class="form-control new-rent-input">
								<span class="film_err_span text-danger" id="unav_film_msg5"><small><?php echo (isset($this->data['msg']['unav_film_msg5'])) ? $this->data['msg']['unav_film_msg5'] : false ?></small></span>
								<div class="proposals d-none">
									<ul class="mb-0 pl-0"></ul>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary submit" disabled>
							</div>
						</form>
						<span class="msg-span"><?php echo (isset($this->data['msg']['msg3'])) ? $this->data['msg']['msg3'] : false ?></span>
					</div>
				</div>