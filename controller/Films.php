<?php

class Films extends BaseController {
	public function index ($pg=0) {
		$skip = 0;
		if ($pg !== 0) {
			$pg = substr($pg, 1);
			$skip = $pg*2-2;
		}
		$this->data['title'] = 'Films';
		$this->data['films'] = DBFilms::getAllFilms($skip);
		$this->prepareShortenedData($this->data['films']);
		$total_films_num = $this->data['films'][0]->total;
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_films_num, $pg);
		$this->show_view('films');
	}
	public function singleFilm($id, $pg=0) {
		$skip = 0;
		if ($pg !== 0) {
			$pg = substr($pg, 1);
			$skip = $pg*2-2;
		}
		$this->data['film'] = DBFilms::getSingleFilm($id, $skip);
		$this->data['title'] = $this->data['film'][0]->title;
		$total_films_num = $this->data['film'][0]->rented;
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_films_num, $pg);
		$this->data['pagination_links'] = $this->changePrevNext($this->data['pagination_links']);
		$this->show_view('film');
	}
	public function prepareShortenedData($data_array) {
		foreach ($data_array as $key => $value) {
			$desc = substr($value->description, 0, 45).'... ';
			$data_array[$key]->description = $desc;
			if (strpos($value->genre, ',') !== false) {
				$long_genre = $value->genre;
				$desc = substr($value->genre, 0, strpos($value->genre, ',')+1).'... ';
				$data_array[$key]->genre = $desc;
				$data_array[$key]->long_genre = $long_genre;
			} else {
				$data_array[$key]->long_genre = $data_array[$key]->genre;
			}
		}
	}
	public function addNewFilm($title, $price, $stock, $description, $genre, $is_ajax = false) {
		$req = DBFilms::insertFilmIntoDB($title, $description, $genre, $price, $stock);
		if ($req) {
		// if (true) {
			Msg::createMessage("msg2", "Success.");
		} else {
			Msg::createMessage("msg2", "Unsuccess.");
		}
		if(!$is_ajax) {
			header("Location: ".INCL_PATH);
		} else {
			// var_dump($genre);
			return Msg::getMessage();
			// return $genre;
		}
	}
	public function editFilmData($title, $description, $genre, $price, $cur_stock, $stock, $id) {
		DBFilms::editFilm($title, $description, $genre, $price, $cur_stock, $stock, $id);
		header("Location: ".INCL_PATH.'Films/'.$id.'/p1');
	}
	public function removeFilm($id) {
		DBFilms::removeFilm($id);
		header("Location: ".INCL_PATH.'Films/index');
	}
}