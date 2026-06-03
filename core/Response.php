<?php

namespace Core;

class Response
{
    public static function view(string $file, array $data)
    {
        if (!empty($data) && is_array($data)) {
            extract($data);
        }
        if (file_exists('view/app/header.php')) {
            include('view/app/header.php');
        }
        include('views/' . $file . '.php');
        if (file_exists('view/app/footer.php')) {
            include('view/app/footer.php');
        }
        die;
    }


    public static function json(array $data, int $statuscode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statuscode);
        echo json_encode($data);
        die;
    }
}
