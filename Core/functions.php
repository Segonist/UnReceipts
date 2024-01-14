<?php

function dd($variable)
{
    echo ("<pre>");
    var_dump($variable);
    echo ("</pre>");
    die();
}

function alert($message)
{
    echo ("<script>alert('{$message}')</script>");
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

function host_path($path)
{
    return "http://{$_SERVER["HTTP_HOST"]}/{$path}";
}

function abort($code = 404, $message = "")
{
    http_response_code($code);
    return view("error.php", ["code" => $code, "message" => $message]);
}

function login($user)
{
    $_SESSION["user"] = $user;

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}
