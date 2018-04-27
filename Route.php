<?php

class Route {
	public static $controller;
	public static $method;
	public static $params = [];
	public static $instance;
	public static $c;

	public static function post() {

	}
	public static function get($url, $controller_method) {
		$server_url = $_SERVER['REQUEST_URI'];
		$path = str_replace(INCL_PATH, '', $server_url);
		$path_arr = explode('/', $path);
		$url = ltrim($url, '/');
		$url_arr = explode('/', $url);
		if ($path_arr[0] != $url_arr[0]) {
			return;
		} else {

			$controller_method_in_arr = explode('@', $controller_method);
			self::$controller = $controller_method_in_arr[0];
			self::$method = $controller_method_in_arr[1];
			include_once 'controller/'.self::$controller.'.php';
			self::$controller = new self::$controller;
			var_dump($path_arr[1]);
			var_dump($url_arr[1]);
			if ($path_arr[1] == $url_arr[1]) {

				self::$params = [];

			} else if (preg_match('/^[0-9]$/', $path_arr[1])) {
				var_dump('ovde');
				self::$params[] = $path_arr[1];
			} else if (preg_match('/^p[0-9]$/', $path_arr[1])) {
				self::$params[] = substr($path_arr[1], 1);
			} else {
				return;
			}
		}
		call_user_func_array([self::$controller, self::$method], self::$params);
		// if ($url == '/'.str_replace(INCL_PATH, '', $server_url)) {
			
		// } else {
		// 	return;
		// }
		
	}
}
call_user_func(array($controller, $method));
is_numeric — Finds whether a variable is a number or a numeric string

'/^{+(.*)+}$/'


// Route::get('/', 'Rentals@index');
// Route::get('/Rental/{id}', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');