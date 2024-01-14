<?php

use Core\App;
use Core\Validator;

$errors = [];

$title = "Log in | UnReceipts";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $valid_username = Validator::valid_string(
        string: $username,
        empty: "Username is required"
    );
    if ($valid_username !== true) {
        $errors[] = $valid_username;
    }

    $valid_password = Validator::valid_string(
        string: $password,
        empty: "Password is required"
    );
    if ($valid_password !== true) {
        $errors[] = $valid_password;
    }

    if (empty($errors)) {
        $db = App::resolve('Core\Database');

        $query = "SELECT * FROM users WHERE username=:username";
        $user = $db->query($query, ["username" => $username])->fetch();

        if (!$user) {
            $errors[] = "Wrong username or password";
            return view(
                "login.view.php",
                [
                    "title" => $title,
                    "errors" => $errors
                ]
            );
        } else {
            $password_hash = $user["password"];
        }

        if (password_verify($password, $password_hash)) {
            $_SESSION["user"] = $username;
            header("Location: /dashboard");
            die();
        } else {
            $errors[] = "Wrong username or password";
            return view(
                "login.view.php",
                [
                    "title" => $title,
                    "errors" => $errors
                ]
            );
        }
    } else {
        return view(
            "login.view.php",
            [
                "title" => $title,
                "errors" => $errors
            ]
        );
    }
}

view(
    "login.view.php",
    [
        "title" => $title
    ]
);
