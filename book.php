<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';

$pageTitle = 'Book Library - wypożyczalnia książek';
$book = fetchBook($dbh, $_GET['b']);

include 'resources/layout/header/header.php';
?>
    <div class="content">
        <div class="book-first-section-grid">
            <div class="image">
                <img src="<?= App::APP_URL .'/storage/covers/'. $book['b_image']; ?>" alt="Okładka <?= $book['b_name'] ?>">
            </div>
            <div class="content">
                <h1 class="h3"><?= $book['b_name'] ?></h1>
                <hr>
                <?= ($author = getBookAuthors($dbh, $book)) ? '<p><span class="text-gray-60">Autor:</span> '. $author .'</p>' : '' ?>
                <?= ($pages = $book['b_pages']) ? '<p><span class="text-gray-60">Strony:</span> '. $book['b_pages'] .'</p>' : '' ?>
                <?= ($availability = availabilityBook($book['b_quantity'])) ? '<p><span class="text-gray-60">Dostępność:</span> '. $availability .'</p>' : '' ?>
                <?= ($published = prettyDate($book['b_published'])) ? '<p><span class="text-gray-60">Publikacja:</span> '. $published .'</p>' : '' ?>

                <?php if ($book['b_available']) { ?>
                    <a href="/basket?b=<?= $book['b_slug'] ?>"class="btn btn-secondary btn-square">Wypożycz</a>
                <?php } else { ?>
                    <button type="button" class="btn btn-secondary btn-square" disabled>Niedostępna</button>
                <?php } ?>
            </div>
        </div>

        <div class="mt-5">
            <hr>
            <h2>Opis książki</h2>
            <p class="text-gray-90"><?= $book['b_description'] ?></p>
        </div>
<?php
include 'resources/layout/footer/footer.php';
