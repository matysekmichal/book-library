<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';
include 'app/Search.php';

$pageTitle = 'Szukaj - Book Library';
$search = $_GET['q'];

if (empty($search)) {
    flashError('Wpisz książkę lub autora');
}

if (strlen($search) < 3) {
    flashError('Minimalna długość frazy to 3 znaki.');
}

$books = search($dbh, $search);

include 'resources/layout/header/header.php';
?>
    <?php include 'resources/layout/search-form.php' ?>
    <div class="content">
    <div class="segment">
        <div class="segment-row">
            <h2 class="my-0">Wynik wyszukiwania</h2>
            <p>
                Znaleziono: <?= $books['items'] ?>
            </p>
        </div>
        <hr>
    </div>

    <?php

    if ($books['items'] == 0) { ?>
        <h1 class="h3 mt-5 mb-3 text-center text-basic text-uppercase">
            Nie znaleziono szukanej frazy
        </h1>
    <?php }

    include 'resources/layout/books-grid-pagination.php';
?>

<?php
include 'resources/layout/footer/footer.php';
