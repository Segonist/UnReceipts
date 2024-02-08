<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        alert($error);
    }
}
?>

<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="glass edit-purchase">
    <form method="POST" action="/purchase/edit">
        <input type="hidden" name="_request_method" value="PUT">
        <input type="hidden" name="purchase_id" value="<?= $purchase_info["id"] ?>">
        <label for="purchase_name">Purchase name:</label>
        <input type="text" name="purchase_name" id="purchase_name" value="<?= $purchase_info["name"] ?>">
        <label for="purchase_price">Purchase price:</label>
        <div>
            <input type="number" name="purchase_price" id="purchase_price" value="<?= $purchase_info["price"] ?>">
            <span>$</span>
        </div>
        <label for="purchase_category">Category:</label>
        <input type="text" name="purchase_category" id="purchase_category" value="<?= $purchase_info["category"] ?>">
        <div class="buttons">
            <input class="btn" type="submit" value="Edit purchase">
            <a href="/purchases" class="btn">Back</a>
        </div>
    </form>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>