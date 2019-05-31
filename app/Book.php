<?php

function fetchBook($dbh, $slug)
{
    $query = 'SELECT * FROM books b
        LEFT JOIN book_authors ba on b.b_id = ba.ba_book_id
            LEFT JOIN authors a on ba.ba_author_id = a.a_id
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
            LEFT JOIN genres g on bg.bg_genre_id = g.g_id
        LEFT JOIN book_ratings br on b.b_id = br.br_book_id
        LEFT JOIN book_opinions bo on b.b_id = bo.bo_book_id
        WHERE b.b_slug = :slug LIMIT 1';

    $result = $dbh->prepare($query);

    $result->bindValue(':slug', $slug, PDO::PARAM_STR);

    $result->execute();

    return $result->fetch();
}

function fetchBooksPaginate($dbh, $genre = '', $page = 1, $perPage = 12)
{
    $query = 'SELECT * FROM books b
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
        LEFT JOIN genres g on bg.bg_genre_id = g.g_id';

    if ($genre) $query .= ' WHERE g.g_slug = :genre';

    $query .= ' LIMIT :start, :end';

    $pages = 'SELECT count(*) as pages FROM books b
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
        LEFT JOIN genres g on bg.bg_genre_id = g.g_id';

    if ($genre) $pages .= ' WHERE g.g_slug = :genre';

    $result = $dbh->prepare($query);
    $result_pages = $dbh->prepare($pages);

    if ($genre) $result->bindValue(':genre', $genre, PDO::PARAM_STR);
    $result->bindValue(':start', ($page - 1) * $perPage, PDO::PARAM_INT);
    $result->bindValue(':end', $perPage, PDO::PARAM_INT);

    if ($genre) $result_pages->bindValue(':genre', $genre, PDO::PARAM_STR);

    $result->execute();
    $result_pages->execute();

    return [
        'data' => $result->fetchAll(),
        'page' => $page,
        'pages' => ceil($result_pages->fetch()['pages'] / $perPage),
        'perPage' => $perPage,
    ];
}

function fetchBooks($dbh, $topic = '', $limit = 3)
{
    $query = 'SELECT * FROM books b
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
        LEFT JOIN genres g on bg.bg_genre_id = g.g_id';

    switch ($topic) {
        default :
            $query .= ' ORDER BY b.b_created_at desc';
        break;
    }

    $query .= ' LIMIT :limit';

    $result = $dbh->prepare($query);

    $result->bindValue(':limit', $limit, PDO::PARAM_INT);

    $result->execute();

    return $result->fetchAll();
}

function getBookAuthors($dbh, $book)
{
    $bookId = $book['b_id'];

    $query = 'SELECT * FROM book_authors
        LEFT JOIN authors a on book_authors.ba_author_id = a.a_id
        WHERE ba_book_id = :book_id';

    $result = $dbh->prepare($query);

    $result->bindValue(':book_id', $bookId, PDO::PARAM_INT);

    $result->execute();

    $authors = $result->fetchAll();

    $i = 1;
    $authorsNumber = count($authors);
    $authorsText = '';

    foreach ($authors as $author) {
        $authorsText .= '<a href="/author?id='. $author['a_id'] .'">'. $author['a_firstname'] .' '. $author['a_lastname'] .'</a>';
        $authorsText .= ($i < $authorsNumber) ? ', ' : '';
        $i++;
    }

    return $authorsText;
}

function availabilityBook($qt)
{
    if ($qt > 2) {
        $string = '<span class="text-success">Dostępna</span>';
    } elseif ($qt > 0 && $qt <= 2) {
        $string = '<span class="text-warning">Ostatnie sztuki</span>';
    } else {
        $string = '<span class="text-danger">Niedstępna</span>';
    }

    return $string;
}