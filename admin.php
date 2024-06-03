<?php
include_once "templates/header.php";

if (!isset($_SESSION["role"]) || $_SESSION["role"] < 2) {
    header("Location: domov.php");
    exit();
}
?>

<main>
    <div>
        <h1>Admin</h1>
        <p>Vitaj, <?= $_SESSION["username"] ?></p>

        <table style="table-border: 1px solid">
            <thead>
                <tr>
                    <th>Používateľské meno</th>
                    <th>E-mail</th>
                    <th>Dátum registrácie</th>
                    <th>Rola</th>
                    <th>Upraviť</th>
                    <th>Zmazať</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $userObj = new User();

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_POST["delete"])) {
                        $userObj->delete_user($_POST["id"]);
                        header("Location: admin.php");
                        die();
                    }
                }

                $users = $userObj->get_users();

                for ($i = 0; $i < count($users); $i++) {
                    $user = $users[$i];
                    ?>
                    <tr>
                        <td><?= $user["username"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["registered"] ?></td>
                        <?php
                        if ($user["role"] == 1) {
                            echo "<td>normálny</td>";
                        } else {
                            echo "<td>admin</td>";
                        }
                        ?>
                        <td>
                            <a class="btn" href="user-edit.php?username=<?= $user["username"] ?>">Upraviť</a>
                        </td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $user["id"] ?>" />
                                <button class="btn" type="submit" name="delete">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once "templates/footer.php";
?>