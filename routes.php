<?php

$router->get("/", "controllers/index.php");

$router->get("/login", "controllers/login/create.php")->only("guest");
$router->post("/login", "controllers/login/store.php")->only("guest");
$router->delete("/login", "controllers/login/destroy.php")->only("auth");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

$router->get("/dashboard", "controllers/dashboard.php")->only("auth");
