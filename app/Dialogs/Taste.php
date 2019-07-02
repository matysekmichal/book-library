<?php
/**
 * Wyświetlenie krótkich komunikatów o statusie operacji
 *
 * @aviliable: sukces, błąd, informacja, ostrzeżenie
 **/

$taste = '';

if (isset($_COOKIE[getNameCookie('success')])) {
    $taste = '
    <div id="taste" class="taste success">
        <i class="material-icons">done</i>
        <span>' . $_COOKIE[getNameCookie('success')] . '</span>
    </div>';

    unsetCookie('success');
}

if (isset($_COOKIE[getNameCookie('error')])) {
    $taste = '
    <div id="taste" class="taste danger">
        <i class="material-icons">error</i>
        <span>' . $_COOKIE[getNameCookie('error')] . '</span>
    </div>';

    unsetCookie('error');
}

if (isset($_COOKIE[getNameCookie('info')])) {
    $taste = '
    <div id="taste" class="taste info">
        <i class="material-icons">info</i>
        <span>' . $_COOKIE[getNameCookie('info')] . '</span>
    </div>';

    unsetCookie('info');
}

if (isset($_COOKIE[getNameCookie('warning')])) {
    $taste = '
    <div id="taste" class="taste warning">
        <i class="material-icons">warning</i>
        <span>' . $_COOKIE[getNameCookie('warning')] . '</span>
    </div>';

    unsetCookie('warning');
}