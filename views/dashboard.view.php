<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="dashboard">
    <h2>Dashboard of <?= $user["username"] ?></h2>
    <div class="cards">
        <a href="/purchases" class="btn glass dashboard-card">
            <img class="icon" src="assets/img/shopping-cart.svg" alt="">
            <p>See all purchases</p>
        </a>
        <a href="/purchase/create" class="btn glass dashboard-card new-purchase">
            <img class="icon" src="assets/img/plus-circle.svg">
            <p>Add new purchase</p>
        </a>
    </div>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>