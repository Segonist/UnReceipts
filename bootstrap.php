<?php

use \Core\App;
use \Core\Container;
use \Core\Database;

$container = new Container();

App::setContainer($container);

App::bind(Database::class, function () {
    $config = require(base_path("config.php"));
    $db_config = $config["db_config"];
    $db = new Database($db_config, $db_config["username"], $db_config["password"]);
    return $db;
});
