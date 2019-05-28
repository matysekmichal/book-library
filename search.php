<?php

include 'app/Init.php';
include 'app/Books.php';
include 'app/Search.php';

$pageTitle = 'Szukaj - Book Library';
$search = ($_GET['q']) ?? header('Location: ' . $_SERVER['HTTP_REFERER']);
$page = ($_GET['page']) ?? 1;

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Wynik wyszukiwania</h2>
        <hr>
    </div>

    <?php
    $books = search($dbh, $search);

    include 'resources/layout/books-grid.php';
    ?>

<?php
include 'resources/layout/footer/footer.php';
