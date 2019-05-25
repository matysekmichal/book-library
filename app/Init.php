<?php

session_start();

include "Variables.php";

if (App::APP_DEBUG) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

include "Helpers.php";
include 'Crypt.php';
include 'DatabaseConnection.php';
include 'Dialogs/Taste.php';

$footer_scripts = '';