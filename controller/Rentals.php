<?php

class Rentals extends BaseController {
	public function index($pg=0) {
		$skip = 0;
		if ($pg !== 0) {
			$pg = substr($pg, 1);
			$skip = $pg*2-2;
		}
		$this->data['title'] = 'Rentals';
		$this->data['rentals'] = DBRentals::getAllRentals($skip);
		$total_rents_num = DBRentals::totalRentalsNum();
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_rents_num->total_rents, $pg);
		$this->show_view('rentals');
	}
	public function singleRental($id) {
		$this->data['title'] = 'Single Rental';
		$this->data['rental'] = DBRentals::getSingleRental($id);
		$this->show_view('rental');
	}
}