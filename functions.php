<?php

function dd($variable)
{
    echo ("<pre>");
    var_dump($variable);
    echo ("</pre>");
    die();
}

function check_user_logged_in()
{
    if (!isset($_SESSION["account_id"])) {
        header("Location: /login");
    }
}

function alert($message)
{
    echo ("<script>alert('{$message}')</script>");
}

function init_database($config)
{
    include("Database.php");
    $db_config = $config["db_config"];
    $db = new Database($db_config, $db_config["username"], $db_config["password"]);
    return $db;
}