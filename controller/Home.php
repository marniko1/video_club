<?php

class Home extends BaseController {
	public function index () {
		$this->data['title'] = 'Home page';
		$this->show_view('home');
	}
}