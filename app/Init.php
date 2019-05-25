<?php

session_start();

include "Variables.php";

if (App::APP_DEBUG) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

include "Helpers.php";
include 'app/DatabaseConnection.php';
include 'app/Dialogs/Taste.php';

$footer_scripts = '';