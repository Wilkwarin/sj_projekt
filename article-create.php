<?php
include_once "templates/header.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] < 2) {
    header("Location: domov.php");
    exit();
}
?>

<main>
    <?php
    $article = new Article();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["title"]) && isset($_POST["body"])) {
            $article->create_article($_POST["title"], $_POST["body"], $_SESSION["id"]);

            header("Location: blog.php");
            die();
        } else {
            die("Chýbajúce údaje.");
        }
    }
    ?>

    <form method="POST" class="grid-item devat">
        <h2>Nadpis: </h2>
        <input type="text" placeholder="Sem vložte Váš nadpis" name="title" />
        <br />

        <h2>Text</h2>
        <textarea rows="5" cols="25" name="body" placeholder="Obsah článku"></textarea>
        <input type="submit" value="Vytvoriť" />
    </form>
</main>

<?php
include_once "templates/footer.php";
?>