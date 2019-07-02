<?php
/**
 * Formularz logowania dla zespołu administracyjnego
 **/

include '../app/Init.php';

/**
 * Przekierowanie jeżli użytkownik nie jest zarejestrowany
 **/
if (isset($_SESSION['auth_stuff'])) goBack();

$pageTitle = 'Book Library - wypożyczalnia książek';
$nofollow = true;

include '../resources/layout/header/header-simplify-stuff.php';
?>

<div class="box margins">
    <h1 class="h3 mt-0 mb-3 text-center">Logowanie dla pracowników</h1>
    <form action="../app/Auth/Login.php" method="post">
        <div class="form-group">
            <i class="material-icons">person</i>
            <input type="text" name="login" placeholder="Login" autofocus required>
        </div>

        <div class="form-group">
            <i class="material-icons">https</i>
            <input type="password" name="password" placeholder="Hasło" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Zaloguj się</button>
        </div>
    </form>
</div>

<?php
include '../resources/layout/footer/footer-simplify.php';

