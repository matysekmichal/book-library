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
                <a href="/logout" class="h7 link-gray mr-2">Wyloguj się</a>
            </div>
        </div>
    </div>
</header>

<div class="container page-content-holder">
    <aside>
        <h2 class="h5 my-0">Wypożyczenia</h2>
        <hr class="mt-1">
        <nav class="navigation-vertical nav-primary">
            <ul>
                <li><a href="/borrower/dashboard"><i class="material-icons">library_books</i> Wypożyczenia</a></li>
                <li><a href="/borrower/dashboard"><i class="material-icons">person</i> Wypożyczający</a></li>
            </ul>
            <h2 class="h5">Biblioteka</h2>
            <hr>
            <ul>
                <li><a href="/borrower/dashboard"><i class="material-icons">book</i> Książki</a></li>
                <li><a href="/borrower/dashboard"><i class="material-icons">category</i> Kategorie</a></li>
                <li><a href="/borrower/dashboard"><i class="material-icons">edit</i> Autorzy</a></li>
            </ul>
            <h2 class="h5">Zarządzanie</h2>
            <hr>
            <ul>
                <li><a href="/borrower/dashboard"><i class="material-icons">supervised_user_circle</i> Konta</a></li>
                <li><a href="/borrower/dashboard"><i class="material-icons">settings</i> Ustawienia</a></li>
            </ul>
            <hr>
            <ul>
                <li><a href="/logout"><i class="material-icons">first_page</i> Wyloguj się</a></li>
            </ul>
        </nav>
    </aside>

    <main>
        <div class="content-holder">
