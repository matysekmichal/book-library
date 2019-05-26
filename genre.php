<?php

include 'app/Init.php';
include 'app/Books.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>

    <div class="content">
    <?php
    $books = fetchBooksByGenre($dbh, $_GET['g'], 4);

    include 'resources/layout/books-grid.php';
    ?>

<?php
include 'resources/layout/footer/footer.php';

