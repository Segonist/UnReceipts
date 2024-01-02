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
    </main>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>