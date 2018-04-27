<?php
include 'Route.php';
// if (isset($_SESSION['loged'])) {
// 	if (isset($_GET['c']) && isset($_GET['m'])) {
// 		// route for single rental view
// 		if (preg_match('/^[0-9]$/', $_GET['m'])) {
// 			if ($_GET['c'] == 'Rentals') {
// 				$controller = $_GET['c'];
// 				$method = 'singleRental';
// 				$id = $_GET['m'];
// 				include 'controller/'.$controller.'.php';
// 				$c = new $controller;
// 				$c->$method($id);
// 			}
// 		// route for pagination click - only if there is no ajax calls for pagination, javascript disabled
// 		} else if (preg_match('/^p[0-9]$/', $_GET['m'])) {
// 			$controller = $_GET['c'];
// 			include 'controller/'.$controller.'.php';
// 			$c = new $controller;
// 			$pg = substr($_GET['m'], 1);
// 			$skip = substr($_GET['m'], 1)*2-2;
// 			$c->index($pg, $skip);
// 		} else {
// 			$controller = $_GET['c'];
// 			$method = $_GET['m'];
// 			include 'controller/'.$controller.'.php';
// 			$c = new $controller;
// 			$c->$method(0, 0);
// 		}
// 	// route for home page - no $_GET['c'] & $_GET['m'] are setted
// 	} else {
// 		include 'controller/Rentals.php';
// 		$c = new Rentals;
// 		$c->index(0, 0);
// 	}
// // if there is no login session always show login view
// } else {
// 	$controller = 'Login';
// 	include 'controller/Login.php';
// 	$c = new $controller;

// 	if (isset($_GET['m']) && isset($_POST['username']) && isset($_POST['password'])) {
// 		$method = $_GET['m'];
// 		$username = $_POST['username'];
// 		$password = $_POST['password'];
// 		$c->$method($username, $password);
// 	} else {
// 		$c->index();
// 	}
// }
// Route::get('/', 'Rentals@index');
Route::get('/Rentals/index', 'Rentals@index');
// Route::get('/Films/index', 'Films@index');
// Route::get('/Clients/index', 'Clients@index');
Route::get('/Rentals/{id}', 'Rentals@singleRental');