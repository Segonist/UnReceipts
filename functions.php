<?php

function dd($variable)
{
    echo ("<pre>");
    var_dump($variable);
    echo ("</pre>");
    die();
}

function is_user_logged_in()
{
    return isset($_SESSION["account_id"]);
}