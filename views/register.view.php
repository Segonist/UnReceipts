<!DOCTYPE html>
<html lang="en">

<?php
$title = "Register page";
require(base_path("views/partials/head.php"));
?>

<body>

    <?php require(base_path("views/partials/header.php")); ?>

    <main class="glass auth">
        <form method="post" autocomplete="off">
            <input type="hidden" name="action" value="register">
            <label for="username">Username:</label>
            <input class="auth-info-input" type="text" name="username" id="username" value="<?= $_POST["username"] ?? '' ?>">
            <label for="password">Password:</label>
            <input class="auth-info-input" type="password" name="password" id="password" value="<?= $_POST["password"] ?? '' ?>">
            <label for="password">Repeat password:</label>
            <input class="auth-info-input" type="password" name="repeat_password" id="repeat_password" value="<?= $_POST["repeat_password"] ?? '' ?>">
            <input class="btn" type="submit" value="Register">
        </form>
        <p>Already have an account? <button class="btn"><a href="/login">Log in!</a></button></p>
    </main>

    <?php require(base_path("views/partials/footer.php")) ?>

</body>

</html>