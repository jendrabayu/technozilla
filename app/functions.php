<?php


function url($url = null)
{
    $link = 'http://' . $_SERVER['HTTP_HOST'] .
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', INC_ROOT) . '/public'
        );

    if (explode('/', $url)[0] == 'images') {
        return $link . '/' . $url;
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