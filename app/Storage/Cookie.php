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

function flashSuccess ($value, $redirect = '')
{
    setFlashCookie('success', $value);
    if ($redirect) {
        header('Location: '. App::APP_URL . $redirect);
    } else {
        goBack();
    }
}

function flashError ($value, $redirect = '')
{
    setFlashCookie('error', $value);
    if ($redirect) {
        header('Location: '. App::APP_URL . $redirect);
    } else {
        goBack();
    }
}

function flashInfo ($value, $redirect = '')
{
    setFlashCookie('info', $value);
    if ($redirect) {
        header('Location: '. App::APP_URL . $redirect);
    } else {
        goBack();
    }
}

function flashWarning ($value, $redirect = '')
{
    setFlashCookie('warning', $value);
    if ($redirect) {
        header('Location: '. App::APP_URL . $redirect);
    } else {
        goBack();
    }
}

