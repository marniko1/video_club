<?php

class Clients extends BaseController {
	public function index($pg=0) {
		$skip = 0;
		if ($pg !== 0) {
			$pg = substr($pg, 1);
			$skip = $pg*2-2;
		}
		$this->data['title'] = 'Clients';
		$this->data['clients'] = DBClients::getAllClients($skip);
		$total_clients_num = $this->data['clients'][0]->total;
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_clients_num, $pg);
		$this->show_view('clients');
	}
	public function singleClient($id, $pg=0) {
		$skip = 0;
		if ($pg !== 0) {
			$pg = substr($pg, 1);
			$skip = $pg*2-2;
		}
		$this->data['client'] = DBClients::getSingleClient($id, $skip);
		$this->data['title'] = $this->data['client'][0]->client;
		$total_films_num = $this->data['client'][0]->rented;
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_films_num, $pg);
		$this->data['pagination_links'] = $this->changePrevNext($this->data['pagination_links']);
		$this->show_view('client');
	}
	public function addNewClient($first_name, $last_name, $email, $address, $is_ajax = false) {
		$req = DBClients::insertClientIntoDB($first_name, $last_name, $email, $address);
		if ($req) {
		// if (true) {
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