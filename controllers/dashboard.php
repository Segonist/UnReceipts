<?php

if (!user_logged_in()) {
    header("Location: /login");
    die();
}

$user = $_SESSION["account_id"];

view("dashboard.view.php", [
    "user" => $user
]);
