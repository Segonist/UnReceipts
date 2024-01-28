<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="glass auth">
    <form method="POST" action="/register" autocomplete="off">
        <label for="username">Username:</label>
        <input class="auth-info-input" type="text" name="username" id="username" value="<?= old("username") ?>">
        <label for="password">Password:</label>
        <input class="auth-info-input" type="password" name="password" id="password" value="<?= old("password") ?>">
        <label for="password">Repeat password:</label>
        <input class="auth-info-input" type="password" name="repeat_password" id="repeat_password" value="<?= old("repeat_password") ?>">
        <input class="btn" type="submit" value="Register">
    </form>
    <p>Already have an account? <button class="btn"><a href="/login">Log in!</a></button></p>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>