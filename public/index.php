<?php

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

$router = new \Core\Router;
require(base_path("routes.php"));
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_request_method"] ?? $_SERVER["REQUEST_METHOD"];
$router->route($uri, $method);

?>

<link type="text/css" rel="stylesheet" href="<?= host_path('assets/styles/index.css') ?>">
<script src="<?= host_path('assets/js/preventDrag.js') ?>"></script>