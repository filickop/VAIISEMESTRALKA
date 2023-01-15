<?php

class Auth
{
    public static function login($username)
    {
        $_SESSION['login'] = $username;
    }

    public static function logout()
    {
        unset( $_SESSION['login']);
    }

    public static function isLogged()
    {
        return isset( $_SESSION['login']);
    }

    public static function getUser()
    {
        return (Auth::isLogged() ? $_SESSION['login'] : "Anonym");
    }
}
?>