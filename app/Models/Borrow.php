<?php

class Borrow
{
    private int $id;
    private int $readerId;
    private int $bookId;
    private DateTime $borrowDate;
    private ?DateTime $returnDate;

    public function __construct(
        int $id,
        int $readerId,
        int $bookId,
        DateTime $borrowDate,
        ?DateTime $returnDate
    ) {
        $this->id = $id;
        $this->readerId = $readerId;
        $this->bookId = $bookId;
        $this->borrowDate = $borrowDate;
        $this->returnDate = $returnDate;
    }
}
