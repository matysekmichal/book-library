<?php

function userLoans($dbh, $borrower, $page = 1, $perPage = 6)
{
    $query = 'SELECT * FROM loan
        WHERE l_borrower_id = :borrower
        ORDER BY l_created_at DESC
        LIMIT :start, :end';

    $pages = 'SELECT COUNT(*) as pages FROM loan
        WHERE l_borrower_id = :borrower';

    $result = $dbh->prepare($query);
    $result_pages = $dbh->prepare($pages);

    $result->bindValue(':borrower', $borrower, PDO::PARAM_INT);
    $result->bindValue(':start', ($page - 1) * $perPage, PDO::PARAM_INT);
    $result->bindValue(':end', $perPage, PDO::PARAM_INT);
    $result_pages->bindValue(':borrower', $borrower, PDO::PARAM_INT);

    $result->execute();
    $result_pages->execute();

    $pages = $result_pages->fetch()['pages'];

    return [
        'data' => $result->fetchAll(),
        'page' => $page,
        'items' => $pages,
        'pages' => ceil($pages / $perPage),
        'perPage' => $perPage,
    ];
}

function getBorrowedBooks($dbh, $loan)
{
    $query = 'SELECT * FROM borrowed_books_orders
        LEFT JOIN books b on borrowed_books_orders.bbo_book_id = b.b_id
        WHERE bbo_loan_id = :loan';

    $result = $dbh->prepare($query);

    $result->execute([
        'loan' => $loan,
    ]);

    return $result->fetchAll();
}

function currentUser($dbh)
{
    try {
        $query = 'SELECT * FROM borrowers WHERE bor_email = :email LIMIT 1';
        $result = $dbh->prepare($query);

        $result->execute([
            'email' => getCurrentUserEmail(),
        ]);

        return $result->fetch();
    } catch (Exception $e) {
        return false;
    }
}

function renderLoanStatus($status)
{
    switch ($status) {
        case 'waiting' :
            return '<span class="badge '. $status .'">Oczekuje</span>';
        break;
    }
}

function checkProfileComplete($borrower)
{
    return (empty($borrower['bor_id_document']) && empty($borrower['bor_student_album'])) ? false : true;
}

function getCurrentUserEmail()
{
    if (!isset($_SESSION['auth'])) {
        return false;
    }

    return baseDecrypt($_SESSION['auth']);
}