<?php

class DBFilms extends DB {
	public static function getAllFilms($skip) {
		$data = [];
		$sql = "select *,
				(select count(*) from films) as total 
				from films 
				order by title
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getSingleFilm($id, $skip) {
		$data = [];
		$sql = "select f.*, 
				(select count(*) from rentals_films where id_film=$id) as rented, 
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
	public static function getSingleFilmRentals ($id, $skip) {
		$data = [];
		$sql = "select (select count(*) from rentals_films where id_film=$id) as rented, 
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
	public static function getFilteredFilms ($cond_name, $cond, $skip) {
		$data = [];
		$sql = "select *,
				(select count(*) from films where $cond_name like '%$cond%') as total 
				from films 
				where $cond_name like '%$cond%'
				order by $cond_name
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getFilteredFilmsForNewRent ($cond) {
		$data = [];
		$sql = "select title, current_stock from films having title like '%$cond%' order by title limit 6";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	// public static function totalFilmsNum () {
	// 	$sql = "select count(*) as total_films from films";
	// 	$res = self::executeSQL($sql);
	// 	$total_films_num = $res->fetch_object();
	// 	return $total_films_num;
	// }
	public static function insertFilmIntoDB ($title, $description, $genre, $price, $stock) {
		$sql = "insert into films values (null, '$title', '$description', '$genre', $price, $stock, $stock)";
		$req = self::executeSQL($sql);
		return $req;
	}
}