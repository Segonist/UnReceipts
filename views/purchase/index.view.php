<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="purchases">
    <ul class="table">
        <li class="table-header glass">
            <div class="col name">Name</div>
            <div class="col category">Category</div>
            <div class="col price">Price</div>
        </li>
        <?php foreach ($purchases as $purchase) : ?>
            <li class="table-row glass" id="<?= $purchase["id"] ?>" onclick="redirect_purchase(this.id)">
                <div title="<?= $purchase["name"] ?>" class="col name"><?= $purchase["name"] ?></div>
                <div title="<?= $purchase["category"] ?>" class="col category"><?= $purchase["category"] ?></div>
                <div title="<?= $purchase["price"] ?>" class="col price"><?= $purchase["price"] ?>$</div>
            </li>
        <?php endforeach; ?>
    </ul>
    <script>
        function redirect_purchase(id) {
            window.location.href = `purchase?id=${id}`;
        }
    </script>

</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>