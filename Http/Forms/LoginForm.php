<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    function __construct($attributes)
    {
        $valid_username = Validator::valid_string(
            string: $attributes["username"],
            empty: "Username is required"
        );
        if ($valid_username !== true) {
            $this->errors[] = $valid_username;
        }

        $valid_password = Validator::valid_string(
            string: $attributes["password"],
            empty: "Password is required"
        );
        if ($valid_password !== true) {
            $this->errors[] = $valid_password;
        }
    }
}
