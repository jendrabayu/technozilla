<?php


function url($url)
{
    $link = 'http://' . $_SERVER['HTTP_HOST'] .
        str_replace(
            $_SERVER['DOCUMENT_ROOT'],
            '',
            str_replace('\\', '/', INC_ROOT)
        );

    $images = explode('/', $url);
    if ($images[0] == 'images') {
        return $link . '/public/' . $url;
    }
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
