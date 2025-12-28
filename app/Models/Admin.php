<?php
require_once "User.php";
class Admin extends User
{
    public function addBook()
    {
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
    }

    public function updateBook($book)
    {
    }

    public function deleteBook($id)
    {
    }
}
