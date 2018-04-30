<?php

class DBFilms extends DB {
	public static function getAllFilms($skip) {
		$data = [];
		$sql = "select * from films 
				order by title
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getSingleFilm($id) {
		$data = [];
		$sql = "select f.*,  concat(c.first_name, \" \", c.last_name) as client, r.created, r.due, r.opened from films as f 
				join rentals_films as rf 
				on rf.id_film = f.id 
				join rentals as r 
				on r.id = rf.id_rental 
				join clients as c 
				on c.id = r.id_client  
				where f.id=".$id;
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function getFilteredFilms ($cond_name, $cond, $skip) {
		$data = [];
		$sql = "select * from films 
				where $cond_name like '%$cond%'
				order by $cond_name
				limit $skip,2";
		$res = self::executeSQL($sql);
		while ($row = $res->fetch_object()) {
			array_push($data, $row);
		}
		return $data;
	}
	public static function totalFilmsNum () {
		$sql = "select count(*) as total_films from films";
		$res = self::executeSQL($sql);
		$total_films_num = $res->fetch_object();
		return $total_films_num;
	}
	public static function numberOfRowsInResult ($cond_name, $cond) {
		$sql = "select * from films
				where $cond_name like '%$cond%'";
		$num_of_rows = self::executeSQL($sql)->num_rows;
		return $num_of_rows;
	}
}