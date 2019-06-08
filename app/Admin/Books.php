<?php

function fetchBorrowersPaginate($dbh, $page = 1, $perPage = 13)
{
    $query = 'SELECT * FROM books
            LEFT JOIN book_authors ba on books.b_id = ba.ba_book_id
            LEFT JOIN authors a on ba.ba_author_id = a.a_id
            LEFT JOIN book_genres bg on books.b_id = bg.bg_book_id
            LIMIT :start, :end';

    $pages = 'SELECT COUNT(*) as pages FROM books';

    $result = $dbh->prepare($query);
    $result_pages = $dbh->prepare($pages);

    $result->bindValue(':start', ($page - 1) * $perPage, PDO::PARAM_INT);
    $result->bindValue(':end', $perPage, PDO::PARAM_INT);

    $result->execute();
    $result_pages->execute();

    $items = $result_pages->fetch()['pages'];
    $pages = ceil($items / $perPage);

    return [
        'data' => $result->fetchAll(),
        'page' => $page,
        'items' => $items,
        'pages' => $pages,
        'perPage' => $perPage,
    ];
}
