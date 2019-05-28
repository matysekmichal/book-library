<?php

function baseEncrypt($string)
{
    return urlencode(base64_encode(pattern($string)));
}

function baseDecrypt($string)
{
    $value = explode("&&&", urldecode(base64_decode(pattern($string))));

    return $value[0];
}

function pattern($string)
{
    return $string .'&&&'. App::APP_KEY;
}