<?php

error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//error_reporting (E_ALL);
ini_set ('display_errors', 1);

session_start(); // startet die Sitzung, ab dem Moment mit $_SESSION

spl_autoload_register(function($class) {
    //include("Model/" . $class . ".php");
    include(str_replace('\\', '/', $class) . '.php');
});

define('CHAT_SERVER_URL', 'https://online-lectures-cs.thi.de/chat');
define('CHAT_SERVER_ID', 'db15d4b1-8053-4838-b1b9-26db50341c9e');

// require("Model/User.php");
$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
?>