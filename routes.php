<?php

$router->get("/", "index.php");

$router->get("/login", "login/create.php")->only("guest");
$router->post("/login", "login/store.php")->only("guest");
$router->delete("/login", "login/destroy.php")->only("auth");

$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");

$router->get("/dashboard", "dashboard.php")->only("auth");
$router->get("/purchases", "purchase/index.php")->only("auth");
$router->get("/purchase", "purchase/show.php")->only("auth");
$router->get("/purchase/create", "purchase/create.php")->only("auth");
$router->post("/purchase", "purchase/store.php")->only("auth");
$router->get("/purchase/edit", "purchase/edit.php")->only("auth");
$router->put("/purchase/edit", "purchase/update.php")->only("auth");
