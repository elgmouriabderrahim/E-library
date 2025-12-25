<?php

class AuthController
{
    public function register()
    {
        $pageTitle = 'Regester';

        // Do NOT include main layout
        require_once __DIR__ . '/../Views/pages/register.php';
    }

    public function login()
    {
        $pageTitle = 'Login';

        // Do NOT include main layout
        require_once __DIR__ . '/../Views/pages/login.php';
    }
}
