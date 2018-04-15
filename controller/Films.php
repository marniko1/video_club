<?php

class Films extends Controller {
	public function index () {
		$this->data['title'] = 'Films';
		$this->show_view('films');
	}
}