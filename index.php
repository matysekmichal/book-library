<?php

include 'app/Init.php';
$pageTitle = 'Book Library - wypożyczalnia książek';

include 'resources/layout/header/header.php';
?>
    <form action="">
        <div class="finder">
            <div class="form-group">
                <input type="text" placeholder="Wyszukaj książkę lub autora ...">
                <i class="material-icons">search</i>
            </div>
            <button class="btn btn-dark btn-square">Szukaj</button>
        </div>
    </form>
    <div class="content">
    <div class="segment">
        <h2 class="my-0">Najnowsze książki</h2>
        <hr>
    </div>

    <div class="books-grid">
        <div class="flex">
            <div class="item">
                <div class="cover">
                    <img src="https://cdn.bonito.pl/zdjecia/8/e994af62620a4c94da33e7-cisza.jpg" alt="Cover">
                </div>
                <div class="content">
                    <div class="title">Sed vitae nisi vitae nisi</div>
                    <div class="author">Nullam molestie</div>
                    <div class="description">
                        Mauris eget vestibulum orci. Praesent tincidunt, augue iaculis dapibus commodo, risus odio lobortis
                        elit, id luctus ligula nulla eget nibh. Aenean porta diam ut turpis vestibulum tincidunt.
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="cover">
                    <img src="/resources/images/default-book-cover.svg" alt="Cover">
                </div>
                <div class="content">
                    <div class="title">Sed vitae nisi vitae nisi</div>
                    <div class="author">Nullam molestie</div>
                    <div class="description">
                        Cras nunc sapien, condimentum id tincidunt non, suscipit id sapien. Nullam molestie metus ac
                        quam interdum gravida. Sed vitae nisi vitae nisi scelerisque pulvinar sagittis sit amet arcu.
                        Donec luctus nisl felis. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="cover">
                    <img src="https://cdn.bonito.pl/zdjecia/8/e994af62620a4c94da33e7-cisza.jpg" alt="Cover">
                </div>
                <div class="content">
                    <div class="title">Sed vitae nisi vitae nisi</div>
                    <div class="author">Nullam molestie</div>
                    <div class="description">
                        Cras nunc sapien, condimentum id tincidunt non, suscipit id sapien. Nullam molestie metus ac
                        quam interdum gravida. Sed vitae nisi vitae nisi scelerisque pulvinar sagittis sit amet arcu.
                        Donec luctus nisl felis. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="cover">
                    <img src="https://cdn.bonito.pl/zdjecia/8/e994af62620a4c94da33e7-cisza.jpg" alt="Cover">
                </div>
                <div class="content">
                    <div class="title">Sed vitae nisi vitae nisi</div>
                    <div class="author">Nullam molestie</div>
                    <div class="description">
                        Cras nunc sapien, condimentum id tincidunt non, suscipit id sapien. Nullam molestie metus ac
                        quam interdum gravida. Sed vitae nisi vitae nisi scelerisque pulvinar sagittis sit amet arcu.
                        Donec luctus nisl felis. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'resources/layout/footer/footer.php';
