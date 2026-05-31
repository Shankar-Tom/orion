<?php
class Response
{
    public static function view($file, $data)
    {
        if (!empty($data) && is_array($data)) {
            extract($data);
        }
        include_once('views/' . $viewfile . '.php');
        die;
    }


    public static function api($data, $statuscode)
    {
        header('Content-Type: application/json');
        http_response_code($statuscode);
        echo json_encode($data);
        die;
    }
}
