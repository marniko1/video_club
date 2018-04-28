<?php

class Films extends BaseController {
	public function index () {
		$this->data['title'] = 'Films';
		$this->show_view('films');
	}
	public function addNewFilm() {
		
	}
}