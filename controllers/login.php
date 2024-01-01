<?php

use Core\Validator;

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = init_database($config);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $valid_username = Validator::valid_string(
        $string = $username,
        $empty = "Username is required"
    );
    if ($valid_username !== true) {
        $errors[] = $valid_username;
    }

    $valid_password = Validator::valid_string(
        $string = $password,
        $empty = "Password is required"
    );
    if ($valid_password !== true) {
        $errors[] = $valid_password;
    }

    if (empty($errors)) {
        $query = "SELECT * FROM users WHERE username=:username AND password=:password;";
        $user = $db->query($query, ["username" => $username, "password" => $password])->fetch();

        if (!$user) {
            alert("Wrong username or password");
        } else {
            $_SESSION["account_id"] = $user["id"];
            header("Location: /dashboard");
        }
    } else {
        foreach ($errors as $error) {
            alert($error);
        }
    }
}

view("login.view.php");
