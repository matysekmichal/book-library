<?php

function getNameCookie($name)
{
    return str_replace(['%', '='], '', baseEncrypt($name));
}

function setHoursCookie($name, $value, $hours = 60)
{
    setcookie(getNameCookie($name), $value,time() + (60 * $hours), '/');
}

function setFlashCookie($name, $value, $seconds = 10)
{
    setcookie(getNameCookie($name), $value,time() + $seconds, '/');
}

function setPermanentCookie($name, $value)
{
    setcookie(getNameCookie($name), $value,0, '/');
}

function unsetCookie($string)
{
    unset($_COOKIE[getNameCookie($string)]);
    setcookie(getNameCookie($string), null, -1, '/');
}

function flashSuccess ($value)
{
    setFlashCookie('success', $value);
    goBack();
}

function flashError ($value)
{
    setFlashCookie('error', $value);
    goBack();
}

function flashInfo ($value)
{
    setFlashCookie('info', $value);
    goBack();
}

function flashWarning ($value)
{
    setFlashCookie('warning', $value);
    goBack();
}

