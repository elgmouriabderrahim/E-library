<?php
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/../core/Database.php';

class Reader extends User
{
    public function borrowBook($book): void
    {
        $pdo = Database::getConnection();
        if($book->isAvailable()){
            $stmt = $pdo->prepare(
                "INSERT INTO borrows (bookId, readerId, borrowDate) VALUES (?, ?, NOW())"
            );
            $stmt->execute([$book->getId(), $this->id]);
    
            $stmt = $pdo->prepare(
                "UPDATE books SET status = 'borrowed' WHERE id = ?"
            );
            $stmt->execute([$book->getId()]);
        }
    }

    public function returnBook($book): void
    {
        if(!($book->isAvailable())){
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare(
                "UPDATE borrows 
                SET returnDate = NOW() 
                WHERE bookId = ?
                AND readerId = ? "
            );
            $stmt->execute([$book->getId(), $this->id]);
    
            $stmt = $pdo->prepare(
                "UPDATE books 
                SET status = 'available' 
                WHERE id = ?"
            );
            $stmt->execute([$book->getId()]);
        }
    }

}
