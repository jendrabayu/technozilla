<?php


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

function currentTimeStamp()
{
    return date("Y-m-d h:i:s");
}
