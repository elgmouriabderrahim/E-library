<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();

require_once __DIR__ . "/../helpers/helperFunctions.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Admin.php";
require_once __DIR__ . "/../models/Reader.php";
require_once __DIR__ . '/../core/Database.php';

class DashboardController
{
    public function dashboard()
    {
        $pageTitle = "Admin Dashboard";
        $view = '/admin/dashboard.php';

        $pdo = Database::getConnection();

        $stats = [
            'users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
            'books' => $pdo->query("SELECT COUNT(*) FROM books")->fetchColumn(),
            'activeBorrows' => $pdo->query("SELECT COUNT(*) FROM borrows WHERE returnDate IS NULL")->fetchColumn(),
            'returnedBorrows' => $pdo->query("SELECT COUNT(*) FROM borrows WHERE returnDate IS NOT NULL")->fetchColumn(),
        ];
        require __DIR__ . '/../Views/layouts/main.php';
    }
}
