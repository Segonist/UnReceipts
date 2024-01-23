<?php

use Core\Session;

$title = "Dashboard | UnReceipts";

$user = Session::get("user");

view("dashboard.view.php", [
    "title" => $title,
    "user" => $user
]);
