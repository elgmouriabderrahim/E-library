<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();
class HomeController
{
    public function index()
    {
        $pageTitle = 'Home';
        $view = 'home.php';

        require_once __DIR__ . '/../Views/layouts/main.php';
    }

    public function notFound()
    {
        $pageTitle = '404';
        $view = '404.php';

        require_once __DIR__ . '/../Views/layouts/main.php';
    }
    
}
