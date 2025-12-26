<?php

class Reader extends User
{
    public function borrowBook(int $bookId): Borrow
    {
        $borrow = new Borrow(
            0,
            $this->id,
            $bookId,
            new DateTime(),
            null
        );

        return $borrow;
    }

    public function returnBook(int $borrowId): void
    {
    }
}
