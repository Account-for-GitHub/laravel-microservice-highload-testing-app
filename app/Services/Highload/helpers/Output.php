<?php

namespace App\Services\Highload\helpers;

class Output
{
    protected static $output = null;

    public static function addString(string $string): void
    {
        self::$output .= $string;
    }

    public static function getString(): string|null
    {
        return self::$output;
    }
}
