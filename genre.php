<?php

include 'app/Init.php';

$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
print_r(getGenre($dbh, $_GET['g']));
?>

<?php
include 'resources/layout/footer/footer.php';

