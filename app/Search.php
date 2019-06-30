<?php

function search($dbh, $string, $page = 1, $perPage = 12)
{
    $string = '%'. $string .'%';

    $query = 'SELECT * FROM books b
        LEFT JOIN book_authors ba on b.b_id = ba.ba_book_id
            LEFT JOIN authors a on ba.ba_author_id = a.a_id
        WHERE b.b_name LIKE :string || CONCAT(a.a_firstname, \' \', a.a_lastname) LIKE :string
        LIMIT :start, :end';

    $pages = 'SELECT count(*) as pages FROM books b
        LEFT JOIN book_authors ba on b.b_id = ba.ba_book_id
            LEFT JOIN authors a on ba.ba_author_id = a.a_id
        WHERE LOWER(b.b_name) LIKE :string || CONCAT(a.a_firstname, \' \', a.a_lastname) LIKE :string';

    $result = $dbh->prepare($query);
    $result_pages = $dbh->prepare($pages);

    $result->bindValue(':string', strtolower($string), PDO::PARAM_STR);
    $result->bindValue(':start', ($page - 1) * $perPage, PDO::PARAM_INT);
    $result->bindValue(':end', $perPage, PDO::PARAM_INT);

    $result_pages->bindValue(':string', strtolower($string), PDO::PARAM_STR);

    $result->execute();
    $result_pages->execute();

    $result = $result->fetchAll();
    $result_pages = $result_pages->fetch();

//    echo '<pre>';
//    print_r($result);
//    die();

    return [
        'data' => $result,
        'items' => count($result),
        'page' => $page,
        'pages' => ceil($result_pages['pages'] / $perPage),
        'perPage' => $perPage,
    ];
}