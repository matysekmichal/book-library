<?php

function getGenreInfo($dbh, $slug)
{
    $query = 'SELECT g_name, g_meta_description, g_description  FROM genres WHERE g_slug = :slug';
    $result = $dbh->prepare($query);

    $result->bindValue(':slug', $slug, PDO::PARAM_STR);

    $result->execute();

    return $result->fetch();
}

function genres($dbh)
{
    $query = 'SELECT * FROM genres';
    $result = $dbh->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

function getGenre($dbh, $genre)
{
    $query = 'SELECT * FROM genres WHERE g_slug = :genre';
    $result = $dbh->prepare($query);

    $result->bindValue(':genre', $genre, PDO::PARAM_STR);

    $result->execute();

    return $result->fetchAll();
}