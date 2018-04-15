<?php

class Controller {
	public $data = [];

	public function show_view($view) {
		
		require 'view/includes/header.php';
		(isset($_SESSION['loged']))?require 'view/includes/navigation.php':false;
		require 'view/'.$view.'.php';
		require 'view/includes/footer.php';
	}
	public function preparePaginationLinks($total_num,$pg) {
		$pg_num = ceil($total_num/6);
		$links = array();
		if (substr($_GET['m'], 1) > 1) {
			array_push($links, ['p'.(substr($_GET['m'], 1)-1), 'Previous']);
		} else {
			array_push($links, ['p1', 'Previous']);
		}
		if ($pg_num < 3) {
			for ($i=1; $i <= $pg_num; $i++) { 
				array_push($links, ['p'.$i, $i]);
			}
		} else {
			for ($i=1; $i <= 3; $i++) { 
				array_push($links, ['p'.$i, $i]);
			}
		}
		if (substr($_GET['m'], 1) < $pg_num) {
			if($_GET['m'] == 'index') {
				array_push($links, ['p2', 'Next']);
			} else {
				array_push($links, ['p'.(substr($_GET['m'], 1)+1), 'Next']);
			}
		} else {
			array_push($links, [$_GET['m'], "Next"]);
		}
		return $links;
	}
}