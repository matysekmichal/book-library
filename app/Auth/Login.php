<?php

include '../Init.php';

if (isset($_POST['email'], $_POST['password'])) {
    borrowerLogin($dbh, $_POST['email'], $_POST['password']);
}

if (isset($_POST['login'], $_POST['password'])) {
    stuffLogin($dbh, $_POST['login'], $_POST['password']);
}

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

function stuffLogin($dbh, $login, $password)
{
    $query = 'SELECT sa_password FROM stuff_accounts WHERE sa_login = :login LIMIT 1';
    $result = $dbh->prepare($query);

    $result->execute([
        'login' => $login,
    ]);

    $fetchedPassword = $result->fetch()['s_password'];

    if (password_verify($password, $fetchedPassword)) {
        $_SESSION['auth_stuff'] = baseEncrypt($login);
        flashSuccess('Zalogowano pomyślnie', '#');
    } else {
        flashError('Nie istnieje takie konto.', 'login');
    }
}
