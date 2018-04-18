<?php

class AjaxCalls extends Controller {

	public $method_name;
	public $pg;
	public $skip;
	public $search_value;

	public function __construct ($method) {
		$this->method_name = $method;
		$this->pg = $_POST['pg'];
		$this->skip = $_POST['pg']*2-2;
		$this->search_value = $_POST['search_value'];
	}

	public function index () {
		$method = $this->method_name;
		$this->$method();
	}

	public function ajaxFilterClients  () {

		$filtered_data = DBRentals::getFilteredRentals('client', $this->search_value, $this->skip);
		$total_rents_num = DBRentals::numberOfRowsInResult('client', $this->search_value);
		$pagination_data = $this->preparePaginationLinks($total_rents_num, $this->pg);
		$response = [$filtered_data, $pagination_data];
		echo json_encode($response);
	}
}