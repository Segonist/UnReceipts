<?php

use Core\Session;

$title = "New purchase | UnReceipts";

view("purchase/create.view.php", [
    "title" => $title,
    "errors" => Session::get("errors")
]);
