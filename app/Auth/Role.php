<?php

include '../Enums/RolesEnum.php';

function hasRole($dbh, $login, RolesEnum $role)
{
    $query = 'SELECT sa_role FROM stuff_accounts
        WHERE sa_login = :login AND sa_role = :role';

    $result = $dbh->prepare($query);
    $result->bindValue(':login', $login, PDO::PARAM_STR);
    $result->bindValue(':role', $role, PDO::PARAM_STR);

    $result->execute();

    if (!empty($result->fetch())) {
        return true;
    }

    return false;
}