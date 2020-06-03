<?php

session_start();

use App\Core\App as App;

require __DIR__ . '/../vendor/autoload.php';

require_once 'config.php';

define('INC_ROOT', dirname(__DIR__));

function url($url = null)
{
    $link = 'http://' . $_SERVER['HTTP_HOST'] .
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', INC_ROOT) . '/public'
        );
    return $link . '/' . $url;
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


function str_limit($str, $limit)
{
    if (strlen($str) > $limit) {
        $data = substr($str, 0, $limit) . '...';
    }
    return $data;
}

function textToSlug($text)
{
    $text = trim($text);
    if (empty($text)) return '';
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
    return $text;
}

$app = new App();
