<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$title = "Log in | UnReceipts";

$form = LoginForm::validate($attributes = [
    "username" => $_POST["username"],
    "password" => $_POST["password"]
]);

$signedIn = Authenticator::attempt($attributes["username"], $attributes["password"]);

if (!$signedIn) {
    $form->error("Wrong username or password")->throw();
    redirect("/login");
}

redirect("/dashboard");
