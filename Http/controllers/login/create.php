<?php

use Core\Session;

$title = "Log in | UnReceipts";

view(
    "login/create.view.php",
    [
        "title" => $title,
        "errors" => Session::get("errors")
    ]
);
