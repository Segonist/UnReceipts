<?php

namespace Core;

class Validator
{
    public static function empty(string $string)
    {
        return trim($string) === "";
    }
    public static function length_not_in_range(string $string, int $min = 1, int $max = INF)
    {
        return strlen($string) < $min || strlen($string) > $max;
    }
    public static function not_equals(string $string, string $value) {
        return $string !== $value;
    }
    public static function valid_string($string, bool|string $empty=false, bool|array $not_in_range=false, bool|array $reg_exps=false, bool|array $not_equals=false)
    {
        if ($empty !== false) {
            if (Validator::empty($string)) { 
                return $empty ?? '';
            }
        }
        if ($not_in_range !== false) {
            $min = $not_in_range["min"] ?? 1;
            $max = $not_in_range["max"] ?? INF;
            if (Validator::length_not_in_range($string, $min, $max)) {
                return $not_in_range["message"] ?? '';
            }
        }
        if ($reg_exps !== false) {
            foreach ($reg_exps as $reg_exp => $message) {
                if (!preg_match($reg_exp, $string)) {
                    return $message ?? '';
                }
            }
        }
        if ($not_equals !== false) {
            $string = $not_equals[0];
            $value = $not_equals[1];
            if (Validator::not_equals($string, $value)) {
                return $not_equals["message"] ?? '';
            }
        }
        return true;
    }
}
