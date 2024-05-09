<?php
include_once "templates/header.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] < 2) {
    header("Location: domov.php");
    exit();
}
?>

<main>
    <?php
    $user = new User();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["id"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["role"])) {
            $user->update_user($_POST["id"], $_POST["username"], $_POST["email"], $_POST["role"]);

            header("Location: admin.php");
            die();
        } else {
            die("Chýbajúce údaje.");
        }
    } else {
        if (isset($_GET["username"])) {
            $u = $user->get_user($_GET["username"]);

            if (!$u) {
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
        <input type="hidden" name="id" value="<?= $u["id"] ?>"/>

        <h2>Username: </h2>
        <input type="text" value="<?= $u["username"] ?>" style="width: 100%;" name="username" />
        <br />

        <h2>E-mail: </h2>
        <input type="email" value="<?= $u["email"] ?>" name="email">

        <h2>Rola: </h2>
        <select name="role">
            <option value="1">Normálny</option>
            <option value="2">Admin</option>
        </select>

        <input type="submit" value="Upraviť" />
    </form>
</main>

<?php
include_once "templates/footer.php";
?>