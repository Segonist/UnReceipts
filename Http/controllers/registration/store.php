<?php

use Core\Authenticator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate($attributes = [
    "username" => $_POST["username"],
    "password" => $_POST["password"],
    "repeat_password" => $_POST["repeat_password"]
]);

$username_taken = Authenticator::user_exists($attributes["username"]);

if ($username_taken) {
    $form->error("Account with username {$attributes['username']} alredy exist")->throw();
}

Authenticator::new_user($attributes);

Authenticator::login($attributes["username"]);
redirect("/dashboard");
