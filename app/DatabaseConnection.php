<?php
/**
 * Nawiązanie połączenia z bazą danych
 **/

$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = 'mysql:dbname=' . App::DB_NAME . ';host=' . App::DB_HOST . ';charset=utf8';

try {
    $dbh = new PDO($dsn, App::DB_USER, App::DB_PASSWORD, $opt);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
