<?php
/**
 * Zarządzanie tworzonymi cisteczkami
 **/

/**
 * Pobranie zaszyfrowanej nazwy ciasteczka
 *
 * @param $name
 * @return mixed
 */
function getNameCookie($name)
{
    return str_replace(['%', '='], '', baseEncrypt($name));
}

/**
 * Ustawienie ciasteczka (godziny)
 *
 * @param $name
 * @param $value
 * @param int $hours
 */
function setHoursCookie($name, $value, $hours = 60)
{
    setcookie(getNameCookie($name), $value, time() + (60 * $hours), '/');
}

/**
 * Ustawienie ciasteczka (sekundy)
 *
 * @param $name
 * @param $value
 * @param int $seconds
 */
function setFlashCookie($name, $value, $seconds = 10)
{
    setcookie(getNameCookie($name), $value, time() + $seconds, '/');
}

/**
 * Ustawienie ciasteczka na zawsze
 *
 * @param $name
 * @param $value
 */
function setPermanentCookie($name, $value)
{
    setcookie(getNameCookie($name), $value, 0, '/');
}

/**
 * Usuwanie ciasteczka
 **/
function unsetCookie($string)
{
    unset($_COOKIE[getNameCookie($string)]);
    setcookie(getNameCookie($string), null, -1, '/');
}

/**
 * Poniżej znajdują się funkcje odpowiedzialne za ustawianie krótkich sesji z komunikatami,
 * które po wyświetleniu, są natychmiastowo usuwane w celu pojedynczego wyświetlenia.
 *
 * @param $value
 * @param string $redirect
 */
function flashSuccess($value, $redirect = '')
{
    setFlashCookie('success', $value);
    if ($redirect) {
        header('Location: ' . App::APP_URL . $redirect);
        die();
    } else {
        goBack();
    }
}

function flashError($value, $redirect = '')
{
    setFlashCookie('error', $value);
    if ($redirect) {
        header('Location: ' . App::APP_URL . $redirect);
        die();
    } else {
        goBack();
    }
}

function flashInfo($value, $redirect = '')
{
    setFlashCookie('info', $value);
    if ($redirect) {
        header('Location: ' . App::APP_URL . $redirect);
        die();
    } else {
        goBack();
    }
}

function flashWarning($value, $redirect = '')
{
    setFlashCookie('warning', $value);
    if ($redirect) {
        header('Location: ' . App::APP_URL . $redirect);
        die();
    } else {
        goBack();
    }
}

