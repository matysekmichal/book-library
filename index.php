<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Books.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">

<!--    <div class="segment bg-primary-gradient mb-4">-->
<!--        <div class="content">-->
<!--            <h2 class="text-white my-0">Słowa wstępu</h2>-->
<!--            <p>-->
<!--                Aplikacja po-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->

    <div class="segment">
        <h2 class="my-0">Najnowsze książki</h2>
        <hr>
        <?php
        $books = fetchBooks($dbh);

        include 'resources/layout/books-grid.php';
        ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
