<?php
    include 'app/Genres.php';
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?? APP_NAME ?></title>

    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">
    <link rel="icon" href="img/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/resources/styles/master.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<header>
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.html">
                    <h1>Book Library</h1>
                </a>
            </div>
            <a href="" class="btn btn-sm btn-primary">Logowanie</a>
        </div>
    </div>
</header>

<div class="container page-content-holder">
<aside>
    <h2 class="h5 my-0">Kategorie</h2>
    <hr class="mt-1">
    <nav class="navigation-vertical">
        <ul>
            <?php
                foreach (genres($dbh) as $key => $genre) {
                    echo '<li><a href="'. slugify($genre['name']) .'">'. $genre['name'] .'</a></li>';
                }
            ?>
        </ul>
    </nav>
</aside>

<main class="content-holder">
<div class="content">