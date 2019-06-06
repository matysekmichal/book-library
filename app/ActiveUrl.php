<?php

function isActive($name)
{
    $currentUri = explode('/', $_SERVER['REQUEST_URI']);
    return $currentUri[count($currentUri)-1] == $name ? 'active' : '';
}
