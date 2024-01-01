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
        die();
    }
}

function alert($message)
{
    echo ("<script>alert('{$message}')</script>");
}

function init_database($config)
{
    $db_config = $config["db_config"];
    $db = new Database($db_config, $db_config["username"], $db_config["password"]);
    return $db;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($view, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$view}");
}

function log_out()
{
    session_start();
    unset($_SESSION["account_id"]);
    header("Location: /");
}
