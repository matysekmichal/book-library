<?php

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

function flashSuccess ($value, $redirect = '')
{
    setFlashCookie('success', $value);
    header('Location: '. App::APP_URL . $redirect);
}

function flashError ($value, $redirect = '')
{
    setFlashCookie('error', $value);
    header('Location: '. App::APP_URL . $redirect);
}

function flashInfo ($value, $redirect = '')
{
    setFlashCookie('info', $value);
    header('Location: '. App::APP_URL . $redirect);
}

function flashWarning ($value, $redirect = '')
{
    setFlashCookie('warning', $value);
    header('Location: '. App::APP_URL . $redirect);
}

