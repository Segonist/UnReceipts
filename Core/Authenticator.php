<?php

namespace Core;

class Authenticator
{
    public static function attempt($username, $password)
    {
        $db = App::resolve(Database::class);

        $query = "SELECT * FROM users WHERE username=:username";
        $user = $db->query($query, ["username" => $username])->fetch();

        if ($user) {
            $password_hash = $user["password"];

            if (password_verify($password, $password_hash)) {
                static::login($username);

                return $user["id"];
            }
        }

        return false;
    }

    public static function new_user($attributes)
    {
        $db = App::resolve(Database::class);

        $query = "INSERT INTO users (username, password) VALUES (:username, :password);";
        $db->query($query, [
            "username" => $attributes["username"],
            "password" => password_hash($attributes["password"], PASSWORD_BCRYPT)
        ]);

        return $db->lastInsertId();
    }

    public static function user_exists($username)
    {
        $db = App::resolve(Database::class);

        $query = "SELECT username FROM users WHERE username=:username;";
        $user = $db->query($query, ["username" => $username])->fetch();

        return (bool)$user;
    }

    public static function login($user)
    {
        Session::put("user", $user);

        session_regenerate_id(true);
    }

    public static function logout()
    {
        Session::destroy();
    }
}
