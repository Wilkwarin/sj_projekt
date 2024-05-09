<?php
include_once "templates/header.php";
?>

<main style="display: flex; justify-content: center; align-items: center;">
    <div>
        <?php
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $user = new User();
            $u = $user->login($_POST["username"], $_POST["password"]);

            if ($u) {
                $_SESSION["id"] = $u["id"];
                $_SESSION["username"] = $u["username"];
                $_SESSION["role"] = $u["role"];

                header("Location: domov.php");
                exit();
            } else {
                echo "<p>Nesprávne prihlasovacie údaje.</p>";
            }
        }
        ?>
        <h2 style="text-align: center">Prihlásenie</h2>
        <form method="post">
            <label for="username">Používateľské meno:</label> <br />
            <input type="text" name="username" id="username" required /> <br />
            <br />

            <label for="password">Heslo:</label> <br />
            <input type="password" name="password" id="password" required /> <br />
            <br />

            <input type="submit" id="submit" value="Prihlásiť" />
        </form>
    </div>
</main>

<?php
include_once "templates/footer.php";
?>