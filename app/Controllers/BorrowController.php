<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();
class BorrowController
{
    public function index()
    {
        $pageTitle = "My Borrows";

        $borrows = [
            ['book' => '1984', 'borrowDate' => '2025-01-01', 'returnDate' => null]
        ];

        $view = 'my-borrows.php';
        require __DIR__ . '/../Views/layouts/main.php';
    }
}
