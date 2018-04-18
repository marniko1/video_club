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
		if ($pg_num >= 3) {
			if ($pg <= 1) {
				array_push($links, ['p1', 'Previous']);
				array_push($links, ['p1', 1]);
				array_push($links, ['p2', 2]);
				array_push($links, ['p3', 3]);
				array_push($links, ['p2', "Next"]);
			} else if ($pg == $pg_num) {
				array_push($links, ['p'.($pg-1), 'Previous']);
				array_push($links, ['p'.($pg-2), $pg-2]);
				array_push($links, ['p'.($pg-1), $pg-1]);
				array_push($links, ['p'.$pg, $pg]);
				array_push($links, ['p'.$pg, "Next"]);
			} else {
				array_push($links, ['p'.($pg-1), 'Previous']);
				array_push($links, ['p'.($pg-1), $pg-1]);
				array_push($links, ['p'.$pg, $pg]);
				array_push($links, ['p'.($pg+1), $pg+1]);
				array_push($links, ['p'.($pg+1), "Next"]);
			}
		} else {
			if ($pg_num == 2) {
				array_push($links, ['p1', 'Previous']);
				array_push($links, ['p1', 1]);
				array_push($links, ['p2', 2]);
				array_push($links, ['p2', "Next"]);
			} else {
				array_push($links, ['p1', 'Previous']);
				array_push($links, ['p1', 1]);
				array_push($links, ['p1', "Next"]);
			}
		}
		return $links;
	}
}