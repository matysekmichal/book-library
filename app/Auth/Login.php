<?php
/**
 * Funkcjonalność logowania użytkowników i administratorów
 **/

include '../Init.php';

/**
 * Sprawdzanie kogo mamy zalogować
 **/
if (isset($_POST['email'], $_POST['password'])) {
    borrowerLogin($dbh, $_POST['email'], $_POST['password']);
}

if (isset($_POST['login'], $_POST['password'])) {
    stuffLogin($dbh, $_POST['login'], $_POST['password']);
}

/**
 * Logowanie czytelnika
 *
 * @param $dbh
 * @param $email
 * @param $password
 */
function borrowerLogin($dbh, $email, $password)
{
    $query = 'SELECT bor_password FROM borrowers WHERE bor_email = :email LIMIT 1';
    $result = $dbh->prepare($query);

    $result->execute([
        'email' => $email,
    ]);

    $fetchedPassword = $result->fetch()['bor_password'];

    if (password_verify($password, $fetchedPassword)) {
        $_SESSION['auth'] = baseEncrypt($email);
        flashSuccess('Zalogowano pomyślnie', '#');
    } else {
        flashError('Nie istnieje takie konto.', 'login');
    }
}

/**
 * Logowanie adminstratora
 *
 * @param $dbh
 * @param $login
 * @param $password
 */
function stuffLogin($dbh, $login, $password)
{
    $query = 'SELECT sa_password FROM stuff_accounts WHERE sa_login = :login LIMIT 1';
    $result = $dbh->prepare($query);

    $result->execute([
        'login' => $login,
    ]);

    $fetchedPassword = $result->fetch()['sa_password'];

    if (password_verify($password, $fetchedPassword)) {
        $_SESSION['auth_stuff'] = baseEncrypt($login);
        flashSuccess('Zalogowano pomyślnie', 'stuff');
    } else {
        flashError('Nie istnieje takie konto.', 'stuff/login');
    }
}
