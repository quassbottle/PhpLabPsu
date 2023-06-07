<?php

namespace framework;

require "JsonRepository.php";

class BookRepository extends JsonRepository
{
    public function getByAuthor($author) {
        $books = $this->getAll();
        $booksData = [];
        foreach ($books as $book) {
            if ($book->author == $author)
                array_push($booksData, $book);
        }
        return $booksData;
    }
}