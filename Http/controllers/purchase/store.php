<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\PurchaseForm;

$form = PurchaseForm::validate($attributes = [
    "purchase_name" => $_POST["purchase_name"],
    "purchase_price" => $_POST["purchase_price"],
    "purchase_category" => $_POST["purchase_category"]
]);

$db = App::resolve(Database::class);

$current_time = date("Y-m-d H:i:s");

$query = "INSERT INTO purchases (user, name, price, category, added) 
        VALUES (:user, :name, :price, :category, :added);";
$db->query($query, [
    "user" => Session::get("user")["id"],
    "name" => $attributes["purchase_name"],
    "price" => $attributes["purchase_price"],
    "category" => $attributes["purchase_category"],
    "added" => $current_time
]);

redirect("/dashboard");
