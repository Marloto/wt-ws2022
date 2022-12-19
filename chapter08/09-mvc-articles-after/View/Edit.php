<?php

namespace View;

class Edit
{
    public function show($article, $id, $error = "")
    {
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
                <h2 class="mb-3">Edit Content</h2>
                <form method="post" action="index.php">
                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger" role="alert"><?= $error ?></div>
                    <?php } ?>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="titleInput" name="title" placeholder="Your Title" value="<?= $article->getTitle() ?>">
                        <label for="titleInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="contentInput" name="content" placeholder="Your Name"><?= $article->getContent() ?></textarea>
                        <label for="contentInput">Content</label>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="hidden" value="<?= $id ?>" name="id">
                        <button class="btn btn-outline-primary" name="action" value="save">Save</button>
                        <a class="btn btn-outline-secondary" href='index.php'>Cancle</a>
                    </div>
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
}
