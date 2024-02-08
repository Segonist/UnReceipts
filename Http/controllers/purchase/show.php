<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$query = "SELECT id, name, price, category, added FROM purchases WHERE user=:user AND id=:id";
$purchase_info = $db->query($query, [
    "user" => Session::get("user")["id"],
    "id" => $_GET["id"]
])->fetch();

$purchase_info["added"] = date("m.d.Y", strtotime($purchase_info["added"]));

$title = "{$purchase_info["name"]} | UnReceipts";

view("purchase/show.view.php", [
    "title" => $title,
    "purchase_info" => $purchase_info
]);
