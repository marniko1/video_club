<?php

session_start();

define('INCL_PATH', '/homework/video_club/');
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].INCL_PATH);


include 'core/Route.php';
include 'core/Auth.php';
include 'core/Msg.php';

function my_autoloader($classname) {
    include 'model/' . $classname . '.php';
}
spl_autoload_register('my_autoloader');

include 'controller/BaseController.php';
include 'routes.php';