<?php

use Core\Authenticator;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && $_GET["action"] == "log_out") {
        Authenticator::logout();
    }
}

view("partials/header.view.php");
