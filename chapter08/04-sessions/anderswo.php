<?php
session_start();

if(!$_SESSION["angemeldet"]) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Hello, <?= $_SESSION["username"] ?></h1>
    <a href="login.php?action=logout">Logout</a>
</body>
</html>