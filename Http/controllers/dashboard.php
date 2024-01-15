<?php

$title = "Dashboard | UnReceipts";

$user = $_SESSION["user"];

view("dashboard.view.php", [
    "title" => $title,
    "user" => $user
]);
