<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";

Auth::adminOnly();

class BorrowsController
{
    public function borrows()
    {
        $pageTitle = "Borrows";
        $view = 'admin/borrows.php';
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            SELECT 
                borrows.id,
                borrows.borrowDate,
                borrows.returnDate,
                books.title AS book_title,
                users.firstName,
                users.lastName,
                users.email
            FROM borrows
            JOIN books ON borrows.bookId = books.id
            JOIN users ON borrows.readerId = users.id
            ORDER BY borrows.borrowDate DESC
        ");

        $stmt->execute();
        $borrows = $stmt->fetchAll();

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
