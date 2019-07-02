<?php
/**
 * Pokazanie listy książek z wybranego gatunku
 **/

include 'app/Init.php';
include 'app/Genres.php';
include 'app/Book.php';

$genre = getGenreInfo($dbh, $_GET['g']);
$genreName = $genre['g_name'];
$metaDescription = (empty($genre['g_meta_description'])) ? $genre['g_meta_description'] : $genre['g_description'];
$pageTitle = $genreName . ' - Book Library';
$page = ($_GET['page']) ?? 1;

include 'resources/layout/header/header.php';
?>

    <div class="content">
    <div class="segment">
        <h2 class="my-0"><?= $genreName ?></h2>
        <hr>
        <?php
        $books = fetchBooksPaginate($dbh, $_GET['g'], $page);

        include 'resources/layout/books-grid-pagination.php';
        ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';

