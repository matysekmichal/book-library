<?php

include '../app/Init.php';
include '../app/Borrower.php';
include '../app/Book.php';
include '../resources/layout/pagination.php';

if (!isset($_SESSION['auth'])) goBack();

$pageTitle = 'Book Library - wypożyczalnia książek';
$page = ($_GET['page']) ?? 1;

include '../resources/layout/header/header-borrower.php';

$borrower = currentUser($dbh);
?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Witaj!</h2>

        <?php
        if (!checkProfileComplete($borrower)) { ?>
            <div class="message-bar bg-danger">
                <i class="material-icons">person</i>
                <p>Twój profil jest nie kompletny.</p>
                <a href="/borrower/edit" class="btn btn-sm btn-square btn-light right text-danger">Uzupełnij profil</a>
            </div>
        <?php } else { ?>
            <div class="message-bar bg-success">
                <i class="material-icons">person</i>
                <p>Twój profil jest kompletny.</p>
            </div>
        <?php } ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
