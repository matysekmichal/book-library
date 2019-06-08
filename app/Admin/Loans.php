<?php

function fetchLoansPaginate($dbh, $page = 1, $perPage = 13)
{
    $query = 'SELECT * FROM loan
            LEFT JOIN borrowers b on loan.l_borrower_id = b.bor_id
            LIMIT :start, :end';

    $pages = 'SELECT COUNT(*) as pages FROM loan';

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