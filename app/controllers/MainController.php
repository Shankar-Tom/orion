<?php

namespace App\Controllers;

use Core\JWT;


class MainController
{
    public function home()
    {
        print_r(JWT::generate());
    }
}
