<?php

class Route
{
    private static $routes = [];
    public static function get($url, $controller, $method)
    {
        self::$routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method,
            'data' => null,
            'request_method' => 'GET'
        ];
    }
    public static function post($url, $controller, $method)
    {
        self::$routes[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method,
            'data' => $_POST,
            'request_method' => 'POST'

        ];
    }



    protected function callController($controller, $method, $data)
    {

        require_once "core/controller.php";
        require_once "app/controllers/" . $controller . ".php";
        $controller = new $controller();
        $data != null ? $controller->$method($data) : $controller->$method();
        die;
    }

    public function handle()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $routeIndex = array_search($url, array_column(self::$routes, 'url'));

        if ($routeIndex === false) {
            http_response_code(404);
            echo "404 Not Found";
            die;
        }

        $route = self::$routes[$routeIndex];

        if ($route['request_method'] !== $requestMethod) {
            http_response_code(405);
            echo "405 Method Not Allowed";
            die;
        }

        $data = match ($requestMethod) {
            'POST' => $_POST,
            'GET'  => $_GET,
            default => null
        };

        $this->callController(
            $route['controller'],
            $route['method'],
            $data
        );
    }
}
