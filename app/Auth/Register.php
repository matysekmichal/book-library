<?php

include '../Variables.php';
include '../DatabaseConnection.php';
include '../Helpers.php';

if (isset($_POST['login'], $_POST['email'], $_POST['password'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);

    $query = 'INSERT INTO borrowers (login, email, password) VALUES (:login, :email, :password)';
    $result = $dbh->prepare($query);

    $result->execute([
        'login' => $login,
        'email' => $email,
        'password' => $password
    ]);

    if ($result) {
        flashSuccess('Utworzono konto');
        header('Location: '. App::APP_URL);
    }
}
