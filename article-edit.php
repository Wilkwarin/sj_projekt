<?php
include_once "templates/header.php";

if (isset($_SESSION["role"]) && $_SESSION["role"] < 2) {
    header("Location: article.php?id=" . $_GET["id"]);
    exit();
}
?>

<main>
    <?php
    $article = new Article();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["title"]) && isset($_POST["body"])) {
            $article->update_article($_POST["id"], $_POST["title"], $_POST["body"]);

            header("Location: article.php?id=" . $_GET["id"]);
            die();
        } else {
            die("Chýbajúce údaje.");
        }
    } else {
        if (isset($_GET["id"])) {
            $a = $article->get_article($_GET["id"]);

            if (!$a) {
                echo "404";
                exit();
            }
        } else {
            echo "404";
            exit();
        }
    }
    ?>

    <form method="POST" class="grid-item devat">
        <input type="hidden" value="<?= $a["id"] ?>" name="id">

        <h2>Nadpis: </h2>
        <input type="text" value="<?= $a["title"] ?>" style="width: 100%;" name="title" />
        <br />

        <h2>Text</h2>
        <textarea style="width: 100%;" rows="16" name="body"><?= $a["body"] ?></textarea>
        <input type="submit" value="Upraviť" />
    </form>
</main>

<?php
include_once "templates/footer.php";
?>