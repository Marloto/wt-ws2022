<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

session_start();

spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});


$users = new Model\UserDAO();
$articles = new Model\ArticleDAO('articles.json');
$users->insertUser("Ich", "12345678.");

$controller = new Controller($users, $articles);
$controller->run();
?>