<?php

function dd($variable)
{
    echo ("<pre>");
    var_dump($variable);
    echo ("</pre>");
    die();
}

function user_logged_in($return_to = false)
{
    if (isset($_SESSION["account_id"])) {
        return true;
    } else {
        if ($return_to) {
            header("Location: {$return_to}");
            die();
        } else {
            return false;
        }
    }
}

function alert($message)
{
    echo ("<script>alert('{$message}')</script>");
}

function init_database($config)
{
    $db_config = $config["db_config"];
    $db = new Core\Database($db_config, $db_config["username"], $db_config["password"]);
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
    die();
}
