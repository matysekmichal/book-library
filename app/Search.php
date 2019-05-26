<?php

function search($dbh, $string, $limit = 99)
{
    $string = '%'. $string .'%';

    $query = 'SELECT * FROM books b
        LEFT JOIN book_authors ba on b.b_id = ba.ba_book_id
            LEFT JOIN authors a on ba.ba_author_id = a.a_id
        WHERE b.b_name LIKE :string || a.a_firstname LIKE :string || a.a_lastname LIKE :string
        LIMIT :limit';

    $result = $dbh->prepare($query);

    $result->bindValue(':string', $string, PDO::PARAM_STR);
    $result->bindValue(':limit', $limit, PDO::PARAM_INT);

    $result->execute();

    return $result->fetchAll();
}