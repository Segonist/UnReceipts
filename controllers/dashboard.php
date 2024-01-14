<?php

$user = $_SESSION["user"];

view("dashboard.view.php", [
    "title" => "Dashboard | UnReceipts",
    "user" => $user
]);
