<?php
namespace View;
class DefaultView {
    public function show($authentificated) {
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
                <hr class="mt-5 mb-5">
                <?php if ($authentificated) { ?>
                    <p>Angemeldet!</p>
                <?php } else { ?>
                    <p>Nicht angemeldet!</p>
                <?php } ?>
                <?php if (!($authentificated)) { ?>
                    <hr class="mt-5 mb-5">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-secondary" href="?action=show-login">Login</a>
                    </div>
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
<?php
    }
}
?>