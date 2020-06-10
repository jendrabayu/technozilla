<?php


function getUserId($user)
{
    if (App\Core\Session::get("is_$user")) {
        return  \App\Core\Session::get("is_$user")['id'];
    }
    return false;
}
