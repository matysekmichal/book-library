<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Books.php';

if (isset($_GET['b'])) {
    addToBasket($_GET['b']);
    goBack();
    die();
}

if (isset($_GET['r'])) {
    removeFromBasket($_GET['r']);
    goBack();
    die();
}

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Twój koszyk</h2>
        <hr>
        <?php
        $items = json_decode($_COOKIE[getNameCookie('basket')]);
        ?>

        <div class="book-list-grid">
            <?php
            foreach ($items as $key => $item) { $book = fetchBook($dbh, baseDecrypt($item)); ?>
                <div class="item wide">
                    <div class="cover">
                        <a href="/book?b=<?= $book['b_slug'] ?>">
                            <img src="<?= App::APP_URL . '/storage/covers/' . $book['b_image']; ?>" alt="okładka książki <?= strtolower($book['b_name']) ?>">
                        </a>
                    </div>

                    <div class="content">
                        <a href="/book?b=<?= $book['b_slug'] ?>">
                            <div class="heading"><?= $book['b_name'] ?></div>
                        </a>
                        <div class="description"><?= limit_text($book['b_description'], 15) ?></div>
                    </div>

                    <div class="action">
                        <a href="/basket?r=<?= baseEncrypt($key) ?>" class="text-center text-danger">
                            <i class="material-icons delete">delete</i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="text-right mt-2">
            <span class="btn btn-sm btn-square btn-secondary dialog-close">
                Potwierdzam wypożyczenie
                <i class="material-icons">done</i>
            </span>
        </div>
    </div>

<?php
include 'resources/layout/footer/footer.php';