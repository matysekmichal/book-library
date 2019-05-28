<?php

include 'app/Init.php';
include 'app/Books.php';

$pageTitle = 'Book Library - wypożyczalnia książek';
$page = ($_GET['page']) ?? 1;

include 'resources/layout/header/header.php';
?>

    <div class="content">
    <?php
    $books = fetchBooksPaginate($dbh, $_GET['g'], $page);

    include 'resources/layout/books-grid-pagination.php';
    ?>

<?php
include 'resources/layout/footer/footer.php';

