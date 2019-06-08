<?php

include '../app/Init.php';
include '../app/Borrow.php';
include '../app/Enums/LoanStatusEnum.php';

if (!isset($_SESSION['auth'])) goBack();

if (isset($_GET['r'])) {
    if (cancelBorrow($dbh, $_GET['r'])) {
        flashSuccess('Twoje wypożyczenie zostało anulowane.');
    }

    flashError('Nie udało się anulować tego wypożyczenia.');
}
