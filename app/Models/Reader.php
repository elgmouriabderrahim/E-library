<?php
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/../core/Database.php';

class Reader extends User
{
    public function borrowBook(int $bookId): void
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare(
            "INSERT INTO borrows (bookId, readerId, borrowDate) VALUES (?, ?, NOW())"
        );
        $stmt->execute([$bookId, $this->id]);

        $stmt = $pdo->prepare(
            "UPDATE books SET status = 'borrowed' WHERE id = ?"
        );
        $stmt->execute([$bookId]);
    }

    public function returnBook(int $bookId): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            "UPDATE borrows 
            SET returnDate = NOW() 
            WHERE bookId = ?
            AND readerId = ? "
        );
        $stmt->execute([$bookId, $this->id]);

        $stmt = $pdo->prepare(
            "UPDATE books 
            SET status = 'available' 
            WHERE id = ?"
        );
        $stmt->execute([$bookId]);
    }

}
