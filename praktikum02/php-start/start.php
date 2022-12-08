<?php
session_start();

error_reporting (E_ALL & ~E_NOTICE & ~E_DEPRECATED);  
ini_set ('display_errors', 1);

spl_autoload_register(function($class) {
    //include("Model/" . $class . ".php");
    include(str_replace('\\', '/', $class) . '.php');
});

define('CHAT_SERVER_URL', "https://online-lectures-cs.thi.de/chat");
define('CHAT_SERVER_ID', "db15d4b1-8053-4838-b1b9-26db50341c9e");

$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
?>