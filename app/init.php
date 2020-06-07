<?php

session_start();

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';

require_once 'helpers/Auth.php';
require_once 'core/DB.php';
require_once 'helpers/Flash.php';
require_once 'helpers/Image.php';
require_once 'helpers/Redirect.php';
require_once 'helpers/Session.php';

require_once 'models/Keranjang.php';
require_once 'models/Order.php';
require_once 'models/Produk.php';


require_once 'config.php';

define('INC_ROOT', dirname(__DIR__));


function url($url = null)
{
    $link = 'http://' . $_SERVER['HTTP_HOST'] .
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', INC_ROOT)
        );

    if (explode('/', $url)[0] == 'images') {
        return $link . '/public/' . $url;
        die;
    }

    if ($url == '') {
        return $link . '/index.php';
        die;
    }
    return $link . '/index.php?page=' . $url;
}


function asset($url)
{
    $link = 'http://' . $_SERVER['HTTP_HOST'] .
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', INC_ROOT) . '/public/assets'
        );
    return $link . '/' . $url;
}


function stringLimit($str, $limit)
{
    if (strlen($str) > $limit) {
        $data = substr($str, 0, $limit) . '...';
        return $data;
    }

    return $str;
}

function textToSlug($text)
{
    $text = trim($text);
    if (empty($text)) return '';
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = preg_replace('/\-{2,}/', '-', $text);
    return $text;
}

function rupiahFormat($money)
{
    return 'Rp. ' . number_format($money, 0, ".", ",");
}
