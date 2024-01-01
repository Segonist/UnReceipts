<?php

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = [
    "/" => "controllers/dashboard.php",
    "/login" => "controllers/login.php",
    "/register" => "controllers/register.php",
    "/dashboard" => "controllers/dashboard.php"
];

if (array_key_exists($uri, $routes)) {
    require(base_path($routes[$uri]));
} else {
    http_response_code(404);
    require(base_path("views/404.php"));
}
