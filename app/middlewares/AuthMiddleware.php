<?php

include_once 'core/Auth.php';

class AuthMiddleware
{
    public function handle()
    {
        if (!Auth::check()) {
            redirect('/');
        }
    }
}
