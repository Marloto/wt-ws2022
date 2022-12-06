<?php
session_start();

$counter = 0;
if(isset($_SESSION["counter"])) {
    $counter = intval($_SESSION["counter"]);
}

$_SESSION["counter"] ++;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Counter: <?= $counter ?></h1>
    <a href="?">Neu laden</a>
</body>
</html>