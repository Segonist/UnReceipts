<?php

use Core\App;
use Core\Database;
use Core\Session;

$title = "Your purchases | UnReceipts";

$db = App::resolve(Database::class);

$query = "SELECT id, name, price, category, added FROM purchases WHERE user=:id ORDER BY added DESC";
$purchases = $db->query($query, [
    "id" => Session::get("user")["id"],
])->fetchAll();

view("purchase/index.view.php", [
    "title" => $title,
    "purchases" => $purchases
]);
