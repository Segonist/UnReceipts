<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = init_database($config);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = $db->query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}';")->fetch();

    if (!$user) {
        alert("Wrong username or password");
    } else {
        $_SESSION["account_id"] = $user["id"];
        header("Location: /dashboard");
    }
}


require("views/login.view.php");