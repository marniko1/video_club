<?php

class Controller {
	public $data = [];

	public function show_view($view) {
		
		require 'view/includes/header.php';
		(isset($_SESSION['loged']))?require 'view/includes/navigation.php':false;
		require 'view/'.$view.'.php';
		require 'view/includes/footer.php';
	}
	public static function preparePaginationLinks($total_num, $pg) {
		$pg_num = ceil($total_num/2);
		$links = array();
		if ($pg > 1) {
			array_push($links, ['p'.($pg-1), 'Previous']);
		} else {
			array_push($links, ['p1', 'Previous']);
		}
		// if ($pg_num < 3) {
			for ($i=1; $i <= $pg_num; $i++) { 
				array_push($links, ['p'.$i, $i]);
			}
		// } else {
		// 	for ($i=1; $i <= 3; $i++) { 
		// 		array_push($links, ['p'.$i, $i]);
		// 	}
		// }
		if ($pg < $pg_num) {
			if($pg == 'index') {
				array_push($links, ['p2', 'Next']);
			} else {
				array_push($links, ['p'.$pg, 'Next']);
			}
		} else {
			array_push($links, [$pg, "Next"]);
		}
		return $links;
	}
}