<?php

use Core\App;
use Core\Database;
use Http\Forms\RegisterForm;

$errors = [];

$title = "Register | UnReceipts";

$username = $_POST["username"];
$password = $_POST["password"];
$repeat_password = $_POST["repeat_password"];

$form = new RegisterForm();

if (!$form->validate($username, $password, $repeat_password)) {
    return view(
        "registration/create.view.php",
        [
            "title" => $title,
            "errors" => $form->errors()
        ]
    );
}

$db = App::resolve(Database::class);

$query = "SELECT * FROM users WHERE username=:username;";
$user = $db->query($query, ["username" => $username])->fetch();

if ($user) {
    $errors[] = "Account with username {$username} alredy exist";
    return view(
        "registration/create.view.php",
        [
            "title" => $title,
            "errors" => $errors
        ]
    );
} else {
    $query = "INSERT INTO users (username, password) VALUES (:username, :password);";
    $db->query($query, [
        "username" => $username,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($username);
    header("Location: /dashboard");
    die();
}
