<?php

include 'Enums/LoanStatusEnum.php';

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

function fetchBooksPaginate($dbh, $genre = '', $page = 1, $perPage = 12, $orderBy = 'bor_created_at', $inOrder = 'DESC')
{
    $query = 'SELECT * FROM books b
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
        LEFT JOIN genres g on bg.bg_genre_id = g.g_id';

    if ($genre) $query .= ' WHERE g.g_slug = :genre';
    $query .= ' ORDER BY :order :inOrder';

    $query .= ' LIMIT :start, :end';

    $pages = 'SELECT COUNT(*) as pages FROM books b
        LEFT JOIN book_genres bg on b.b_id = bg.bg_book_id
        LEFT JOIN genres g on bg.bg_genre_id = g.g_id';

    if ($genre) $pages .= ' WHERE g.g_slug = :genre';

    $result = $dbh->prepare($query);
    $result_pages = $dbh->prepare($pages);

    if ($genre) $result->bindValue(':genre', $genre, PDO::PARAM_STR);
    $result->bindValue(':order', $orderBy, PDO::PARAM_STR);
    $result->bindValue(':inOrder', $inOrder, PDO::PARAM_STR);
    $result->bindValue(':start', ($page - 1) * $perPage, PDO::PARAM_INT);
    $result->bindValue(':end', $perPage, PDO::PARAM_INT);

    if ($genre) $result_pages->bindValue(':genre', $genre, PDO::PARAM_STR);

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

function getMostReadBooks($dbh, $limit)
{
    $query = 'SELECT *, COUNT(bbo.bbo_book_id) as most_read FROM books b
        LEFT JOIN borrowed_books_orders bbo on b.b_id = bbo_book_id
        GROUP BY bbo.bbo_book_id
        ORDER BY most_read DESC
        LIMIT :limit';

    $result = $dbh->prepare($query);
    $result->bindValue(':limit', $limit, PDO::PARAM_INT);

    $result->execute();

    return $result->fetchAll();
}

function getLatestBooks($dbh, $limit)
{
    $query = 'SELECT * FROM books b
        ORDER BY b_published DESC
        LIMIT :limit';

    $result = $dbh->prepare($query);

    $result->bindValue(':limit', $limit, PDO::PARAM_INT);
    $result->execute();

    return $result->fetchAll();
}

function fetchBooksFactory($dbh, $topic = '', $limit = 3)
{
    switch ($topic) {
        case 'most_read' :
            return getMostReadBooks($dbh, $limit);
        break;
        default :
            return getLatestBooks($dbh, $limit);
        break;
    }
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

function renderLoanStatus($status)
{
    switch ($status) {
        case LoanStatusEnum::CANCELED :
            return '<span class="badge danger">Anulowano</span>';
            break;
        case LoanStatusEnum::WAITING :
            return '<span class="badge warning">Oczekuje</span>';
            break;
        case LoanStatusEnum::COMPLETED :
            return '<span class="badge success">Skompletowano</span>';
            break;
        case LoanStatusEnum::LOANED :
            return '<span class="badge info">Wypożyczono</span>';
            break;
        case LoanStatusEnum::RETURNED :
            return '<span class="badge gray">Zwrócono</span>';
            break;
    }
}