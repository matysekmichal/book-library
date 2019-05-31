<?php

include '../app/Init.php';
include '../app/Borrower.php';
include '../resources/layout/pagination.php';

$pageTitle = 'Book Library - wypożyczalnia książek';
$page = ($_GET['page']) ?? 1;

include '../resources/layout/header/header-borrower.php';

$borrower = currentUser($dbh);
?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Witaj!</h2>

        <?php
        echo $borrower['bor_student_album'];
            if (!checkProfileComplete($borrower)) { ?>
                <div class="message-bar bg-primary-gradient">
                    <i class="material-icons">person</i>
                    <p>Twój profil jest nie kompletny.</p>
                    <a href="/borrower/edit" class="btn btn-sm btn-square btn-secondary right">Uzupełnij profil</a>
                </div>
            <?php } ?>
    </div>

    <div class="segment mt-5">
        <h2>Historia wypożyczeń</h2>

        <table>
            <thead>
                <tr>
                    <th class="text-center" scope="col">Wypożyczono</th>
                    <th class="text-center" scope="col">Data zwrotu</th>
                    <th scope="col">Wypożyczone książki</th>
                    <th class="text-center" scope="col">Status</th>
                </tr>
            </thead>
            <?php
            $loans = userLoans($dbh, $borrower['bor_id'], $page);

            foreach ($loans['data'] as $key => $loan) {
                $borrowedBooks = getBorrowedBooks($dbh, $loan['l_id']);?>
            <tr>
                <td class="text-center vat"><?= prettyDateTime($loan['l_borrow_day']) ?></td>
                <td class="text-center vat"><?= prettyDate($loan['l_return_day']) ?></td>
                <td>
                    <?php foreach ($borrowedBooks as $borrowedBook) {?>
                        <a href="/book?b=<?= $borrowedBook['b_slug'] ?>"><?= $borrowedBook['b_name'] ?></a><br>
                    <?php } ?>
                </td>
                <td class="text-center"><?= renderLoanStatus($loan['l_status']) ?></td>
            </tr>
            <?php } ?>
        </table>

        <?= pagination($loans['page'], $loans['pages']) ?>

    </div>

<?php
include 'resources/layout/footer/footer.php';
