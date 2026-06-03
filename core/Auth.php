<?php

namespace Core;

use Core\DB;

class Auth
{
    public static function check()
    {
        return isset($_SESSION['authenticated_user']);
    }

    public static function user()
    {
        return $_SESSION['authenticated_user'];
    }

    public static function logout()
    {
        if (isset($_COOKIE['remember_token'])) {
            unset($_COOKIE['remember_token']);
            setcookie('remember_token', '', time() - 3600, '/');
        }
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    public static function login(string $table, array $field, string $password)
    {
        $query = DB::table($table)->select('*');
        foreach ($field as $key => $value) {
            $query->where($key, '=', $value);
        }
        $result = $query->first();
        if (!$result) {
            return false;
        }
        if (password_verify($password, $result['password'])) {
            session_regenerate_id(true);
            $_SESSION['authenticated_user'] = $result;
            return true;
        }
        return false;
    }

    public static function rememberMe($table)
    {
        $remember_token = bin2hex(random_bytes(32));

        try {
            DB::table($table)->where('id', '=', $_SESSION['authenticated_user']['id'])->update(['remember_token' => $remember_token]);
            setcookie('remember_token', $remember_token, time() + 3600 * 24 * 30, '/');

            return isset($_SESSION['authenticated_user']);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public static function checkRememberMe($table)
    {
        if (isset($_COOKIE['remember_token'])) {
            $result = DB::table($table)->where('remember_token', '=', $_COOKIE['remember_token'])->first();
            if ($result) {
                $_SESSION['authenticated_user'] = $result;
                return true;
            }
        }
        return false;
    }
}
