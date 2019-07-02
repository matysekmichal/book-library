<?php
/**
 * Funkcje pomocnicze
 **/

/**
 * Pobranie adresu aplikacji
 **/
function getUrl()
{
    return $_SERVER['REQUEST_URI'];
}

/**
 * Sprawdzenie czy podany @string zawiera sie w szukanym tekście
 *
 * @param $string
 * @param $search
 * @return bool
 */
function stringContains($string, $search)
{
    return strpos($string, $search) ? true : false;
}

/**
 * Skracanie tekstu
 * @param $text
 * @param int $limit
 * @return string
 */
function limit_text($text, $limit = 15)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }

    return $text;
}

/**
 * Formatowanie daty i czasu przyjaznej dla człowieka
 *
 * @param $date
 * @return string
 */
function prettyDateTime($date)
{
    $dateTimeArr = explode(' ', $date);

    return prettyDate($dateTimeArr[0]) . ' ' . prettyTime($dateTimeArr[1]);
}

/**
 * Formatowanie daty przyjaznej dla człowieka
 *
 * @param $date
 * @return string
 */
function prettyDate($date)
{
    $date = date('Y-m-d', strtotime($date));
    $date = explode('-', $date);

    $monthsToString = [
        1 => 'stycznia',
        2 => 'lutego',
        3 => 'marca',
        4 => 'kwietnia',
        5 => 'maja',
        6 => 'czerwca',
        7 => 'lipieca',
        8 => 'sierpnia',
        9 => 'września',
        10 => 'października',
        11 => 'listopada',
        12 => 'grudnia',
    ];

    $month = $monthsToString[$date[1] * 1];

    return $date[2] . ' ' . $month . ' ' . $date[0];
}

/**
 * Formatowanie czasu przyjaznej dla człowieka
 *
 * @param $time
 * @return string
 */
function prettyTime($time)
{
    $time = date('H:i', strtotime($time));
    $time = explode(':', $time);

    return $time[0] . ':' . $time[1];
}

/**
 * Powrót do poprzedniej strony
 */
function goBack()
{
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . App::APP_URL);
    }

    die();
}