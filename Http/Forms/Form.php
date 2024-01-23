<?php

namespace Http\Forms;

use Core\ValidationExeption;

class Form
{
    public $errors = [];
    public $attributes = [];

    function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationExeption::throw($this->errors, $this->attributes);
    }

    public function failed()
    {
        return !empty($this->errors);
    }

    public function error($message)
    {
        $this->errors[] = $message;

        return $this;
    }
}
