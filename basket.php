<?php

include 'app/Init.php';
include 'app/Books.php';
include 'app/Basket.php';

if (isset($_GET['b'])) {
    addToBasket($_GET['b']);
}