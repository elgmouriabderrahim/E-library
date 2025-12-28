<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::adminOnly();
class OverviewController
{
    public function overview()
    {
        $pageTitle = 'Overview';
        $view = 'admin/overview.php';
        require_once __DIR__ . "/../core/Database.php";
        $pdo =  Database::getconnection();
        $total = [
            'users' => (int) $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
            'books' => (int) $pdo->query("SELECT COUNT(*) FROM books")->fetchColumn(),
            'activeBorrows' => (int) $pdo->query("SELECT COUNT(*) FROM borrows WHERE returnDate IS NULL")->fetchColumn(),
            'returnedBorrows' => (int) $pdo->query("SELECT COUNT(*) FROM borrows WHERE returnDate IS NOT NULL")->fetchColumn(),
        ];
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
}