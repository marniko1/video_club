<?php

class Controller {
	public $data = [];

	public function show_view($view) {
		
		require 'view/includes/header.php';
		(isset($_SESSION['loged']))?require 'view/includes/navigation.php':false;
		require 'view/'.$view.'.php';
		require 'view/includes/footer.php';
	}
	public function preparePaginationLinks($total_num, $pg) {
		$pag_links_limit = 4;
		$num_of_showed_res = 2;
		$pg_num = ceil($total_num/$num_of_showed_res);
		$links = array();
		if ($pg_num == 0 || $pg_num == 1) {
			array_push($links, ['p1', 'Previous']);
			array_push($links, ['p1', 1]);
			array_push($links, ['p1', "Next"]);
		} else if ($pg_num == 2) {
			array_push($links, ['p1', 'Previous']);
			array_push($links, ['p1', 1]);
			array_push($links, ['p2', 2]);
			array_push($links, ['p2', "Next"]);
		}
		if ($pg_num >= 3) {
			// if pagination starting link equals 1 (first one)
			if ($pg <= 1) {
				array_push($links, ['p1', 'Previous']);
				if ($pag_links_limit > $pg_num) {
					for ($i=1; $i <= $pg_num; $i++) { 
						array_push($links, ['p'.$i, $i]);
					}
				} else {
					for ($i=1; $i <= $pag_links_limit; $i++) { 
						array_push($links, ['p'.$i, $i]);
					}
				}
				array_push($links, ['p2', "Next"]);
			// if pagination starting link equals last one
			} else if ($pg == $pg_num) {
				array_push($links, ['p'.($pg-1), 'Previous']);
				if ($pag_links_limit > $pg_num) {
					for ($i=$pg_num-1; $i >= 0; $i--) { 
						array_push($links, ['p'.($pg-$i), $pg-$i]);
					}
				} else {
					for ($i=$pag_links_limit-1; $i >= 0; $i--) { 
						array_push($links, ['p'.($pg-$i), $pg-$i]);
					}
				}
				array_push($links, ['p'.$pg, "Next"]);
			// all in the middle
			} else {
				array_push($links, ['p'.($pg-1), 'Previous']);
				$before = strval(floor($pag_links_limit/2));
				$after = strval(ceil($pag_links_limit/2));
				if ($pg - $before <= 0) {
					// var_dump($pg);
					// var_dump($before);
					if ($after  + $pg <= $pg_num) {
						for ($i=1; $i <= $pag_links_limit; $i++) { 
							array_push($links, ['p'.$i, $i]);
						}
					} else {
						for ($i=1; $i <= $pg_num; $i++) { 
							array_push($links, ['p'.$i, $i]);
						}
					}
				} else if ($after  + $pg > $pg_num) {
					if ($pg_num - $pag_links_limit >= 1) {
						for ($i=$pg - $before; $i <= $pg_num; $i++) { 
							array_push($links, ['p'.$i, $i]);
						}
					} else {
						for ($i=1; $i <= $pg_num; $i++) { 
							array_push($links, ['p'.$i, $i]);
						}
					}
				} else {
					// var_dump('trojka');
					for ($i=$pg - $before; $i <= $pag_links_limit; $i++) { 
						array_push($links, ['p'.$i, $i]);
					}
				}
				array_push($links, ['p'.($pg+1), "Next"]);
			}
		}
		return $links;
	}
}