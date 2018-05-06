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
	public function addNewRental($client, $title1, $title2, $title3, $title4, $title5, $is_ajax = false) {
		// var_dump(DBRentals::numOfFilmsAtClient($client));
		$num_of_films_at_client = DBRentals::numOfFilmsAtClient($client);
		$num_of_films_in_curr_rent = 0;
		$method_args = func_get_args();
		unset($method_args[0]);
		unset($method_args[6]);
		foreach ($method_args as $value) {
			if ($value != '') {
				$num_of_films_in_curr_rent++;
			}
		}
		try {
			if ($num_of_films_at_client->stock >= 5) {
				throw new Exception("The client already rented max num of films");
			}
			try {
				if ($num_of_films_at_client->stock + $num_of_films_in_curr_rent > 5) {
					$av = 5 - $num_of_films_at_client->stock;
					throw new Exception("The client can rent " . $av . " more film/s.");
				}
				// $req = DBRentals::insertRentalIntoDB($first_name, $last_name, $email, $address);
				// if ($req) {
				if (true) {
					Msg::createMessage("msg3", "Success.");
				} else {
					Msg::createMessage("msg3", "Unsuccess.");
				}
				if(!$is_ajax) {
					header("Location: ".INCL_PATH);
				} else {
					return Msg::getMessage();
				}
			} catch (Exception $e) {
				Msg::createMessage("msg3", $e->getMessage());
				return Msg::getMessage();
			}
			
		} catch (Exception $e) {
			Msg::createMessage("msg3", $e->getMessage());
			return Msg::getMessage();
		}		
	}
}