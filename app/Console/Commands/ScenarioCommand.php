<?php

namespace App\Console\Commands;

use App\Services\Highload\request\Scenario;
use Exception;
use Illuminate\Console\Command;

class ScenarioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scenario:execute {--highload_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute selected highload testing request scenario';

    /**
     * Execute the console command.
     * @throws Exception
     */
    public function handle()
    {
        $highloadId = $this->option('highload_id');

        if($highloadId === null){
            throw new Exception('--highload_id option is required');
        }

        (new Scenario(highloadId: $highloadId))->execute();
    }
}
