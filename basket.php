<?php

include 'app/Init.php';
include 'app/Books.php';

if (isset($_GET['b'])) {
    addToBasket($_GET['b']);
}