<!DOCTYPE html>
<html lang="en">

<?php
$title = "Dashboard";
require(base_path("views/partials/head.php"));
?>

<body>

    <?php require(base_path("views/partials/header.php")); ?>

    <main class="glass">
        Dashboard of user
        <?= $user ?>
        <br>
        <form method="get">
            <input type="hidden" name="action" value="log_out">
            <input class="btn" type="submit" value="Log out">
        </form>
    </main>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>