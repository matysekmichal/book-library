<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';

if (isset($_GET['b'])) {
    addToBasket($dbh, $_GET['b']);
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
        <?php if ($items = getItemsInBasket()) {?>
        <div class="book-list-grid">
            <?php
            foreach ($items as $key => $item) { $book = fetchBook($dbh, $item->slug); ?>
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

        <?php
        if (isset($_SESSION['auth'])) { ?>
        <div class="text-right mt-2">
            <a href="/confirmation" class="btn btn-sm btn-square btn-secondary">
                Potwierdzam wypożyczenie
                <i class="material-icons">done</i>
            </a>
        </div>
        <?php } else { ?>
            <div class="text-center mt-2">
                <p class="text-gray-70">
                    By móc wypożyczyć książki musisz być zalogowany.
                </p>
                <a href="/register" class="btn btn-sm btn-square btn-primary">
                    Rejestracja
                </a>

                <i class="text-gray-60 mx-2">lub</i>

                <a href="/login" class="btn btn-sm btn-square btn-secondary">
                    Logowanie
                </a>
            </div>
        <?php } ?>

        <?php } else { ?>
            <h1 class="mt-5 mb-2 text-center text-basic text-uppercase">
                Koszyk jest pusty
            </h1>
            <div class="text-center mb-5">
                <p>
                    Wybierz po lewej stronie jedną z interesujących<br>
                    Cię kategorii i znajdź swoją następną książkę.
                </p>
            </div>
        <?php } ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';