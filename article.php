<?php
include_once "templates/header.php";
?>

<main>
    <?php
    // TODO: ?edit=true for editing
    if (isset($_GET["id"])) {
        $article = new Article();
        $a = $article->get_article($_GET["id"]);

        if (!$a) {
            echo "404";
            exit();
        }
    } else {
        echo "404";
        exit();
    }
    ?>

    <div>
        <h1 class="resizeText grid-item stroka"><?= $a["title"] ?></h1>
        <span><?= $a["posted"] ?></span>
        <p><?= $a["body"] ?></p>
    </div>
</main>

<?php
include_once "templates/footer.php";
?>