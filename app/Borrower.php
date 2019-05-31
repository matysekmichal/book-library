<?php

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

function getCurrentUserEmail()
{
    if (!isset($_SESSION['auth'])) {
        return false;
    }

    return baseDecrypt($_SESSION['auth']);
}