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
        <p>Vytaj, <?= $_SESSION["username"] ?></p>

        <table style="table-border: 1px solid">
            <thead>
                <tr>
                    <th>Používateľské meno</th>
                    <th>E-mail</th>
                    <th>Dátum registrácie</th>
                    <th>Rola</th>
                    <th>Upraviť</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $userObj = new User();
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
                            <a class="btn" href="#">Upraviť</a>
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