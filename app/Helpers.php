<?php

function getUrl()
{
    return $_SERVER['REQUEST_URI'];
}

function stringContains($string, $search)
{
    return strpos($string, $search) ? true : false;
}

function setHoursCookie($name, $value, $hours = 60)
{
    setcookie($name, $value,time() + (60 * $hours), '/');
}

function setFlashCookie($name, $value, $seconds = 15)
{
    setcookie($name,$value,time() + $seconds, '/');
}

function setPermanentCookie($name, $value)
{
    setcookie($name, $value,0, '/');
}

function unsetCookie($string)
{
    unset($_COOKIE[$string]);
    setcookie($string, null, -1, '/');
}

function flashSuccess ($value)
{
    setFlashCookie('success', $value);
}

function flashError ($value)
{
    setFlashCookie('error', $value);
}

function flashInfo ($value)
{
    setFlashCookie('info', $value);
}

function flashWarning ($value)
{
    setFlashCookie('warning', $value);
}