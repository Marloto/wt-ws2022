<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
session_start();

spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

$action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}

$users = new Model\UserDAO();
$users->insertUser("Ich", "12345678.");

$controller = new Controller($users);
$controller->run();
?>

