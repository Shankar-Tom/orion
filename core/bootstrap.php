<?php
class Bootstrap
{
    public function __construct()
    {
        // Bootstrap code here
    }

    public function run()
    {

        session_start();
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        require 'core/routing.php';
        $router = new Route();
        require 'routes.php';
        $router->handle();
    }
}
