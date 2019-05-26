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