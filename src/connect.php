<?php
    include 'framework/JsonRepository.php';
    use framework\JsonRepository;

    $users = new JsonRepository('resources/users.json');
    $books = new JsonRepository('resources/books.json');