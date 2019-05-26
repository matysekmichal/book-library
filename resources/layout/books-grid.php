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
                        <img src="<?= App::APP_URL .'/storage/covers/'. $book['b_image']; ?>" alt="Cover">
                    </a>
                </div>
                <div class="content">
                    <a href="/book?b=<?= $book['b_slug'] ?>">
                        <div class="title"><?= $book['b_name'] ?></div>
                    </a>
                    <div class="author"><?= getBookAuthors($dbh, $book) ?></div>
                    <div class="description"><?= limit_text($book['b_description']) ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php }