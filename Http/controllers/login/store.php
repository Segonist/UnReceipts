<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$errors = [];

$title = "Log in | UnReceipts";

$username = $_POST["username"];
$password = $_POST["password"];

$form = new LoginForm();

if (!$form->validate($username, $password)) {
    return view(
        "login/create.view.php",
        [
            "title" => $title,
            "errors" => $form->errors()
        ]
    );
}

$db = App::resolve(Database::class);

$query = "SELECT * FROM users WHERE username=:username";
$user = $db->query($query, ["username" => $username])->fetch();

if ($user) {
    $password_hash = $user["password"];

    if (password_verify($password, $password_hash)) {
        login($username);
        header("Location: /dashboard");
        die();
    }
}

$errors[] = "Wrong username or password";
return view(
    "login/create.view.php",
    [
        "title" => $title,
        "errors" => $errors
    ]
);
