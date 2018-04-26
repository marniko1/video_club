<?php

class Rentals extends BaseController {
	public function index($params=[]) {
		$this->data['title'] = 'Rentals';
		$this->data['rentals'] = DBRentals::getAllRentals($params[1]);
		$total_rents_num = DBRentals::totalRentalsNum();
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_rents_num->total_rents, $params[0]);
		$this->show_view('rentals');
	}
	public function singleRental($params=[]) {
		$this->data['title'] = 'Single Rental';
		$this->data['rental'] = DBRentals::getSingleRental($params[1]);
		$this->show_view('rental');
	}
}