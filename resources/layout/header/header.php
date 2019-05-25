<?php
    include 'app/Genres.php';
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle ?? App::APP_NAME ?></title>

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
                <a href="/">
                    <h1>Book Library</h1>
                </a>
            </div>
            <div>
            <?php if (empty($_SESSION['auth'])) { ?>
                <a href="/login" class="h7 link-gray mr-2">Zaloguj się</a>
                <a href="/register" class="btn btn-sm btn-primary">Załóż konto</a>
            <?php } else { ?>
                <a href="/logout" class="h7 link-gray mr-2">Wyloguj się</a>
            <?php } ?>
            </div>
        </div>
    </div>
</header>

<div class="container page-content-holder">
<aside>
    <h2 class="h5 my-0">Twoj konto</h2>
    <hr class="mt-1">
    <nav class="navigation-vertical nav-primary">
        <ul>
            <li><a href=""><i class="material-icons">person</i> Dane konta</a></li>
            <li><a href=""><i class="material-icons">archive</i> Schowek <span class="badge">22</span></a></li>
            <li><a href=""><i class="material-icons">first_page</i> Wyloguj się</a></li>
        </ul>
    </nav>

    <h2 class="h5 mt-3 mb-0">Kategorie</h2>
    <hr class="mt-1">
    <nav class="navigation-vertical">
        <ul>
            <?php
                foreach (genres($dbh) as $key => $genre) {
                    echo '<li><a href="/genre?g='. $genre['slug'] .'">'. $genre['name'] .'</a></li>';
                }
            ?>
        </ul>
    </nav>
</aside>



<main>
    <div class="content-holder">
