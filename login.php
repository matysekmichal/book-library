<?php

include 'app/Init.php';
$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header-simplify.php';
?>

<div class="box margins">
    <h1 class="h3 mt-0 mb-3 text-center">Logowanie</h1>
    <form action="">
        <div class="form-group">
            <i class="material-icons">person</i>
            <input type="text" name="login" placeholder="Login" autofocus>
        </div>

        <div class="form-group">
            <i class="material-icons">https</i>
            <input type="password" name="password" placeholder="Hasło">
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Zaloguj się</button>
        </div>
    </form>
</div>

<?php
include 'resources/layout/footer/footer-simplify.php';

