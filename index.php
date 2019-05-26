<?php

include 'app/Init.php';
include 'app/Books.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Najnowsze książki</h2>
        <hr>
    </div>

    <?php
    $books = fetchBooks($dbh, 4);

    include 'resources/layout/books-grid.php';
    ?>

<?php
include 'resources/layout/footer/footer.php';
