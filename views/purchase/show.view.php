<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="purchase glass">
    <div class="buttons">
        <a href="/purchase/edit?id=<?= $purchase_info["id"] ?>" class="btn">Edit</a>
        <a href="/purchases" class="btn">Back</a>
    </div>
    <p class="name"><?= $purchase_info["name"] ?></p>
    <p><span class="label">Category:</span> <?= $purchase_info["category"] ?></p>
    <p><span class="label">Added:</span> <?= $purchase_info["added"] ?></p>
    <p><span class="label">Price:</span> <?= $purchase_info["price"] ?>$</p>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>