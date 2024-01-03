<?php

user_logged_in("/login");

$user = $_SESSION["account_id"];

view("dashboard.view.php", [
    "user" => $user
]);
