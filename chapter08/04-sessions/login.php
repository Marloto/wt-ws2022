<?php
session_start();


if($_POST['action'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ggf. datenbank oder http-endpunkt
    // für hier, mit konstanten Informationen
    
    if($username != "Ich") {
        $error = "Falscher Nutzername";
    } else if($password != "12345678.") {
        $error = "Falsches Passwort";
    } else {
        // erfolgreich!
        $_SESSION["angemeldet"] = true;
        $_SESSION["username"] = $username;

        // Header modifikation
        header("Location: anderswo.php");
        exit();
    }
}

if($_GET['action'] == 'logout') {
    $_SESSION["angemeldet"] = false;
    session_destroy();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <p><label>Username: </label><input name="username" value="<?= $_POST['username']; ?>"></p>
        <p><label>Password: </label><input type="password" name="password"></p>
        <p><?= $error ?></p>
        <button name="action" value="login">Login</button>
    </form>
</body>
</html>