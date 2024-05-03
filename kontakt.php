<?php
include_once "templates/header.php";
?>
<main>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        echo "<p>Žiadne údaje v kontakte</p>";
    } else {
        $contact = new Contact();

        if (isset($_POST["suhlas"]) && isset($_POST["meno"]) && isset($_POST["email"]) && isset($_POST["poznamka"])) {
            $contact->create_contact($_POST["meno"], $_POST["email"], $_POST["poznamka"]);
            echo '<p>Ďakujeme za Vašu správu.</p>';
        } else {
            echo '<p>Chýbajúce údaje.</p>';
        }
    }
    ?>
</main>
<?php
include_once "templates/footer.php";
?>
