<?php

session_start();

include "Variables.php";

if (App::APP_DEBUG) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

include 'Helpers.php';
include 'DatabaseConnection.php';
include 'Storage/Cookie.php';
include 'Storage/Session.php';
include 'Crypt.php';
include 'Dialogs/Taste.php';
include 'Basket.php';
include 'Auth/BasicAuth.php';
include 'ActiveUrl.php';

$body_class = '';
$footer_scripts = '';

$body_class .= (isset($_COOKIE[getNameCookie('basket_show')])) ? 'active-dialog' : '';