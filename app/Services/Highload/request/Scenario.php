<?php

namespace App\Services\Highload\request;

use App\Models\Response;
use App\Services\Highload\request\scenarios\IScenarioStrategy;
use App\Services\Highload\request\scenarios\SimpleScenario;
use Exception;

class Scenario
{
    function __construct(
        protected int               $highloadId,
        protected IScenarioStrategy $scenario = new SimpleScenario(),
    )
    {
    }

    /**
     * @throws Exception
     */
    public function execute(): void
    {
        $response = $this->scenario->execute($this->highloadId);

        Response::create([
            'highload_id' => $this->highloadId,
            'status' => $response->status,
            'response' => $response->response,
        ]);
    }
}
