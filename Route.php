<?php

class Route {
	public static $controller;
	public static $method;
	public static $params = [];

	public static function post() {

	}
	public static function get($url, $action, $req=[]) {
		$path = self::findServerPath();
		$url_arr = self::prepareURL($url);
		$path_arr = self::prepareServerURLPath();
		if ($path_arr[0] != $url_arr[0] || count($path_arr) != count($url_arr)) {
			return;
		} else {

			$action = explode('@', $action);
			self::$controller = $action[0];
			self::$method = $action[1];
			include_once 'controller/'.self::$controller.'.php';
			self::$controller = new self::$controller;

			if (ltrim($url, '/') == $path) {
				self::$params = [];
			} else if (!empty($req)) {
				self::$params = self::collectParams($url_arr, $path_arr);
				foreach ($req as $key => $value) {
					if (!preg_match($value, self::$params[$key])) {
						return;
					}
				}
			// } else if (preg_match('/^[0-9]$/', $path_arr[1])) {
			// 	var_dump('ovde');
			// 	self::$params[] = $path_arr[1];
			// } else if (preg_match('/^p[0-9]$/', $path_arr[1])) {
			// 	self::$params[] = substr($path_arr[1], 1);
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

	public static function redirectPage() {

	}

	public static function prepareURL ($url) {
		$url = ltrim($url, '/');
		return explode('/', $url);
	}

	public static function findServerPath () {
		return str_replace(INCL_PATH, '', $_SERVER['REQUEST_URI']);
	}

	public static function prepareServerURLPath () {
		$path = self::findServerPath();
		return $path_arr = explode('/', $path);
	}

	public static function collectParams($url_arr, $path_arr) {
		foreach ($url_arr as $key => $value) {
			if (preg_match('/^{+(.*)+}$/', $value)) {
				self::$params[] = $path_arr[$key];
			}
		}
		return self::$params;
	}

	public static function checkReq() {

	}
	public static function checkURL (){

	}
}
// call_user_func(array($controller, $method));
// is_numeric — Finds whether a variable is a number or a numeric string

// '/^{+(.*)+}$/'


// Route::get('/', 'Rentals@index');
// Route::get('/Rental/{id}', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');
// Route::get('/', 'Rentals@index');

// public static function get($url, $controller_method) {
	
// 	$url_arr = self::prepareURL($url);
// 	$path_arr = self::prepareServerURL();
// 	if ($path_arr[0] != $url_arr[0]) {
// 		return;
// 	} else {

// 		$controller_method_in_arr = explode('@', $controller_method);
// 		self::$controller = $controller_method_in_arr[0];
// 		self::$method = $controller_method_in_arr[1];
// 		include_once 'controller/'.self::$controller.'.php';
// 		self::$controller = new self::$controller;
// 		var_dump($path_arr[1]);
// 		var_dump($url_arr[1]);
// 		if ($path_arr[1] == $url_arr[1]) {

// 			self::$params = [];

// 		} else if (preg_match('/^[0-9]$/', $path_arr[1])) {
// 			var_dump('ovde');
// 			self::$params[] = $path_arr[1];
// 		} else if (preg_match('/^p[0-9]$/', $path_arr[1])) {
// 			self::$params[] = substr($path_arr[1], 1);
// 		} else {
// 			return;
// 		}
// 	}
// 	call_user_func_array([self::$controller, self::$method], self::$params);
// 	// if ($url == '/'.str_replace(INCL_PATH, '', $server_url)) {
		
// 	// } else {
// 	// 	return;
// 	// }
		

// }

