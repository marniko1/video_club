<?php

define('INCL_PATH', '/homework/video_club/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].INCL_PATH);
session_start();
function my_autoloader($classname) {
    include 'model/' . $classname . '.php';
}
spl_autoload_register('my_autoloader');
// $test = DBRentals::getSingleRental(3);
// var_dump($test);die;
include 'controller/Controller.php';
include 'router.php';