<?php

include '../Init.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'SELECT password FROM borrowers WHERE email = :email LIMIT 1';
    $result = $dbh->prepare($query);

    $result->execute([
        'email' => $email,
    ]);

    $fetchedPassword = $result->fetch()['password'];

    if (password_verify($password, $fetchedPassword)) {
        $_SESSION['auth'] = baseEncrypt($email);
        flashSuccess('Zalogowano pomyślnie');
    } else {
        flashError('Nie istnieje takie konto.', 'login');
    }
}
