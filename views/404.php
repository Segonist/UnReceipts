<!DOCTYPE html>
<html lang="en">

<?php
$title = "Not Found";
require(base_path("views/partials/head.php"));
?>
<link rel="stylesheet" href="assets/styles/404.css">

<body>

    <?php require(base_path("views/partials/header.php")) ?>
    <div class="glass e404">
        <h3>Resource is not found.</h3>
        <img src="assets/img/desintegration.gif" alt="not found">
        <button class="btn"><a href="javascript:history.back()">Go back</a></button>

    </div>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>