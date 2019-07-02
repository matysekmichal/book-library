<?php
/**
 * Funkcjonalność szyfrowania
 **/

/**
 * Szyfrowanie z użyciem klucza aplikacj
 *
 * @param $string
 * @return string
 */
function baseEncrypt($string)
{
    return urlencode(base64_encode(pattern($string)));
}

/**
 * Odszyfrowywanie danych
 *
 * @param $string
 * @return
 */
function baseDecrypt($string)
{
    $value = explode("&&&", urldecode(base64_decode(pattern($string))));

    return $value[0];
}

/**
 * Szyfrowanie podanego @string
 *
 * @param $string
 * @return string
 */
function pattern($string)
{
    return $string . '&&&' . App::APP_KEY;
}