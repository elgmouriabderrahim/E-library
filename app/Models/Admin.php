<?php
require_once "User.php";
class Admin extends User
{
    public function addBook($book)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO books (title, author, year, status) VALUES (?, ?, ?, ?)");
        $stmt->execute([$book['title'], $book['author'], $book['year'], 'available']);
    }

    public function editBook($book)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, year = ? WHERE id = ?");
        $stmt->execute([$book['title'], $book['author'], $book['year'], $book['id']]);
    }

    public function deleteBook($id)
    {
    }
}
