<?php
require_once __DIR__ . "/../helpers/Auth.php";
require_once __DIR__ . "/../core/Database.php";
require_once __DIR__ . "/../helpers/helperFunctions.php";
class BooksController
{
    public function books()
    {
        Auth::userOnly();
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
        $view = '/admin/books/show.php';
        $pdo = Database::getConnection();
        
        $bookId = $_GET['id'] ?? null;
        if (!$bookId) {
            header("Location: /admin/books");
            exit;
        }
        $book = Helper::fetchBookById($bookId);
        if(!$book){
            header("location: /admin/books");
            exit;
        }
        require __DIR__ . '/../Views/layouts/main.php';
    }
    public function add()
    {
        Auth::adminOnly();
        $pageTitle = "Add New Book";
        $pdo = Database::getConnection();
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = Helper::filterData($_POST['title'] ?? '');
            $author = Helper::filterData($_POST['author'] ?? '');
            $year = Helper::filterData($_POST['year'] ?? '');
            
            $errors = Helper::validateBookInputs($title, $author, $year);
            
            if (empty($errors)) {
                $stmt = $pdo->prepare("INSERT INTO books (title, author, year, status) VALUES (?, ?, ?, ?)");
                $stmt->execute([$title, $author, $year, 'available']);
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
        $pdo = Database::getConnection();
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
            $title = Helper::filterData($_POST['title'] ?? '');
            $author = Helper::filterData($_POST['author'] ?? '');
            $year = Helper::filterData($_POST['year'] ?? '');

            $errors = Helper::validateBookInputs($title, $author, $year);

            if (empty($errors)) {
                $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, year = ? WHERE id = ?");
                $stmt->execute([$title, $author, $year, $bookId]);
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

        $pdo = Database::getconnection();
        $stmt = $pdo->prepare("delete from books where id = ?");
        $stmt->execute([$bookId]);
        header("location: /admin/books");
        exit;
    }
    public function readerBooks()
    {
        Auth::userOnly();
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
