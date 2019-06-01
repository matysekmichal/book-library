<?php

include '../app/Init.php';
include '../app/Borrower.php';
include '../resources/layout/pagination.php';

$pageTitle = 'Book Library - wypożyczalnia książek';
$page = ($_GET['page']) ?? 1;

include '../resources/layout/header/header-borrower.php';

$borrower = currentUser($dbh);

if (isset($_POST['email'])) {
    updateProfile($dbh, $borrower['bor_id']);
}

?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Edycja profilu</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Email" value="<?= ($borrower['bor_email']) ?? '' ?>" required>
            </div>

            <div class="form-group">
                <label for="firstname">Imię:</label>
                <input type="text" name="firstname" id="firstname" placeholder="Twoje imię" value="<?= ($borrower['bor_firstname']) ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="lastname">Nazwisko:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Twoje naziwsko" value="<?= ($borrower['bor_lastname']) ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="student_album">Numer albumu:</label>
                <input type="text" name="student_album" id="student_album" placeholder="000000" value="<?= ($borrower['bor_student_album']) ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="id_document">Numer dowodu osobistego lub paszportu:</label>
                <input type="text" name="id_document" id="student_album" placeholder="YYY 000000" value="<?= ($borrower['bor_id_account']) ?? '' ?>">
                <span class="info">* Opcjonalnie - podać w przypadku nie bycia studentem</span>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-square">Zapisz</button>
            </div>
        </form>
    </div>

<?php
include 'resources/layout/footer/footer.php';
