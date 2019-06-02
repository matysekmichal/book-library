<?php

include '../Init.php';

function borrowerLogin($dbh)
{
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

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
}

function stuffLogin($dbh)
{
    if (isset($_POST['login'], $_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = 'SELECT s_password FROM stuff WHERE s_login = :login LIMIT 1';
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
}