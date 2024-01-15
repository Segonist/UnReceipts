<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm
{
    private $errors = [];

    public function validate($username, $password, $repeat_password)
    {
        $valid_username = Validator::valid_string(
            string: $username,
            empty: "Username is required",
            not_in_range: ["min" => 3, "max" => 32, "message" => "Username must be between 3 and 32 characters"],
            reg_exps: ["/^[a-zA-Z0-9_]+$/" => "Username must contain only letters, numbers and underscore"]
        );
        if ($valid_username !== true) {
            $this->errors[] = $valid_username;
        }

        $valid_password = Validator::valid_string(
            string: $password,
            empty: "Password is required",
            not_in_range: ["min" => 8, "max" => 32, "message" => "Password must be between 8 and 32 characters"],
            reg_exps: ["/^(?=.*[a-zA-Z])(?=.*\d).+$/" => "Password must contain at least one letter and number"],
            not_equals: [$password, $repeat_password, "message" => "Passwords do not match"]
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
