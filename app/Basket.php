<?php
/**
 * Funkcjonalność zarządzania koszykiem
 **/

/**
 * Dodanie poblikacji do koszyka
 *
 * @param $dbh
 * @param $item
 */
function addToBasket($dbh, $item)
{
    $basket = getItemsInBasket();

    foreach ($basket as $book) {
        if ($book->slug == $item) {
            flashInfo('Posiadasz już tą książkę w swoim koszyku.');
            die();
        }
    }

    $query = 'SELECT b_id FROM books b WHERE b_slug = :slug';
    $result = $dbh->prepare($query);
    $result->bindValue(':slug', $item, PDO::PARAM_STR);
    $result->execute();

    $booksInBasket = array_merge($basket, [[
        'id' => $result->fetch()['b_id'],
        'slug' => $item,
    ]]);

    $booksInBasket = baseEncrypt(json_encode($booksInBasket));

    setPermanentCookie('basket', $booksInBasket);
    setFlashCookie('basket_show', '1');
}

/**
 * Usunięcie publikacji z koszyka
 *
 * @param $item
 */
function removeFromBasket($item)
{
    $basket = getItemsInBasket();

    $item = baseDecrypt($item);
    array_splice($basket, (int)$item, 1);

    setPermanentCookie('basket', baseEncrypt(json_encode(($basket))));
}

/**
 * Wzięcie listy poblikacji z koszyka
 **/
function getItemsInBasket()
{
    if (!isset($_COOKIE[getNameCookie('basket')])) {
        return [];
    }

    return json_decode(baseDecrypt($_COOKIE[getNameCookie('basket')]));
}

/**
 * Pobranie liczby poblikacji z koszyka
 **/
function getNumberItemsInBasket()
{
    return count(getItemsInBasket());
}