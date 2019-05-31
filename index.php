<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">

    <div class="segment">
        <h2 class="my-0">Najnowsze książki</h2>
        <hr>
        <?php
        $books = fetchBooksFactory($dbh, '', 6);

        include 'resources/layout/books-grid.php';
        ?>
    </div>

    <div class="segment">
        <h2 class="mt-5 mb-0">Najczęściej wypożyczane</h2>
        <hr>
        <?php
        $books = fetchBooksFactory($dbh, 'most_read', 6);

        include 'resources/layout/books-grid.php';
        ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
