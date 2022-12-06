<?php

$counter = 0;
if(isset($_COOKIE['counter'])) {
    $counter = intval($_COOKIE['counter']);
}

setcookie('counter', $counter + 1);
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