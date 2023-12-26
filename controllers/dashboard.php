<?php

check_user_logged_in();

$user = $_SESSION["account_id"];

require("views/dashboard.view.php");