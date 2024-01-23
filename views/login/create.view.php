<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        alert($error);
    }
}
?>

<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="glass auth">
    <form method="POST" action="/login" autocomplete="off">
        <label for="username">Username:</label>
        <input class="auth-info-input" type="text" name="username" id="username" value="<?= old("username") ?>">
        <label for="password">Password:</label>
        <input class="auth-info-input" type="password" name="password" id="password" value="<?= old("password") ?>">
        <input class="btn" type="submit" value="Log in">
    </form>
    <p>Do not have an account? <button class="btn"><a href="/register">Create!</a></button></p>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>