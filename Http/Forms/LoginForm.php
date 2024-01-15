<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    private $errors = [];

    public function validate($username, $password)
    {
        $valid_username = Validator::valid_string(
            string: $username,
            empty: "Username is required"
        );
        if ($valid_username !== true) {
            $this->errors[] = $valid_username;
        }

        $valid_password = Validator::valid_string(
            string: $password,
            empty: "Password is required"
        );
        if ($valid_password !== true) {
            $this->errors[] = $valid_password;
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
