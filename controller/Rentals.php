<?php

class Rentals extends Controller {
	public function index($pg) {
		$this->data['title'] = 'Rentals';
		$this->data['rentals'] = DBRentals::getAllRentals($pg);
		$total_rents_num = DBRentals::totalRentalsNum();
		$this->data['pagination_links'] = self::preparePaginationLinks($total_rents_num->total_rents, $pg);
		$this->show_view('rentals');
	}
	public function singleRental($id) {
		$this->data['title'] = 'Single Rental';
		$this->data['rental'] = DBRentals::getSingleRental($id);
		$this->show_view('rental');
	}
}