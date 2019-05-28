<?php
if (isset($_COOKIE[getNameCookie('basket_show')])) {
    unsetCookie('basket_show');
?>
    <div id="dialog" class="dialog">
        <div class="container">
            <div class="content">
                <div class="heading">
                    <div class="title mb-4">Dodano do koszyka</div>
                    <div class="close dialog-close">
                        <i class="material-icons text-basic">close</i>
                    </div>
                </div>

                <?php
                $basket = json_decode($_COOKIE[getNameCookie('basket')]);
                $key = $basket[count($basket)-1];
                $lastItem = baseDecrypt($basket[count($basket)-1]);
                $book = fetchBook($dbh, $lastItem);
                ?>

                <div class="book-list-grid">
                    <div class="item">
                        <div class="cover">
                            <a href="/book?b=<?= $book['b_slug'] ?>">
                                <img src="<?= App::APP_URL . '/storage/covers/' . $book['b_image']; ?>" alt="okładka książki <?= strtolower($book['b_name']) ?>">
                            </a>
                        </div>
                        <div class="content">
                            <a href="/book?b=<?= $book['b_slug'] ?>">
                                <div class="heading"><?= $book['b_name'] ?></div>
                            </a>
                            <div class="description"><?= limit_text($book['b_description'], 30) ?></div>
                        </div>
                        <div class="action">
                            <a href="/basket?r=<?= baseEncrypt($key) ?>" class="text-center text-danger">
                                <i class="material-icons delete">delete</i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="next-step">
                    <a href="/basket" class="btn btn-sm btn-square btn-gray">Przjedź do koszyka</a>
                    <span class="btn btn-sm btn-square btn-secondary dialog-close">Kontynuj wypożyczanie</span>
                </div>
            </div>
        </div>
    </div>
<?php }