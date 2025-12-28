<?php
require_once __DIR__ . "/../helpers/Auth.php";

require_once __DIR__ . "/../helpers/helperFunctions.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Admin.php";
require_once __DIR__ . "/../models/Reader.php";
require_once __DIR__ . '/../core/Database.php';

class ProfileController {
    public function profile(){
        $pageTitle = 'Profile';
        $view = 'admin/profile.php';

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['id']]);
        $user = $stmt->fetch();

        require_once __DIR__ . '/../Views/layouts/main.php';
    }
}