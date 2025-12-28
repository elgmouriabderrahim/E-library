<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";
require_once __DIR__ . "/../models/Book.php";

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
        Auth::readerOnly();
        $pageTitle = "My Borrows";
        $view = 'reader/myBorrows.php';
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            SELECT br.borrowDate borrowDate, br.returnDate returnDate, bk.id bookId, bk.title title, bk.author author, bk.year year
            FROM borrows br
            INNER JOIN books bk
            on br.bookId = bk.id
            WHERE readerId = ?
            ORDER BY br.borrowDate DESC
        ");
        $stmt->execute([$_SESSION['id']]);
        $myBorrows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require __DIR__ . '/../Views/layouts/main.php';
    }
    public function borrow()
    {
        Auth::readerOnly();
        
        require_once __DIR__ . "/../models/Reader.php";
        $reader = new Reader($_SESSION['id']);

        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header("Location: /books");
            exit;
        }
        $book = new Book($bookId);
        

        if (!$book || !$book->isAvailable()) {
            $_SESSION['error'] = "This book is not available.";
            header("Location: /books");
            exit;
        }

        $reader->borrowBook($book);

        $_SESSION['success'] = "You have successfully borrowed the book!";
        header("Location: /books");
        exit;
    }

    public function returnBook()
    {
        Auth::readerOnly();

        require_once __DIR__ . "/../models/Reader.php";
        $reader = new Reader($_SESSION['id']);

        $bookId = $_GET['id'] ?? null;
        $redirect = $_GET['redirect'] ?? '/books';
        if (!$bookId) {
            header("Location: $redirect");
            exit;
        }
        $book = new Book($bookId);
        $reader->returnBook($book);

        $_SESSION['success'] = "Book returned successfully!";
        header("Location: $redirect");
        exit;
    }
}
