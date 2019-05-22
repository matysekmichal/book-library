<?php

function genres($dbh)
{
    $query = 'SELECT * FROM genres';

    $result = $dbh->prepare($query);

    $result->execute();

    return $result->fetchAll();
}