<?php

function addToBasket($item)
{
    if ($basket = getItemsInBasket()) {
        $booksInBasket = array_merge($basket, [baseEncrypt($item)]);
    } else {
        $booksInBasket = [baseEncrypt($item)];
    }

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