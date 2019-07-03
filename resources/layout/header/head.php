<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= (isset($nofollow) && $nofollow) ? '<meta name="robots" content="noindex,nofollow">' : '' ?>
    <title><?= $pageTitle ?? App::APP_NAME ?></title>

    <meta name="description"
          content="<?= $metaDescription ?? 'Nowoczesna biblioteka dająca możliwość wypożyczania zbiorów przez internet. Wypożyczk książkę w serwisie, a będzie ona zarezerwowana dla Ciebie przez 3 dni.' ?>">
    <link rel="icon" href="<?= App::APP_URL . '/resources/images/favicon.png' ?>" type="image/x-icon">
    <link rel="stylesheet" href="/resources/styles/master.min.css">
</head>