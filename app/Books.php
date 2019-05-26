<?php

function fetchBooks($dbh, $limit = 99)
{
    $query = 'SELECT * FROM books LIMIT :limit';
    $result = $dbh->prepare($query);

    $result->bindValue(':limit', $limit, PDO::PARAM_INT);

    $result->execute();

    return $result->fetchAll();
}

function getBookAuthors($dbh, $book)
{
    $bookId = $book['id'];

    $query = 'SELECT * FROM book_authors
        LEFT JOIN authors a on book_authors.author_id = a.id
        WHERE book_id = :book_id';
    $result = $dbh->prepare($query);

    $result->bindValue(':book_id', $bookId, PDO::PARAM_INT);

    $result->execute();

    $authors = $result->fetchAll();

    $i = 1;
    $authorsNumber = count($authors);
    $authorsText = '';

    foreach ($authors as $author) {
        $authorsText .= '<a href="/author?id='. $author['id'] .'">'. $author['firstname'] .' '. $author['lastname'] .'</a>';
        $authorsText .= ($i < $authorsNumber) ? ', ' : '';
        $i++;
    }

    return $authorsText;
}