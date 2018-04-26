<?php
// define('INCL_PATH', '/homework/video_club/');
// define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].INCL_PATH);
class Route {
	public static $controller;
	public static $method;
	public static $params = [];

	public static function post() {

	}
	public static function get($url, $controller_method) {
		$server_url = $_SERVER['REQUEST_URI'];
		var_dump($url);
		var_dump(str_replace(INCL_PATH, '', $server_url));
		if ($url != str_replace(INCL_PATH, '', $server_url)) {
			return;
		}
		$controller_method_in_arr = explode('@', $controller_method);
		$controller = $controller_method_in_arr[0];
		$method = $controller_method_in_arr[1];
		include 'controller/'.$controller.'.php';
		$c = new $controller;
		$c->$method(self::$params);
	}
}


// Route::get('/', 'Rentals@index');
// Route::get('/Rental/{id}', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');