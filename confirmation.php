<?php

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';
include 'app/Borrow.php';
include 'app/Borrower.php';

if (!isset($_SESSION['auth'])) goBack();

$pageTitle = 'Potwierdzenie rezerwacji - Book Library';
$nofollow = true;

include 'resources/layout/header/header.php';

if (empty(getItemsInBasket())) {
    flashWarning('Twój koszyk jest pusty.', '#');
}

?>
    <div class="content">
    <div class="segment">
        <?php
        if (saveLoan($dbh)) {
        ?>
            <h1 class="mt-5 mb-2 text-center text-success text-uppercase">
                Udało się
            </h1>
            <div class="text-center mb-5">
                <p>
                    Twoje wypożyczenie zostało zarejestrowane.<br>
                    Zostaniesz poinformowany/a o skompletowaniu książek.
                </p>
            </div>
        <?php } else { ?>
            <h1 class="mt-5 mb-2 text-center text-danger text-uppercase">
                Coś poszło nie tak!
            </h1>
            <div class="text-center mb-5">
                <p>
                    Nie udało nam się zapisać Twojego wypożyczenia.<br>
                    Spróbuj ponownie za chwilę. Przepraszamy za problemy.
                </p>
            </div>
        <?php } ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';