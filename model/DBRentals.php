<?php

class DBRentals extends DB {
	public static function getAllRentals($skip) {
		$data = [];
		$sql = "select r.id, concat(c.first_name, \" \", c.last_name) as client, r.totals, r.created, r.due, r.opened from rentals as r 
				join clients as c
				on r.id_client = c.id
				order by client 
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getSingleRental($id) {
		$data = [];
		$sql = "select f.id, f.title, f.price, r.totals, r.created, r.due, r.opened, concat(c.first_name, \" \", c.last_name) as client from rentals as r 
				join rentals_films as rf 
				on r.id = rf.id_rental 
				join films as f 
				on f.id = rf.id_film 
				join clients as c 
				on r.id_client = c.id 
				where r.id=".$id;
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getFilteredRentals ($cond_name, $cond, $skip) {
		$data = [];
		$sql = "select r.id, concat(c.first_name, \" \", c.last_name) as client, r.totals, r.created, r.due, r.opened from rentals as r 
				join clients as c
				on r.id_client = c.id
				having $cond_name like '%$cond%'
				order by $cond_name
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function totalRentalsNum () {
		$sql = "select count(*) as total_rents from rentals";
		$res = self::executeSQL($sql);
		$total_rentals_num = $res->fetch_object();
		return $total_rentals_num;
	}
	public static function numberOfRowsInResult ($cond_name, $cond) {
		$sql = "select r.id, concat(c.first_name, \" \", c.last_name) as client, r.totals, r.created, r.due, r.opened from rentals as r 
				join clients as c
				on r.id_client = c.id
				having $cond_name like '%$cond%'";
		$num_of_rows = self::executeSQL($sql)->num_rows;
		return $num_of_rows;
	}
}