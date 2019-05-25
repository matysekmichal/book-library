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
<body class="body-simplify bg-primary-gradient">
<header class="simple">
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <h1>Book Library</h1>
                </a>
            </div>

            <?php if (stringContains(getUrl(), 'login')) { ?>
                <a href="/register" class="btn btn-sm btn-secondary">Rejestracja</a>
            <?php } else { ?>
                <a href="/login" class="btn btn-sm btn-secondary">Logowanie</a>
            <?php } ?>
        </div>
    </div>
</header>

<div class="container page-content-holder-wide">
    <main>