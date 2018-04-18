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
		$pg = $_POST['pg'];
		$skip = $_POST['pg']*2-2;
		$search_value = $_POST['search_value'];

		$filtered_data = DBRentals::getFilteredRentals('client', $search_value, $skip);
		$total_rents_num = DBRentals::numberOfRowsInResult('client', $search_value);
		$pagination_data = Controller::preparePaginationLinks($total_rents_num, $pg);
		$response = [$filtered_data, $pagination_data];
		echo json_encode($response);
		break;
	
	default:
		echo 'zalutao si bato moj';
		break;
}