<?php

session_start();

if (DEBUG_MODE) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

include 'app/DatabaseConnection.php';

$footer_scripts = '';