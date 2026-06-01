<?php
include_once 'core/DB.php';
include_once 'core/JWT.php';

class MainController
{
    public function home()
    {
        print_r(JWT::generate());
    }
}
