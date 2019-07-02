<?php
/**
 * Plik główny dla podstrony /stuff
 **/

include '../app/Init.php';

/**
 * Przekierowanie jeżli użytkownik nie jest zarejestrowany
 **/
if (!isset($_SESSION['auth_stuff'])) goBack();

include '../resources/layout/pagination.php';

$pageTitle = 'Administracja - Book Library';

include '../resources/layout/header/header-stuff.php';

?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Witaj!</h2>

        <div class="message-bar bg-danger">
            <i class="material-icons">build</i>
            <p>Panel administracyjny jest w dużej mierze nieukończony.</p>
        </div>
    </div>

<?php
include 'resources/layout/footer/footer.php';
