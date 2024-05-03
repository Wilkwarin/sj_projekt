<?php
include_once "templates/header.php";

if (isset($_SESSION["role"]) && $_SESSION["role"] < 2) {
    header("Location: domov.php");
    exit();
}
?>

<main>
    <p>aha som admin</p>
</main>

<?php
include_once "templates/footer.php";
?>
