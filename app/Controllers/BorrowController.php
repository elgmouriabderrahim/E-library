<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";

Auth::adminOnly();

class BorrowController
{
    public function borrows()
    {
        $pageTitle = "Borrows";
        $view = 'admin/borrows.php';

        $borrows = [
            [
                'id' => 1,
                'book_title' => 'Clean Code',
                'firstName' => 'Yassine',
                'lastName' => 'El Amrani',
                'borrowDate' => '2025-01-10',
                'returnDate' => null,
            ],
            [
                'id' => 2,
                'book_title' => '1984',
                'firstName' => 'Sara',
                'lastName' => 'Benkirane',
                'borrowDate' => '2024-12-28',
                'returnDate' => '2025-01-05',
            ],
            [
                'id' => 3,
                'book_title' => 'The Pragmatic Programmer',
                'firstName' => 'Omar',
                'lastName' => 'Zerouali',
                'borrowDate' => '2025-01-03',
                'returnDate' => null,
            ],
        ];

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
