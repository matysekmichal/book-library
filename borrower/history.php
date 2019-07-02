<?php
/**
 * Widok spisu wypożyczeń użytkownika
 **/

include '../app/Init.php';
include '../app/Borrower.php';
include '../app/Book.php';
include '../resources/layout/pagination.php';

/**
 * Przekierowanie jeżli użytkownik nie jest zarejestrowany
 **/
if (!isset($_SESSION['auth'])) goBack();

$pageTitle = 'Historia - Book Library';
$page = ($_GET['page']) ?? 1;

include '../resources/layout/header/header-borrower.php';

$borrower = currentUser($dbh);
?>
    <div class="content">
    <div class="segment">
        <h2 class="mt-0">Wypożyczenia</h2>

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
                <td class="text-center"><?= prettyDateTime($loan['l_borrow_day']) ?></td>
                <td class="text-center"><?= prettyDate($loan['l_return_day']) ?></td>
                <td>
                    <?php foreach ($borrowedBooks as $borrowedBook) {?>
                        <a href="/book?b=<?= $borrowedBook['b_slug'] ?>"><?= $borrowedBook['b_name'] ?></a><br>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <?php
                        echo renderLoanStatus($loan['l_status']);
                        if ($loan['l_status'] == LoanStatusEnum::WAITING) {
                            echo '<br><a href="/borrower/loan?r='. baseEncrypt($loan['l_id']) .'"
                                class="h9 font-weight-bold text-uppercase link-danger">Anuluj</a>';
                        }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- Inicjacja paginacji -->
        <?= pagination($loans['page'], $loans['pages']) ?>

    </div>

<?php
include 'resources/layout/footer/footer.php';
