<?php

$router->get("/", "index.php");

$router->get("/login", "login/create.php")->only("guest");
$router->post("/login", "login/store.php")->only("guest");
$router->delete("/login", "login/destroy.php")->only("auth");

$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");

$router->get("/dashboard", "dashboard.php")->only("auth");
