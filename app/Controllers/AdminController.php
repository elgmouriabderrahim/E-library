<?php

class AdminController
{
    public function dashboard()
    {
        $pageTitle = "Admin Dashboard";
        $view = 'admin-dashboard.php';

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
