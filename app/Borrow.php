<?php

function saveOrder($dbh)
{
    $dbh->beginTransaction();

    $query = "INSERT INTO loan (l_borrower_id, l_borrow_day, l_status, l_return_day, l_returned_on) VALUES (:borrower_id, NOW(), 'waiting', NOW() + INTERVAL 14 DAY, NULL)";
    $result = $dbh->prepare($query);

    $result->execute([
        'borrower_id' => currentUser($dbh)['bor_id'],
    ]);

    $loanId = $dbh->lastInsertId();

    $booksQuery = "INSERT INTO borrowed_books_orders (bbo_loan_id, bbo_book_id) VALUES (:bbo_loan_id, :bbo_book_id)";
    $booksResult = $dbh->prepare($booksQuery);

    foreach (getItemsInBasket() as $book) {
        $booksResult->execute([
            ':bbo_loan_id' => $loanId,
            ':bbo_book_id' => fetchBook($dbh, baseDecrypt($book))['b_id'],
        ]);
    }

    if ($dbh->commit()) {
        unsetCookie('basket');
        return true;
    }

    return false;
}