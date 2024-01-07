<?php

$router->get("/", "controllers/dashboard.php");

$router->get("/login", "controllers/login.php");
$router->post("/login", "controllers/login.php");

$router->get("/register", "controllers/register.php");
$router->post("/register", "controllers/register.php");

$router->get("/dashboard", "controllers/dashboard.php");
