<?php

include '../app/Init.php';

if (!isset($_SESSION['auth_stuff'])) goBack();

include '../resources/layout/pagination.php';

$pageTitle = 'Administracja - Book Library';

include '../resources/layout/header/header-stuff.php';

?>
    <div class="content">

    <div class="segment">
        <h2 class="mt-0">Witaj!</h2>
    </div>

<?php
include 'resources/layout/footer/footer.php';
