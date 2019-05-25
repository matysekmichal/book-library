<?php

include 'app/Init.php';
$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header-simplify.php';
?>

<div class="box margins">
    <h1 class="h3 mt-0 mb-3 text-center">Rejestracja</h1>
    <form action="app/Auth/Register.php" method="post">
        <div class="form-group">
            <i class="material-icons">person</i>
            <input type="text" name="login" placeholder="Login" autofocus required>
        </div>

        <div class="form-group">
            <i class="material-icons">email</i>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <i class="material-icons">https</i>
            <input type="password" name="password" placeholder="Hasło" required>
        </div>

        <div class="form-group from-checkbox">
            <input type="checkbox" id="terms" name="terms">
            <label for="terms" class="text-gray-90 h7">Zgadzam się na warunki zawarte w regulaminie.</label>
        </div>

        <div class="form-group text-center">
            <button type="submit" name="register" class="btn btn-primary">Załóż konto</button>
        </div>
    </form>
</div>

<?php
include 'resources/layout/footer/footer-simplify.php';

