<?php



class AuthMiddleware
{
    public function handle()
    {
        // Check if user is logged in
        if (!isset($_SESSION['authenticated_user'])) {
            redirect('/');
        }
    }
}
