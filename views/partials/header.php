<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && $_GET["action"] == "log_out") {
        log_out();
    }
}

view("partials/header.view.php");