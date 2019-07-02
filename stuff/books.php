<?php
/**
 * Widok spisu ksiązek
 **/

include '../app/Init.php';

/**
 * Przekierowanie jeżli użytkownik nie jest zarejestrowany
 **/
if (!isset($_SESSION['auth_stuff'])) goBack();

include '../app/Admin/Books.php';
include '../app/Book.php';
include '../resources/layout/pagination.php';

$pageTitle = 'Wypożyczenia - Book Library';

include '../resources/layout/header/header-stuff.php';
?>
    <div class="content">

    <div class="segment">
        <table>
            <thead>
            <tr>
                <th class="text-center" scope="col"></th>
                <th scope="col">Tytuł</th>
                <th class="text-center" scope="col">Dostępność</th>
                <th class="text-center" scope="col">Utworzono</th>
                <th class="text-center" scope="col"></th>
            </tr>
            </thead>
            <?php
            $books = fetchBooksPaginate($dbh, '', $page);

            foreach ($books['data'] as $key => $book) {?>
                <tr>
                    <td class="text-center p-0">
                        <img class="cover" src="<?= App::APP_URL . '/storage/covers/' . $book['b_image']; ?>" alt="okładka książki <?= strtolower($book['b_name']) ?>">
                    </td>
                    <td>
                        <?= $book['b_name'] ?><br>
                        <?= prettyDate($book['b_published']) ?>
                    </td>
                    <td class="text-center"><?= $book['b_quantity'] ?>/<?= $book['b_available'] ?></td>
                    <td class="text-center"><?= prettyDate($book['b_created_at']) ?></td>
                    <td class="text-center">
                        <div class="action">
                            <a href="/book/edit?b=<?= $book['b_id'] ?>" class="edit"><i class="material-icons">edit</i></a>
                            <a href="/book/delete?b=<?= $book['b_id'] ?>" class="delete"><i class="material-icons">delete</i></a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <?= pagination($books['page'], $books['pages']) ?>
    </div>

<?php
include 'resources/layout/footer/footer.php';
