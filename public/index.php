<?php

use Core\Router;
use Core\Session;
use Core\ValidationExeption;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

const BASE_PATH = __DIR__ . '/../';
require(BASE_PATH . "Core/functions.php");

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require(base_path("{$class}.php"));
});

require(base_path("bootstrap.php"));

$router = new Router;
require(base_path("routes.php"));
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_request_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route($uri, $method);
} catch (ValidationExeption $exeption) {
    Session::flash("errors", $exeption->errors);
    Session::flash("old", $exeption->old);

    redirect($router->previousUrl());
}

Session::unflash();
?>

<link type="text/css" rel="stylesheet" href="<?= host_path('assets/styles/index.css') ?>">
<script src="<?= host_path('assets/js/preventDrag.js') ?>"></script>