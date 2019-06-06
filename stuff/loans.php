<?php

include '../app/Init.php';
include '../app/Admin/Loans.php';
include '../app/Book.php';
include '../resources/layout/pagination.php';

$pageTitle = 'Wypożyczenia - Book Library';

include '../resources/layout/header/header-stuff.php';

?>
    <div class="content">

    <div class="segment">
        <table>
            <thead>
            <tr>
                <th class="text-center" scope="col">Wypożyczono</th>
                <th class="text-center" scope="col">Data zwrotu</th>
                <th class="text-center" scope="col">Wypożyczający</th>
                <th class="text-center" scope="col">Status</th>
            </tr>
            </thead>
            <?php
            $loans = fetchLoansPaginate($dbh, $page);

            foreach ($loans['data'] as $key => $loan) {?>
                <tr>
                    <td class="text-center"><?= prettyDateTime($loan['l_borrow_day']) ?></td>
                    <td class="text-center"><?= prettyDate($loan['l_return_day']) ?></td>
                    <td class="text-center">
                        <a href="/borrower/<?= $loan['bor_id'] ?>"><?= $loan['bor_firstname'] .' '. $loan['bor_lastname'] ?></a>
                    </td>
                    <td class="text-center"><?= renderLoanStatus($loan['l_status']) ?></td>
                </tr>
            <?php } ?>
        </table>

        <?= pagination($loans['page'], $loans['pages']) ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
