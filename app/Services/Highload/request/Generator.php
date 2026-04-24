<?php

namespace App\Services\Highload\request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class Generator
{
    public static function run(int $quantity, int $highloadId): void
    {
        $count = 0;
        while ($count < $quantity) {
            $status = Process::path(base_path())
                ->start("php artisan scenario:execute --highload_id=$highloadId > /dev/null 2>&1 &")->running();

            if ($status === false) {
                Log::error('Some error with shell command execution.');
            }

            ++$count;
        }
    }
}
