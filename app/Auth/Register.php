<?php

include '../Init.php';

if (isset($_POST['email'], $_POST['password'], $_POST['terms'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    $terms = $_POST['terms'];

    if (!(bool) $_POST['terms']) {
        flashError('Nie zaakceptowano warunków do utworzenie konta.');
    }

    $query = 'INSERT INTO borrowers (bor_email, bor_password) VALUES (:email, :password)';
    $result = $dbh->prepare($query);

    try {
        $result->execute([
            'email' => $email,
            'password' => $password
        ]);
    } catch (Exception $e) {
        flashError('Przepraszamy. Nie mogliśmy utworzyć konta.', 'register');
        die();
    }

    if ($result) {
        $_SESSION['auth'] = baseEncrypt($email);
        flashSuccess('Utworzono konto', '#');
    }
}
