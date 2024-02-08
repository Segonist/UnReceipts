<?php

namespace Http\Forms;

use Core\Validator;

class PurchaseForm extends Form
{
    function __construct($attributes)
    {
        $valid_name = Validator::valid_string(
            string: $attributes["new_name"],
            empty: "Purchase name is required",
            not_in_range: ["min" => 1, "max" => 255, "message" => "Purchase name must be between 1 and 255 characters"]
        );
        if ($valid_name !== true) {
            $this->errors[] = $valid_name;
        }

        $valid_price = Validator::valid_string(
            string: $attributes["new_price"],
            empty: "Purchase price is required",
        );
        if ($valid_price !== true) {
            $this->errors[] = $valid_price;
        }

        $valid_category = Validator::valid_string(
            string: $attributes["new_category"],
            not_in_range: ["min" => 1, "max" => 255, "message" => "Purchase category must be between 1 and 255 characters"]
        );
        if ($valid_category !== true) {
            $this->errors[] = $valid_category;
        }
    }
}
