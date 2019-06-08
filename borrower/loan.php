<?php

include '../app/Init.php';
include '../app/Borrow.php';
include '../app/Enums/LoanStatusEnum.php';

if (!isset($_SESSION['auth'])) goBack();

if (isset($_GET['r'])) {
    updateLoanStatus($dbh, $_GET['r'], LoanStatusEnum::CANCELED);
}
