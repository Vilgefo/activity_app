<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

class DateHelpers
{
    public static function getUserTz(): string
    {
        return $_COOKIE['tz'] ?? 'Europe/Moscow';
    }

    public static function getUserDate(string $datetime = 'now', string $format = 'c'): string
    {
        $tz = self::getUserTz();
        $date = new DateTime($datetime, new DateTimeZone($tz));
        return $date->format($format);
    }
}
