<?php

namespace App\Jobs;

use App\Services\Highload\request\Generator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateRequests implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $quantity, public int $highloadId)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Generator::run($this->quantity, $this->highloadId);
    }
}
