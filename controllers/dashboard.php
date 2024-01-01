<?php

check_user_logged_in();

$user = $_SESSION["account_id"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && $_GET["action"] == "log_out") {
        log_out();
    }
}

view("dashboard.view.php", array("user" => $user));
