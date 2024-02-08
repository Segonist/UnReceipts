<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\PurchaseForm;

$form = PurchaseForm::validate($attributes = [
    "id" => $_POST["purchase_id"],
    "new_name" => $_POST["purchase_name"],
    "new_price" => $_POST["purchase_price"],
    "new_category" => $_POST["purchase_category"]
]);

$db = App::resolve(Database::class);

$query = "UPDATE purchases SET user=:user, name=:name, price=:price, category=:category WHERE id=:id;";
$db->query($query, [
    "user" => Session::get("user")["id"],
    "name" => $attributes["new_name"],
    "price" => $attributes["new_price"],
    "category" => $attributes["new_category"],
    "id" => $attributes["id"]
]);

redirect("/purchase?id={$attributes['id']}");
