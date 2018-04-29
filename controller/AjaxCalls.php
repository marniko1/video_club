<?php

class AjaxCalls extends BaseController {

	public $method;
	public $pg;
	public $skip;
	public $search_value;
	public $params = [];

	public function __construct () {
		$this->method = $_POST['ajax_fn'];
		if (isset($_POST['pg']) && isset($_POST['search_value'])) {
			$this->pg = $_POST['pg'];
			$this->skip = $_POST['pg']*2-2;
			$this->search_value = $_POST['search_value'];
		}
	}

	public function index () {
		$method = $this->method;
		$this->$method();
	}

	public function rentalsFilter () {

		$filtered_data = DBRentals::getFilteredRentals('client', $this->search_value, $this->skip);
		$total_rents_num = DBRentals::numberOfRowsInResult('client', $this->search_value);
		$pagination_data = $this->preparePaginationLinks($total_rents_num, $this->pg);
		$response = [$filtered_data, $pagination_data];
		echo json_encode($response);
	}

	public function submitForm(){
		$controller = $_POST['controller'];
		$method = $_POST['method'];
		$this->params = json_decode($_POST['params']);
		$this->params[] = true;
		include_once "controller/" . $controller . ".php";
		$controller = new $controller;
		$response = call_user_func_array([$controller, $method], $this->params);
		// var_dump($response);
		echo json_encode($response);
	}
}