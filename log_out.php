<?php

session_start();
unset($_SESSION["account_id"]);
header("Location: /");