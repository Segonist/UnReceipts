<?php

use Core\App;
use Core\Validator;

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    $valid_username = Validator::valid_string(
        string: $username,
        empty: "Username is required",
        not_in_range: ["min" => 3, "max" => 32, "message" => "Username must be between 3 and 32 characters"],
        reg_exps: ["/^[a-zA-Z0-9_]+$/" => "Username must contain only letters, numbers and underscore"]
    );
    if ($valid_username !== true) {
        $errors[] = $valid_username;
    }

    $valid_password = Validator::valid_string(
        string: $password,
        empty: "Password is required",
        not_in_range: ["min" => 8, "max" => 32, "message" => "Password must be between 8 and 32 characters"],
        reg_exps: ["/^(?=.*[a-zA-Z])(?=.*\d).+$/" => "Password must contain at least one letter and number"],
        not_equals: [$password, $repeat_password, "message" => "Passwords do not match"]
    );
    if ($valid_password !== true) {
        $errors[] = $valid_password;
    }

    if (empty($errors)) {
        $db = App::resolve("Core\Database");

        $query = "SELECT * FROM users WHERE username=:username;";
        $user = $db->query($query, ["username" => $username])->fetch();

        if ($user) {
            alert("Account with username {$username} alredy exist");
        } else {
            $query = "INSERT INTO users (username, password) VALUES (:username, :password);";
            $user = $db->query($query, ["username" => $username, "password" => $password]);

            $_SESSION["account_id"] = $db->lastInsertid();
            header("Location: /dashboard");
        }
    } else {
        foreach ($errors as $error) {
            alert($error);
        }
    }
}

view("register.view.php");
