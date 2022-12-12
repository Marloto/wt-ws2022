<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

session_start();

function load_articles($path)
{
    $jsonString = file_get_contents($path);
    $data = json_decode($jsonString);
    return $data;
}

function save_articles($path, $data)
{
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    $fp = fopen($path, 'w');
    fwrite($fp, $jsonString);
    fclose($fp);
}

$path = 'articles.json';
$content = load_articles($path);
$action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}

if ($action == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ggf. datenbank oder http-endpunkt
    // für hier, mit konstanten Informationen

    if ($username != "Ich") {
        $error = "Falscher Nutzername";
    } else if ($password != "12345678.") {
        $error = "Falsches Passwort";
    } else {
        // erfolgreich!
        $_SESSION["angemeldet"] = true;
        $_SESSION["username"] = $username;
    }
} else if ($action == 'save') {
    $id = intval($_POST['id']);
    $article = null;
    if (!isset($content[$id])) {
        $article = new stdClass();
        array_unshift($content, $article);
    } else {
        $article = $content[$id];
    }
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    save_articles($path, $content);
}

if ($action == 'logout') {
    $_SESSION["angemeldet"] = false;
    session_unset();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>My Fancy Blog</h1>
        <?php if ($action == 'edit' && isset($_SESSION["angemeldet"]) && $_SESSION["angemeldet"]) {
            $id = intval($_REQUEST['id']);
            $article = null;
            if (!isset($content[$id])) {
                $id = -1;
                $article = (object) array('title' => 'New Content', 'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, perspiciatis?');
            } else {
                $article = $content[$id];
            }
        ?>
            <hr class="mt-5 mb-5">
            <h2 class="mb-3">Edit Content</h2>
            <form method="post" action="example.php">
                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php } ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="titleInput" name="title" placeholder="Your Title" value="<?= $article->title ?>">
                    <label for="titleInput">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="contentInput" name="content" placeholder="Your Name"><?= $article->content ?></textarea>
                    <label for="contentInput">Content</label>
                </div>
                <div class="d-grid gap-2">
                    <input type="hidden" value="<?= $id ?>" name="id">
                    <button class="btn btn-outline-primary" name="action" value="save">Save</button>
                    <a class="btn btn-outline-secondary" href='example.php'>Cancle</a>
                </div>
            </form>
        <?php } else if ($action == 'show-login') { ?>
            <hr class="mt-5 mb-5">
            <h2 class="mb-3">Login</h2>
            <form method="post" action="example.php">
                <?php if (!empty($error)) { ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                <?php } ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="usernameInput" name="username" placeholder="Your Name">
                    <label for="usernameInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="passwordInput" name="password" placeholder="Your Password" type="password">
                    <label for="passwordInput">Password</label>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" name="action" value="login">Login</button>
                    <a class="btn btn-outline-secondary" href="example.php">Cancle</a>
                </div>
            </form>
        <?php } else { ?>
            <?php foreach ($content as $key => $value) { ?>
                <hr class="mt-5 mb-5">
                <h2 class="mb-3"><?= $value->title; ?></h2>
                <p><?= $value->content; ?></p>
                <?php if (isset($_SESSION["angemeldet"]) && $_SESSION["angemeldet"]) { ?>
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-secondary" href="?action=edit&id=<?= $key ?>">Edit</a>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($_SESSION["angemeldet"]) && $_SESSION["angemeldet"]) { ?>
                <hr class="mt-5 mb-5">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-primary" href="?action=edit&id=-1">Add Article</a>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if (!(isset($_SESSION["angemeldet"]) && $_SESSION["angemeldet"])) { ?>
            <?php if ($action != 'show-login') { ?>
                <hr class="mt-5 mb-5">
                <div class="d-grid gap-2">
                    <a class="btn btn-outline-secondary" href="?action=show-login">Login</a>
                </div>
            <?php } ?>
        <?php } else { ?>
            <hr class="mt-5 mb-5">
            <div class="d-grid gap-2">
                <a class="btn btn-outline-warning" href="?action=logout">Logout</a>
            </div>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>