<?php

class Films extends BaseController {
	public function index () {
		$this->data['title'] = 'Films';
		$this->show_view('films');
	}
	public function addNewFilm($title, $price, $stock, $is_ajax = false) {
		// $req = DBClients::insertClientIntoDB($first_name, $last_name, $email, $address);
		// if ($req) {
		if (false) {
			Msg::createMessage("msg2", "Success.");
		} else {
			Msg::createMessage("msg2", "Unsuccess.");
		}
		if(!$is_ajax) {
			header("Location: ".INCL_PATH);
		} else {
			return Msg::getMessage();
		}
	}
}