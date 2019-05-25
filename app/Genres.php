<?php

function genres($dbh)
{
    $query = 'SELECT * FROM genres';
    $result = $dbh->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

function getGenre($dbh, $genre)
{
    $query = 'SELECT * FROM genres WHERE slug = :genre';
    $result = $dbh->prepare($query);

    $result->execute([
        'genre' => $genre
    ]);

    return $result->fetchAll();
}
