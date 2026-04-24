<?php

namespace App\Services\Highload\request\senders;

use App\Models\Highload;

interface ISender
{
    public static function send(Highload $request);
}
