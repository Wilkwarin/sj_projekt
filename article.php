<?php
include_once "templates/header.php";
?>

<main>
    <?php
    $article = new Article();

    if (isset($_GET["id"])) {
        $a = $article->get_article($_GET["id"]);

        if (!$a) {
            echo "404";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["delete"])) {
                $article->delete_article($a["id"]);
                header("Location: blog.php");
                die();
            }
        }
    } else {
        echo "404";
        exit();
    }
    ?>

    <div class="grid-item devat">
        <h1><?= $a["title"] ?></h1>
        <span><?= $a["posted"] ?></span>
        <p><?= str_replace("\n", "<br>", $a["body"]) ?></p>


        <?php
        if (isset($_SESSION["role"]) && $_SESSION["role"] >= 2) {
            ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $a["id"] ?>" />
                <button class="btn" type="submit" name="delete">Zmazať</button>
            </form>

            <br><br>
            <a class="btn" href="article-edit.php?id=<?= $a["id"] ?>">Upraviť</a>
            <?php
        }
        ?>
    </div>
</main>

<?php
include_once "templates/footer.php";
?>