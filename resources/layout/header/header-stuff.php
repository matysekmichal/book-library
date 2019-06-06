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
                <li class="<?= isActive('loans') ?>"><a href="/stuff/loans"><i class="material-icons">library_books</i> Wypożyczenia</a></li>
                <li class="<?= isActive('borrowers') ?>"><a href="/stuff/borrowers"><i class="material-icons">person</i> Wypożyczający</a></li>
            </ul>
            <h2 class="h5">Biblioteka</h2>
            <hr>
            <ul>
                <li class="<?= isActive('books') ?>"><a href="/stuff/books"><i class="material-icons">book</i> Książki</a></li>
                <li class="<?= isActive('categories') ?>"><a href="/stuff/categories"><i class="material-icons">category</i> Kategorie</a></li>
                <li class="<?= isActive('authors') ?>"><a href="/stuff/authors"><i class="material-icons">edit</i> Autorzy</a></li>
            </ul>
            <h2 class="h5">Zarządzanie</h2>
            <hr>
            <ul>
                <li class="<?= isActive('accounts') ?>"><a href="/stuff/accounts"><i class="material-icons">supervised_user_circle</i> Konta</a></li>
                <li class="<?= isActive('settings') ?>"><a href="/stuff/settings"><i class="material-icons">settings</i> Ustawienia</a></li>
            </ul>
            <hr>
            <ul>
                <li><a href="/logout"><i class="material-icons">first_page</i> Wyloguj się</a></li>
            </ul>
        </nav>
    </aside>

    <main>
        <div class="content-holder">
