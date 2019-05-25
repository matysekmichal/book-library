<?php

$taste = '';

if (isset($_COOKIE['success'])) {
    $taste = '
    <div id="taste" class="taste success">
        <i class="material-icons">done</i>
        <span>'. $_COOKIE['success'] .'</span>
    </div>';

    unsetCookie('success');
}

if (isset($_COOKIE['error'])) {
    $taste = '
    <div id="taste" class="taste danger">
        <i class="material-icons">error</i>
        <span>'. $_COOKIE['error'] .'</span>
    </div>';

    unsetCookie('error');
}

if (isset($_COOKIE['info'])) {
    $taste = '
    <div id="taste" class="taste info">
        <i class="material-icons">info</i>
        <span>'. $_COOKIE['info'] .'</span>
    </div>';

    unsetCookie('info');
}

if (isset($_COOKIE['warning'])) {
    $taste = '
    <div id="taste" class="taste warning">
        <i class="material-icons">warning</i>
        <span>'. $_COOKIE['warning'] .'</span>
    </div>';

    unsetCookie('warning');
}