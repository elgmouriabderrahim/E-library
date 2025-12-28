<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";
require_once __DIR__ . "/../helpers/helperFunctions.php";
require_once __DIR__ . "/../models/Admin.php";
class BooksController
{
    public function books()
    {
        Auth::adminOnly();
        $pageTitle = "Books";
        $view = '/admin/books/books.php';
        $pdo = Database::getconnection();
        $stmt = $pdo->prepare("select * from books order by id desc");
        $stmt->execute();
        $books = $stmt->fetchAll();
        require __DIR__ . '/../Views/layouts/main.php';
    }
    
    public function show()
    {
        Auth::userOnly();
        $pageTitle = "Book Details";
        if($_SESSION['role'] == 'admin')
            $view = '/admin/books/show.php';
        else
            $view = '/reader/books/show.php';

        $pdo = Database::getConnection();
        
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header("Location: /");
            exit;
        }
        $book = Helper::fetchBookById($bookId);
        if(!$book){
            header("location: /");
            exit;
        }
        require __DIR__ . '/../Views/layouts/main.php';
    }
    public function add()
    {
        Auth::adminOnly();
        $pageTitle = "Add New Book";
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book['title'] = Helper::filterData($_POST['title'] ?? '');
            $book['author'] = Helper::filterData($_POST['author'] ?? '');
            $book['year'] = Helper::filterData($_POST['year'] ?? '');
            
            $errors = Helper::validateBookInputs($book['title'], $book['author'], $book['year']);
            
            if (empty($errors)) {
                $admin = new Admin($_SESSION['id']);
                $errors = $admin->addBook($book);
                header("Location: /admin/books");
                exit;
            }
        }

        $view = '/admin/books/add.php';
        require __DIR__ . '/../Views/layouts/main.php';
    }
    
    public function edit()
    {
        Auth::adminOnly();
        $pageTitle = "Edit Book";
        $errors = [];
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header("Location: /admin/books");
            exit;
        }
        $book = Helper::fetchBookById($bookId);
        if (!$book) {
            header("Location: /admin/books");
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['book_id'])) {
            $book['title'] = Helper::filterData($_POST['title'] ?? '');
            $book['author'] = Helper::filterData($_POST['author'] ?? '');
            $book['year'] = Helper::filterData($_POST['year'] ?? '');
            $book['id'] = $bookId;
            
            $errors = Helper::validateBookInputs($book['title'], $book['author'], $book['year']);
            
            if (empty($errors)) {
                $admin = new Admin($_SESSION['id']);
                $admin->editBook($book);
                header("Location: /admin/books");
                exit;
            }
        }

        $view = '/admin/books/edit.php';
        require __DIR__ . '/../Views/layouts/main.php';
    }
    public function delete(){
        Auth::adminOnly();
        $bookId = $_GET['id'] ?? null;
        if(!$bookId){
            header("location: /admin/books");
            exit;
        }
        
        $admin = new Admin($_SESSION['id']);
        $admin->deleteBook($bookId);
        header("location: /admin/books");
        exit;
    }
    public function readerBooks()
    {
        Auth::readerOnly();
        $pageTitle = "Books";
        $view = 'reader/books/books.php';
    
        $pdo = Database::getconnection();
        $stmt = $pdo->prepare("select * from books order by id desc");
        $stmt->execute();
        $books = $stmt->fetchAll();

        $stmt = $pdo->prepare("select bookId from borrows where readerId = ?");
        $stmt->execute([$_SESSION['id']]);
        $myBorrows = $stmt->fetchAll(PDO::FETCH_COLUMN);

        require __DIR__ . '/../Views/layouts/main.php';
    }
}
