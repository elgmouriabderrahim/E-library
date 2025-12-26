<?php

class Book
{
    private int $id;
    private string $title;
    private string $author;
    private int $year;
    private string $status;

    public function __construct(
        int $id,
        string $title,
        string $author,
        int $year,
        string $status = 'available'
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = $status;
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }
}
