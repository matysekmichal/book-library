<?php

function getUrl()
{
    return $_SERVER['REQUEST_URI'];
}

function stringContains($string, $search)
{
    return strpos($string, $search) ? true : false;
}

function limit_text($text, $limit = 15)
{
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }

    return $text;
}

function prettyDateTime($date)
{
//    TODO: preettyDateTime
}

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
        10=> 'października',
        11 => 'listopada',
        12 => 'grudnia',
    ];

    $month = $monthsToString[$date[1] * 1];

    return $date[2] .' '. $month .' '. $date[0];
}