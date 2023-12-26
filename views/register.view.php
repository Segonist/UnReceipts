<!DOCTYPE html>
<html lang="en">

<?php
$title = "Register page";
include("partials/head.php");
?>
<link rel="stylesheet" href="assets/styles/auth.css">

<body>

    <?php require("partials/header.php"); ?>

    <main class="glass auth">
        <form method="post" autocomplete="off">
            <input type="hidden" name="action" value="register">
            <label for="username">Username:</label>
            <input class="auth-info-input" type="text" name="username" id="username">
            <label for="password">Password:</label>
            <input class="auth-info-input" type="password" name="password" id="password">
            <label for="password">Repeat password:</label>
            <input class="auth-info-input" type="password" name="repeat_password" id="password">
            <input class="btn" type="submit" value="Register">
        </form>
        <p>Already have an account? <button class="btn"><a href="/login">Log in!</a></button></p>
    </main>

    <?php require("partials/footer.php") ?>

</body>

</html>