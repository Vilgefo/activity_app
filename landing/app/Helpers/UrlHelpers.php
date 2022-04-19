<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

class UrlHelpers
{
    public static function uriWithoutGet(): string
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];

        return $url;
    }
}
