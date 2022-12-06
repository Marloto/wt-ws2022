<?php

$counter = 0;
if(isset($_POST["somevalue"])) {
    $counter = intval($_POST["somevalue"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Count: <?= $counter ?></h1>
    <form method="post">
        <input type="hidden" name="somevalue" value="<?= ++ $counter ?>">
        <button>Neu Laden</button>
    </form>
</body>
</html>