<?php

class DBClients extends DB {
		public static function getAllClients($skip) {
		$data = [];
		$sql = "select id, concat(first_name, \" \", last_name) as client, email, address, stock, 
				(select count(*) from clients) as total 
				from clients 
				order by first_name
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getSingleClient($id, $skip) {
		$data = [];
		$sql = "select c.id, concat(c.first_name, \" \", c.last_name) as client, c.email, c.address, c.stock, f.title, r.id as id_rental, r.created, r.due, r.opened, 
				(select count(*) from rentals where id_client=$id) as rented from clients as c  
				left join rentals as r 
				on c.id = r.id_client 
				left join rentals_films as rf 
				on r.id = rf.id_rental 
				left join films as f 
				on rf.id_film = f.id 
				where c.id = $id 
				order by f.title 
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getSingleClientRentals ($id, $skip) {
		$data = [];
		$sql = "select (select count(*) from rentals where id_client=$id) as rented, 
				concat(c.first_name, \" \", c.last_name) as client, r.id, r.created, r.due, r.opened from films as f 
				left join rentals_films as rf 
				on rf.id_film = f.id 
				left join rentals as r 
				on r.id = rf.id_rental 
				left join clients as c 
				on c.id = r.id_client  
				where f.id=$id 
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getFilteredClients ($cond_name, $cond, $skip) {
		$data = [];
		$sql = "select id, concat(first_name, \" \", last_name) as client, email, address, stock, 
				(select count(*) from clients where concat(first_name, \" \", last_name) like '%$cond%') as total 
				from clients 
				having $cond_name like '%$cond%'  
				order by $cond_name
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	// public static function totalClientsNum () {
	// 	$sql = "select count(*) as total_rents from clients";
	// 	$res = self::executeSQL($sql);
	// 	$total_rentals_num = $res->fetch_object();
	// 	return $total_rentals_num;
	// }
	public static function insertClientIntoDB ($first_name, $last_name, $email, $address) {
		$sql = "insert into clients values (null, '$first_name', '$last_name', '$email', '$address', default)";
		$req = self::executeSQL($sql);
		return $req;
	}
}