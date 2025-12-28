<?php

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private int $year;
    private string $status;

    public function __construct($bookId) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$bookId]);
        $book = $stmt->fetch();

        $this->id = $book['id'];
        $this->title = $book['title'];
        $this->author = $book['author'];
        $this->year = $book['year'];
        $this->status = $book['status'];
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }
    public function getId()
    {
        return $this->id;
    }
}
