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
		$total_films_num = DBFilms::totalFilmsNum();
		$this->data['pagination_links'] = $this->preparePaginationLinks($total_films_num->total_films, $pg);
		$this->show_view('films');
	}
	public function singleFilm($id) {
		$this->data['film'] = DBFilms::getSingleFilm($id);
		$this->data['title'] = $this->data['film'][0]->title;
		$this->show_view('film');
	}
	public function prepareShortenedData($data_array) {
		foreach ($data_array as $key => $value) {
			$desc = substr($value->description, 0, 45).'... ';
			$data_array[$key]->description = $desc;
			if (strpos($value->genre, ',') !== false) {
				$desc = substr($value->genre, 0, strpos($value->genre, ',')+1).'... ';
				$data_array[$key]->genre = $desc;
			}
		}
	}
	public function addNewFilm($title, $price, $stock, $is_ajax = false) {
		// $req = DBClients::insertClientIntoDB($first_name, $last_name, $email, $address);
		// if ($req) {
		if (false) {
			Msg::createMessage("msg2", "Success.");
		} else {
			Msg::createMessage("msg2", "Unsuccess.");
		}
		if(!$is_ajax) {
			header("Location: ".INCL_PATH);
		} else {
			return Msg::getMessage();
		}
	}
}