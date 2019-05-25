<?php

function getUrl()
{
    return $_SERVER['REQUEST_URI'];
}

function stringContains($string, $search)
{
    return strpos($string, $search) ? true : false;
}