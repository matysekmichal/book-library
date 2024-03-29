<?php
/**
 * Funkcjonalność czytelnika
 **/

/**
 * Aktualizacja profilu użytkownika
 *
 * @param $dbh
 * @param $borrower_id
 */
function updateProfile($dbh, $borrower_id)
{
    // TODO: VALIDATE INPUTS
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $studentAlbum = $_POST['student_album'];
    $idDocument = $_POST['id_document'];

    $query = 'UPDATE borrowers SET
        bor_email = :email,
        bor_firstname = :firstname,
        bor_lastname = :lastname,
        bor_student_album = :student_album,
        bor_id_document = :id_document
        WHERE bor_id = :borrower_id';
    $result = $dbh->prepare($query);

    try {
        $result->execute([
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'student_album' => $studentAlbum,
            'id_document' => $idDocument,
            'borrower_id' => $borrower_id
        ]);

        flashSuccess('Zaktualizowano konto');
    } catch (Exception $e) {
        flashError('Przepraszamy. Nie mogliśmy zaktualizować twojego konta.');
    }
}


/**
 * Zmiana hasłą użytkownika
 *
 * @param $dbh
 * @param $borrower_id
 */
function updatePassword($dbh, $borrower_id)
{
    $prevPassword = $_POST['prev_password'];
    $newPassword = $_POST['new_password'];
    $newRepeatPassword = $_POST['new_repeat_password'];

    $query = 'SELECT bor_id FROM borrowers
        WHERE bor_id = :borrower_id AND bor_password = :pass
        LIMIT 1';
    $result = $dbh->prepare($query);

    $result->execute([
        'borrower_id' => $borrower_id,
        'pass' => $prevPassword
    ]);

    if (count($result->fetchAll()) > 0) {
        flashError('Nieprawidłowe hasło.');
    }
    if ($newPassword !== $newRepeatPassword) {
        flashError('Hasła nie są identyczne.');
    }

    $query = 'UPDATE borrowers SET
        bor_password = :new_password
        WHERE bor_id = :borrower_id';
    $result = $dbh->prepare($query);

    try {
        $result->execute([
            'new_password' => password_hash($newPassword, PASSWORD_ARGON2I),
            'borrower_id' => $borrower_id
        ]);

        flashSuccess('Hasło zostało zmienione.');
    } catch (Exception $e) {
        flashError('Przepraszamy. Nie mogliśmy zaktualizować twojego konta.');
    }
}

/**
 * Lista wypożyczeń użytkownika
 *
 * @param $dbh
 * @param $borrower
 * @param int $page
 * @param int $perPage
 * @return array
 */
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

/**
 * Aktualizacja profilu użytkownika
 *
 * @param $dbh
 * @return mixed
 */
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

/**
 * Sprawdzenie kompletności profilu
 *
 * @param $borrower
 * @return bool
 */
function checkProfileComplete($borrower)
{
    return (empty($borrower['bor_id_document']) && empty($borrower['bor_student_album'])) ? false : true;
}

/**
 * Pobranie obecnego adresu email użytkownika
 *
 * @return bool
 */
function getCurrentUserEmail()
{
    if (!isset($_SESSION['auth'])) {
        return false;
    }

    return baseDecrypt($_SESSION['auth']);
}