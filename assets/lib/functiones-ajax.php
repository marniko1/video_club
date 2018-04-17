<?php
define('INCL_PATH', '/homework/video_club/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].INCL_PATH);
function my_autoloader($classname) {
    include '../../model/' . $classname . '.php';
}
spl_autoload_register('my_autoloader');
include '../../controller/Controller.php';

$response = [];

switch ($_POST['ajax_fn']) {
	case 'client_filter':
		$pg = $_POST['pg']*2-2;

		$filtered_data = DBRentals::getFilteredRentals('client', $_POST['search_value'], $pg);
		$total_num = count($filtered_data);
		$pagination_data = Controller::preparePaginationLinks($total_num, $_POST['pg']);
		$response = [$filtered_data, $pagination_data];
		echo json_encode($response);
		break;
	
	default:
		echo 'zalutao si bato moj';
		break;
}