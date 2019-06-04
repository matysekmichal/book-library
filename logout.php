<?php

include 'app/Init.php';

unset($_SESSION["auth"]);
unset($_SESSION["auth_stuff"]);
flashInfo('Wylogowano pomyślnie');