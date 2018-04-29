<?php

class Clients extends BaseController {
	public function index () {
		$this->data['title'] = 'Clients';
		$this->show_view('clients');
	}
	public function addNewClient($first_name, $last_name, $email, $address, $is_ajax = false) {
		// $req = DBClients::insertClientIntoDB($first_name, $last_name, $email, $address);
		// if ($req) {
		if (true) {
			Msg::createMessage("msg1", "Success.");
		} else {
			Msg::createMessage("msg1", "Unsuccess.");
		}
		if(!$is_ajax) {
			header("Location: ".INCL_PATH);
		} else {
			return Msg::getMessage();
		}
	}
}