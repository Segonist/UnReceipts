<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = init_database($config);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = $db->query("SELECT * FROM users WHERE username='{$username}';")->fetch();

    if ($user) {
        alert("Account with username {$username} alredy exist");
    } else {
        $user = $db->query("INSERT INTO users (username, password) VALUES ('{$username}', '{$password}');");

        $_SESSION["account_id"] = $db->lastInsertid();
        header("Location: /dashboard");
    }
}

require("views/register.view.php");