<?php
$counter = 0;
if(isset($_GET['counter'])) {
    $counter = intval($_GET['counter']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Counter: <?= $counter; ?></h1>
    <a href="?counter=<?= $counter + 1; ?>">Neu laden!</a>
</body>
</html>