<?php

namespace App\Helpers;

use App\Helpers\Session;

class Flash
{
    public static function setFlash($message, $type = null)
    {
        Session::set([
            'flash_data' => [
                'message' => $message,
                'type' => $type == null ? $type = 'primary' : $type
            ]
        ]);
    }

    public static function getFlash()
    {
        $flash = Session::get('flash_data');
        if (!empty($flash)) {
            echo sprintf(
                '<div class="alert alert-%s alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                       %s
                      </div>
                </div>',
                $flash['type'],
                $flash['message']
            );

            Session::remove('flash_data');
        }
    }
}
