<?php

use Core\Session;

$title = "Register | UnReceipts";

view(
    "registration/create.view.php",
    [
        "title" => $title,
        "errors" => Session::get("errors")
    ]
);
