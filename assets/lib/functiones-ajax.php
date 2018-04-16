<?php
define('INCL_PATH', '/homework/video_club/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].INCL_PATH);
function my_autoloader($classname) {
    include '../../model/' . $classname . '.php';
}
spl_autoload_register('my_autoloader');

$response = [];

switch ($_POST['ajax_fn']) {
	case 'client_filter':
		if (isset($_POST['pg'])) {
			$pg = $_POST['pg']*6-6;
		} else {
			$pg = 0;
		}
		$response = DBRentals::getFilteredRentals('client', $_POST['search_value'], $pg);
		echo json_encode($response);
		break;
	
	default:
		echo 'zalutao si bato moj';
		break;
}