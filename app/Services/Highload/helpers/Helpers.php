<?php

namespace App\Services\Highload\helpers;

class Helpers
{
    public static function setVariousTabSession(string $name, string $route, string $href): void
    {
        session()->put('various-tab', [
            'name' => $name,
            'route' => $route,
            'href' => $href,
        ]);
    }
}
