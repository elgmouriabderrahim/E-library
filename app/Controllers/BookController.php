<?php
require_once __DIR__ . "/../helpers/Auth.php";
Auth::userOnly();
class BookController
{
    public function index()
    {
        $pageTitle = "Books";

        $books = [
            ['id' => 1, 'title' => '1984', 'author' => 'George Orwell', 'status' => 'available'],
            ['id' => 2, 'title' => 'Clean Code', 'author' => 'Robert Martin', 'status' => 'borrowed']
        ];

        $view = 'books.php';
        require __DIR__ . '/../Views/layouts/main.php';
    }

    public function show()
    {
        $pageTitle = "Book Details";

        $book = [
            'title' => '1984',
            'author' => 'George Orwell',
            'year' => 1949,
            'status' => 'available'
        ];

        $view = 'books/show.php';
        require __DIR__ . '/../Views/layouts/main.php';
    }
}
