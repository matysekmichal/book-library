<?php

include 'app/Init.php';
$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header-simplify.php';
?>

<div class="box margins">
    <h1 class="h3 mt-0 mb-3 text-center">Logowanie</h1>
    <form action="/app/Auth/Login.php" method="post">
        <div class="form-group">
            <i class="material-icons">email</i>
            <input type="text" name="email" placeholder="Email" autofocus required>
        </div>

        <div class="form-group">
            <i class="material-icons">https</i>
            <input type="password" name="password" placeholder="Hasło" required>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Zaloguj się</button>
        </div>

        <p class="text-center h7 text-gray-70">
            Nie mam konta. <a href="/register" class="link-gray text-decoration">Zarejestruj się</a>.
        </p>
    </form>
</div>

<?php
include 'resources/layout/footer/footer-simplify.php';

