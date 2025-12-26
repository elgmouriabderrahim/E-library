<?php

class Admin extends User
{
    public function __construct($id, $firstname, $lastname, $email, $password){
        parent::__construct($id, $firstname, $lastname, $email, $password);
    }
    public function addBook($book)
    {
    }

    public function updateBook($book)
    {
    }

    public function deleteBook($id)
    {
    }
}
