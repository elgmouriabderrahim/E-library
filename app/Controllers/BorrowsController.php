<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();


class BorrowsController {
    public function borrows(){
        $pageTitle = 'Borrows list';
        $view = '/admin/borrows.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }
}