<?php

include 'app/Init.php';
include 'app/Books.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <form action="">
        <div class="finder">
            <div class="form-group">
                <input type="text" placeholder="Wyszukaj książkę lub autora ...">
                <i class="material-icons">search</i>
            </div>
            <button class="btn btn-dark btn-square">Szukaj</button>
        </div>
    </form>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Najnowsze książki</h2>
        <hr>
    </div>

    <div class="books-grid">
        <div class="flex">
            <?php
            foreach (fetchBooks($dbh, 4) as $book) {
            ?>
            <div class="item">
                <div class="cover">
                    <img src="<?= App::APP_URL .'/storage/covers/'. $book['image']; ?>" alt="Cover">
                </div>
                <div class="content">
                    <div class="title"><?= $book['name'] ?></div>
                    <div class="author"><?= getBookAuthors($dbh, $book) ?></div>
                    <div class="description"><?= limit_text($book['description']) ?></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<?php
include 'resources/layout/footer/footer.php';
