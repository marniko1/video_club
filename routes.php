<?php

if (isset($_SESSION['loged'])) {
	if (isset($_GET['c']) && isset($_GET['m'])) {
		if (preg_match('/^[0-9]$/', $_GET['m'])) {
			if ($_GET['c'] == 'Rentals') {
				$controller = $_GET['c'];
				$method = 'singleRental';
				$id = $_GET['m'];
				include 'controller/'.$controller.'.php';
				$c = new $controller;
				$c->$method($id);
			}
		} else if (preg_match('/^p[0-9]$/', $_GET['m'])) {
			$controller = $_GET['c'];
			include 'controller/'.$controller.'.php';
			$c = new $controller;
			$pg = substr($_GET['m'], 1)*6-6;
			$c->index($pg);
		} else {
			$controller = $_GET['c'];
			$method = $_GET['m'];
			include 'controller/'.$controller.'.php';
			$c = new $controller;
			$c->$method(0);
		}
	} else {
		include 'controller/Rentals.php';
		$c = new Rentals;
		$c->index(0);
	}
} else {
	$controller = 'Login';
	include 'controller/Login.php';
	$c = new $controller;

	if (isset($_GET['m']) && isset($_POST['username']) && isset($_POST['password'])) {
		$method = $_GET['m'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$c->$method($username, $password);
	} else {
		$c->index();
	}
}