<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();

class AdminController
{
    public function dashboard()
    {
        $pageTitle = "Admin Dashboard";
        $view = 'admin-dashboard.php';

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
