<?php

include '../app/Init.php';
include '../app/Borrow.php';

if (isset($_GET['r'])) {
    echo ';';
    updateLoanStatus($dbh, $_GET['r'], LoanStatusEnum::CANCELED);
}
