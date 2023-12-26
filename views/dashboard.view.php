<!DOCTYPE html>
<html lang="en">

<?php
$title = "Dashboard";
include("partials/head.php");
?>

<body>

    <?php require("partials/header.php"); ?>

    <main class="glass">
        Dashboard of user
        <?= $user ?>
        <br>
        <a href="log_out.php">Log out</a>
    </main>

    <?php require("partials/footer.php") ?>

</body>

</html>