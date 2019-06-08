<?php

function saveLoan($dbh)
{
    $dbh->beginTransaction();

    $query = "INSERT INTO loan (l_borrower_id, l_borrow_day, l_status, l_return_day, l_returned_on) VALUES (:borrower_id, NOW(), :status, NOW() + INTERVAL 14 DAY, NULL)";
    $result = $dbh->prepare($query);

    $result->execute([
        ':borrower_id' => currentUser($dbh)['bor_id'],
        ':status' => LoanStatusEnum::WAITING,
    ]);

    $loanId = $dbh->lastInsertId();

    $booksQuery = "INSERT INTO borrowed_books_orders (bbo_loan_id, bbo_book_id) VALUES (:bbo_loan_id, :bbo_book_id)";
    $booksResult = $dbh->prepare($booksQuery);


    foreach (getItemsInBasket() as $book) {
        $booksResult->execute([
            ':bbo_loan_id' => $loanId,
            ':bbo_book_id' => $book->id,
        ]);
    }

    if ($dbh->commit()) {
        unsetCookie('basket');
        return true;
    }

    return false;
}

function updateLoanStatus($dbh, $loanId, $status) {
    $query = "UPDATE loan SET l_status = :stauts WHERE l_id = :id";

    $result = $dbh->prepare($query);

    $result->execute([
        ':id' => baseDecrypt($loanId),
        ':stauts' => $status,
    ]);

    if ($result) {
        flashSuccess('Twoje wypożyczenie zostało anulowane.');
        die();
    }

    flashError('Nie udało się anulować tego wypożyczenia.');
}