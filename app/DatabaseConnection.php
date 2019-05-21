<?php

try {
    $db = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
    die();
}