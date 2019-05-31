<?php
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
        <?php if (empty($_SESSION['auth'])) { ?>
            <p class="text-center">
                <a href="/login" class="h7 text-uppercase link-gray">zaloguj się</a>
                <i class="h8 text-gray-40">&nbsp; lub &nbsp;</i>
                <a href="/register.php" class="h7 text-uppercase link-gray">zarejestruj</a>
            </p>
        <?php } else { ?>
            <ul>
                <li><a href="/borrower/dashboard"><i class="material-icons">person</i> Dane konta</a></li>
                <li><a href="/basket"><i class="material-icons">shopping_basket</i> Koszyk <span class="badge-counter"><?= getNumberItemsInBasket() ?></span></a></li>
                <li><a href="/logout"><i class="material-icons">first_page</i> Wyloguj się</a></li>
            </ul>
        <?php }?>
    </nav>

    <h2 class="h5 mt-3 mb-0">Kategorie</h2>
    <hr class="mt-1">
    <nav class="navigation-vertical">
        <ul>
            <?php
                foreach (genres($dbh) as $key => $genre) {
                    echo '<li><a href="/genre?g='. $genre['g_slug'] .'">'. $genre['g_name'] .'</a></li>';
                }
            ?>
        </ul>
    </nav>
</aside>



<main>
    <div class="content-holder">
