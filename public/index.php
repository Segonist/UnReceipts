<link rel="stylesheet" href="assets/styles/variables.css">
<link rel="stylesheet" href="assets/styles/index.css">

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

const BASE_PATH = __DIR__ . '/../';
require(BASE_PATH . "Core/functions.php");

$config = require(base_path("config.php"));

spl_autoload_register(function ($class) {
    require(base_path("Core/{$class}.php"));
});

require(base_path("Core/router.php"));

?>

<script src="assets/js/preventDrag.js"></script>