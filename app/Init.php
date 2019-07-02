<?php
/**
 * Inicjacja, która jest uruchamiana na każdej stronie
 **/

session_start();

include "Variables.php";

/**
 * Jeżeli aplikacja jest w trybie testowym, uruchom komunikaty błędów
 **/
if (App::APP_DEBUG) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

/**
 * Ładowanie podstawowych funkcjonalności
 **/
include 'Helpers.php';
include 'DatabaseConnection.php';
include 'Storage/Cookie.php';
include 'Storage/Session.php';
include 'Crypt.php';
include 'Dialogs/Taste.php';
include 'Basket.php';
include 'Auth/BasicAuth.php';
include 'ActiveUrl.php';

/**
 * Inicjowanie zmiennych
 **/
$body_class = '';
$footer_scripts = '';
$page = isset($_POST['page']) ? $_POST['page'] : 1;

$body_class .= (isset($_COOKIE[getNameCookie('basket_show')])) ? 'active-dialog' : '';