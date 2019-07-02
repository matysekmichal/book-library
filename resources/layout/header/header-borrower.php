<?php
/**
 * Widok nagłówka dla czytelnika
 **/
include 'head.php';
?>
<body class="<?= $body_class ?>">

<?php
include 'resources/layout/basket-widget.php';
?>

<header>
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <h1>Book Library</h1>
                </a>
            </div>
            <div>
                <a href="/basket" class="basket-link"><i class="material-icons">shopping_basket</i> Koszyk <span class="badge-counter"><?= getNumberItemsInBasket() ?></span></a>
                <span class="text-gray-30 mx-1">|</span>
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
            <?php include 'user-menu.php' ?>
        </nav>
    </aside>

    <main>
        <div class="content-holder">
