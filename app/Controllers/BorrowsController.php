<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";

class BorrowsController
{
    public function borrows()
    {
        Auth::adminOnly();
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
    public function myBorrows()
    {
        Auth::userOnly();
        $pageTitle = "My Borrows";
        $view = 'reader/myBorrows.php';
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            SELECT br.borrowDate borrowDate, br.returnDate returnDate, bk.title title, bk.author author, bk.year year
            FROM borrows br
            INNER JOIN books bk
            on br.bookId = bk.id
            WHERE readerId = ?
            ORDER BY br.borrowDate DESC
        ");
        $stmt->execute([$_SESSION['id']]);
        $myBorrows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$myBorrows = [
    [
        'borrowId' => 1,
        'bookId' => 101,
        'title' => '1984',
        'author' => 'George Orwell',
        'year' => 1949,
        'borrowDate' => '2025-01-05',
        'returnDate' => null,
    ],
    [
        'borrowId' => 2,
        'bookId' => 102,
        'title' => 'Clean Code',
        'author' => 'Robert Martin',
        'year' => 2008,
        'borrowDate' => '2025-01-10',
        'returnDate' => '2025-01-20',
    ],
    [
        'borrowId' => 3,
        'bookId' => 103,
        'title' => 'The Pragmatic Programmer',
        'author' => 'Andrew Hunt',
        'year' => 1999,
        'borrowDate' => '2025-02-01',
        'returnDate' => null,
    ],
];

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
