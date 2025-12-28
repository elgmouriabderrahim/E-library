<?php

require_once __DIR__ . "/../helpers/Auth.php";
Auth::adminOnly();

require_once __DIR__ . "/../core/Database.php";

class UsersController
{
    public function users()
    {
        $pageTitle = 'Users Management';
        $view = '/admin/users.php';

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            SELECT id, firstName, lastName, email, role
            FROM users
        ");
        $stmt->execute();
        $users = $stmt->fetchAll();

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
