<!DOCTYPE html>
<html lang="en">

<?php
$title = "Not Found";
require(base_path("views/partials/head.php"));
?>

<body>

    <?php require(base_path("views/partials/header.php")) ?>
    <div class="glass error">
        <h3>The server returned a <?= $code ?> error code with the message: <?= $message ?></h3>
        <img src="<?= host_path('assets/img/desintegration.gif') ?>" alt="not found">
        <button class="btn"><a href="javascript:history.back()">Go back</a></button>
    </div>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>