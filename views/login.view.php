<!DOCTYPE html>
<html lang="en">

<?php
$title = "Login page";
require(base_path("views/partials/head.php"));
?>
<link rel="stylesheet" href="assets/styles/auth.css">

<body>

    <?php require(base_path("views/partials/header.php")); ?>

    <main class="glass auth">
        <form method="post" autocomplete="off">
            <input type="hidden" name="action" value="login">
            <label for="username">Username:</label>
            <input class="auth-info-input" type="text" name="username" id="username" value="<?= $_POST["username"] ?? '' ?>">
            <label for="password">Password:</label>
            <input class="auth-info-input" type="password" name="password" id="password" value="<?= $_POST["password"] ?? '' ?>">
            <input class="btn" type="submit" value="Log in">
        </form>
        <p>Do not have an account? <button class="btn"><a href="/register">Create!</a></button></p>
    </main>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>