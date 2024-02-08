<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        alert($error);
    }
}
?>

<?php require(base_path("views/partials/top_html_tags.php")); ?>

<?php require(base_path("views/partials/header.php")); ?>

<main class="glass create-purchase">
    <form method="POST" action="/purchase">
        <input type="hidden" name="_request_method" value="POST">
        <label for="purchase_name">Purchase name:</label>
        <input type="text" name="purchase_name" id="purchase_name">
        <label for="purchase_price">Purchase price:</label>
        <div>
            <input type="number" name="purchase_price" id="purchase_price">
            <span>$</span>
        </div>
        <!-- Категорії мають створюватись окремо -->
        <label for="purchase_category">Category:</label>
        <input type="text" name="purchase_category" id="purchase_category">
        <div class="buttons">
            <input class="btn" type="submit" value="Add purchase">
            <a href="/dashboard" class="btn">Back</a>
        </div>
    </form>
</main>

<?php require(base_path("views/partials/footer.php")) ?>

<?php require(base_path("views/partials/bottom_html_tags.php")); ?>