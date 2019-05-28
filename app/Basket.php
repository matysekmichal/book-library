<?php

function addToBasket($item)
{
    $basket = getItemsInBasket();
    $item = baseEncrypt($item);

    foreach ($basket as $book) {
        if ($book == $item) {
            flashInfo('Posiadasz już tą książkę w swoim koszyku.');
            die();
        }
    }
    $booksInBasket = array_merge($basket, [$item]);

    setPermanentCookie('basket', json_encode($booksInBasket));
    setFlashCookie('basket_show', '1');
}

function removeFromBasket($item)
{
    $basket = getItemsInBasket();

    $item = baseDecrypt($item);
    array_splice($basket, (int) $item, 1);

    setPermanentCookie('basket', json_encode($basket));
}

function getItemsInBasket()
{
    if (!isset($_COOKIE[getNameCookie('basket')])) {
        return [];
    }

    return json_decode($_COOKIE[getNameCookie('basket')]);
}

function itemsInBasket()
{
    return count(getItemsInBasket());
}