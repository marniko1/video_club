<?php

class Controller {
	public $data = [];

	public function show_view($view) {
		
		require 'view/header.php';
		require 'view/'.$view.'.php';
		require 'view/footer.php';
	}
}