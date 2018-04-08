<?php

class Rentals extends Controller {
	public function index() {
		$this->data['title'] = 'Rentals';
		$this->data['rentals'] = DBRentals::getAllRentals();
		$this->show_view('rentals');
	}
	public function singleRental($id) {
		$this->data['title'] = 'Single Rental';
		$this->data['rental'] = DBRentals::getSingleRental($id);
		$this->show_view('rental');
	}
}