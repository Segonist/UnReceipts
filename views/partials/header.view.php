<header class="glass">
    <a class="header-left" href="/">
        <img src="<?= host_path('assets/img/logo.svg') ?>">
        <h1><span>Un</span>Receipts</h1>
    </a>
    <div class="header-right">
        <div class="language">🇺🇸</div>
        <button class="btn profile-picture toggle-menu-button"><img src="<?= host_path('assets/img/user.svg') ?>"></button>
    </div>
</header>
<div class="glass user-actions toggle-menu" tabIndex="-1">
    <?php if (Core\Session::has("user")) : ?>
        <a href="/dashboard" class="btn user-action-button">Dashboard</a>
        <a href="#" class="btn user-action-button">Settings</a>
        <form method="POST" action="/login">
            <input type="hidden" name="_request_method" value="DELETE">
            <input class="btn user-action-button" type="submit" value="Log out">
        </form>
    <?php else : ?>
        <a href="/login" class="btn user-action-button">Log in</a>
        <a href="/register" class="btn user-action-button">Register</a>
    <?php endif; ?>
</div>

<script src="<?= host_path('assets/js/toggleMenu.js') ?>"></script>