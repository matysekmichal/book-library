<?php
if (isset($_COOKIE[getNameCookie('basket_show')])) {
    unsetCookie('basket_show');
?>
    <div class="dialog">
        <div class="container">
            <div class="content">
                <div class="title">Koszyk</div>

                <?php
                $basket = json_decode($_COOKIE[getNameCookie('basket')]);

                foreach ($basket as $item) {
                    echo baseDecrypt($item). '<br>';
                }
                ?>
            </div>
        </div>
    </div>
<?php }