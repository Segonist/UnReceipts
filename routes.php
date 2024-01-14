<?php

$router->get("/", "controllers/index.php");

$router->get("/login", "controllers/login.php")->only("guest");
$router->post("/login", "controllers/login.php")->only("guest");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

$router->get("/dashboard", "controllers/dashboard.php")->only("auth");
