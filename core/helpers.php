<?php
include_once 'core/Validator.php';
function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}


function redirectBack(): void
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function asset(string $path): string
{
    $base = base_url();
    return $base . '/assets/' . $path;
}


function base_url(): string
{
    $scheme = $_SERVER['REQUEST_SCHEME'] ?? 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    return $scheme . '://' . $host . '/';
}

function middleware(string $path)
{
    require_once 'app/middlewares/' . $path . '.php';
    $instance = new $path();
    $instance->handle();
}



function setFlashMessage(string $key, string $value): void
{
    $_SESSION[$key] = $value;
}

function getFlashMessage(string $key): ?string
{
    if (isset($_SESSION[$key])) {
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $message;
    }
    return null;
}

function validate(array $data, array $rules): void
{
    $validator = new Validator();
    if (!$validator->validate($data, $rules)) {
        redirectBack();
    }
}

function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}

function route()
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function url(string $path): string
{
    return base_url() . $path;
}


function csrf_token()
{
    return $_SESSION['csrf_token'];
}

function verify_csrf_token(string $token): void
{
    if ($token !== csrf_token()) {
        redirectBack();
    }
}

function config(string $key): string
{
    $config = require 'core/config.php';

    return $config[$key];
}
