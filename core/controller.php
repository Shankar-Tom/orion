<?php
class controller
{
    protected DB $db;
    public function __construct()
    {
        require_once 'core/db.php';
        require_once 'core/functions.php';
    }

    public function dump(mixed $data): void
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;
    }

    public function db()
    {
        return new DB();
    }



    public function view(string $viewfile, ?array $data = null, bool $extract = true): void
    {
        if ($extract && is_array($data)) {
            extract($data);
        }
        include_once('views/' . $viewfile . '.php');
    }
}
