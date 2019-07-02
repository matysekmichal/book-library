<?php
/**
 * Widok edycji hasła
 **/

include '../app/Init.php';
include '../app/Borrower.php';
include '../resources/layout/pagination.php';

/**
 * Przekierowanie jeżli użytkownik nie jest zarejestrowany
 **/
if (!isset($_SESSION['auth'])) goBack();

$pageTitle = 'Book Library - wypożyczalnia książek';
$page = ($_GET['page']) ?? 1;

include '../resources/layout/header/header-borrower.php';

$borrower = currentUser($dbh);

if (isset($_POST['new_password'])) {
    updatePassword($dbh, $borrower['bor_id']);
}
?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Zmiana hasła</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for="prev_password">Poprzednie hasło:</label>
                <input type="password" name="prev_password" id="prev_password" placeholder="Poprzednie hasło" required>
            </div>

            <div class="form-group">
                <label for="new_password">Nowe hasło:</label>
                <input type="password" name="new_password" id="new_password" placeholder="Nowe hasło" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="new_repeat_password">Powtórz nowe hasło:</label>
                <input type="password" name="new_repeat_password" id="new_repeat_password" placeholder="Nowe hasło" required autocomplete="off">
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-square">Zmień hasło</button>
            </div>
        </form>
    </div>

<?php
include 'resources/layout/footer/footer.php';
