<?php
if (isset($books)) { ?>
    <div class="books-grid">
        <div class="flex">
            <?php
            foreach ($books as $book) {
                ?>
                <div class="item">
                    <div class="cover">
                        <a href="/book?b=<?= $book['b_slug'] ?>">
                            <img src="<?= App::APP_URL . '/storage/covers/' . $book['b_image']; ?>" alt="okładka książki <?= strtolower($book['b_name']) ?>">
                        </a>
                    </div>
                    <div class="content">
                        <a href="/book?b=<?= $book['b_slug'] ?>">
                            <div class="title"><?= $book['b_name'] ?></div>
                        </a>
                        <div class="author"><?= getBookAuthors($dbh, $book) ?></div>
                        <div class="description"><?= limit_text($book['b_description'], 30) ?></div>
                    </div>

                    <div class="text-center my-2">
                        <?php if ($book['b_available']) { ?>
                            <a href="/basket?b=<?= $book['b_slug'] ?>" class="btn btn-sm btn-square btn-secondary">Wypożycz</a>
                        <?php } else { ?>
                            <button type="button" class="btn btn-sm btn-secondary btn-square" disabled>Niedostępna</button>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php } ?>




