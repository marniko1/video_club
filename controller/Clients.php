<?php

class Clients extends BaseController {
	public function index () {
		$this->data['title'] = 'Clients';
		$this->show_view('clients');
	}
	public function addNewClient($first_name, $last_name, $email, $address) {
		// $req = DBClients::insertClientIntoDB($first_name, $last_name, $email, $address);
		// if ($req) {
		if (false) {
			Msg::createMessage("msg1", "Success.");
		} else {
			Msg::createMessage("msg1", "Unsuccess.");
		}
		// var_dump($_SESSION['msg1']);die;
		header("Location: ".INCL_PATH);
	}
}