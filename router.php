<?php


if (preg_match('/^[0-9]$/', $_GET['m'])) {
	if ($_GET['c'] == 'Rentals') {
		$controller = $_GET['c'];
		$method = 'singleRental';
		$id = $_GET['m'];
		include 'controller/'.$controller.'.php';
		$c = new $controller;
		$c->$method($id);
	}
} else {
	$controller = $_GET['c'];
	$method = $_GET['m'];
	include 'controller/'.$controller.'.php';
	$c = new $controller;
	$c->$method();
}