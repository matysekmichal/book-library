<?php

function baseEncrypt($string)
{
    return base64_encode($string . App::APP_KEY);
}

function baseDecrypt($string)
{
    return base64_decode($string . App::APP_KEY);
}