<?php

class Clients extends BaseController {
	public function index () {
		$this->data['title'] = 'Clients';
		$this->show_view('clients');
	}
}