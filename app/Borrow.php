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

    $borrowedBooksQuery = "INSERT INTO borrowed_books_orders (bbo_loan_id, bbo_book_id) VALUES (:bbo_loan_id, :bbo_book_id)";
    $borrowedBooksResult = $dbh->prepare($borrowedBooksQuery);

    $booksQuery = "UPDATE books SET b_available = b_available - 1 WHERE b_id = :b_id";
    $booksResult = $dbh->prepare($booksQuery);

    foreach (getItemsInBasket() as $book) {
        if (bookIsAvailable($dbh, $book->id)) {
            $borrowedBooksResult->execute([
                ':bbo_loan_id' => $loanId,
                ':bbo_book_id' => $book->id,
            ]);

            $booksResult->execute([':b_id' => $book->id]);
        }
    }

    if ($dbh->commit()) {
        unsetCookie('basket');
        return true;
    }

    $dbh->rollBack();
    return false;
}

function cancelBorrow($dbh, $loanId) {
    $loan = baseDecrypt($loanId);

    $dbh->beginTransaction();

    $query = "UPDATE loan SET l_status = :status WHERE l_id = :id";
    $result = $dbh->prepare($query);

    $result->execute([
        ':id' => $loan,
        ':status' => LoanStatusEnum::CANCELED,
    ]);

    $query = "SELECT b.b_id FROM loan l
        LEFT JOIN borrowed_books_orders bbo on l.l_id = bbo.bbo_loan_id
        LEFT JOIN books b on bbo.bbo_book_id = b.b_id
        WHERE l.l_id = :loan";
    $loanResult = $dbh->prepare($query);

    $loanResult->execute([':loan' => $loan]);

    $booksQuery = "UPDATE books SET b_available = b_available + 1 WHERE b_id = :b_id";
    $booksResult = $dbh->prepare($booksQuery);

    foreach ($loanResult->fetchAll() as $bookId) {
        $booksResult->execute([':b_id' => $bookId['b_id']]);
    }

    if ($dbh->commit()) {
        return true;
    }

    $dbh->rollBack();
    return false;
}