<?php

session_start();

include "Variables.php";
include "Helpers.php";

if (App::DEBUG_MODE) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

include 'app/DatabaseConnection.php';

$footer_scripts = '';