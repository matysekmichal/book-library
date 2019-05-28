<?php

function addToBasket($item)
{
    $cookieName = getNameCookie('basket');

    if (isset($_COOKIE[$cookieName])) {
        $currentBasket = json_decode($_COOKIE[$cookieName]);
        $booksInBasket = array_merge($currentBasket, [baseEncrypt($item)]);
    } else {
        $booksInBasket = [baseEncrypt($item)];
    }

    setPermanentCookie('basket', json_encode($booksInBasket));
    setFlashCookie('basket_show', '1');

    echo goBack();
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

function goBack()
{
    return '<script>
            window.history.back();
        </script>';
}