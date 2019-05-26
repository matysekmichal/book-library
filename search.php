<?php

include 'app/Init.php';
include 'app/Search.php';

$pageTitle = 'Szukaj - Book Library';
$search = $_GET['q'];

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Wynik wyszukiwania</h2>
        <hr>
    </div>

    <?php
        echo '<pre>';
        print_r(search($dbh, $search, 4));
        echo '</pre>';
    ?>

    <div class="books-grid">
        <div class="flex">
            <?php
            foreach (search($dbh, $search, 4) as $row) {

            ?>
            <?php } ?>
        </div>
    </div>

<?php
include 'resources/layout/footer/footer.php';
