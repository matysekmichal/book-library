<?php

include '../app/Init.php';
include '../app/Admin/Borrowers.php';
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
                <th class="text-center" scope="col">ID</th>
                <th scope="col">Imię i nazwisko</th>
                <th scope="col">Email</th>
                <th class="text-center" scope="col">Utworzono</th>
                <th class="text-center" scope="col"></th>
            </tr>
            </thead>
            <?php
            $borrowers = fetchBorrowersPaginate($dbh, $page);

            foreach ($borrowers['data'] as $key => $borrower) {?>
                <tr>
                    <td class="text-center"><?= $borrower['bor_id'] ?></td>
                    <td><?= $borrower['bor_firstname'] .' '. $borrower['bor_lastname'] ?></td>
                    <td><?= $borrower['bor_email'] ?></td>
                    <td class="text-center"><?= prettyDate($borrower['bor_created_at']) ?></td>
                    <td class="text-center">
                        <div class="action">
                            <a href="/borrower/edit?b=<?= $borrower['bor_id'] ?>" class="edit"><i class="material-icons">edit</i></a>
                            <a href="/borrower/delete?b=<?= $borrower['bor_id'] ?>" class="delete"><i class="material-icons">delete</i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?= pagination($borrowers['page'], $borrowers['pages']) ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
