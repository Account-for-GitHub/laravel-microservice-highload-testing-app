<?php

namespace App\Services\Highload\request\scenarios;

use App\Models\Highload;
use App\Services\Highload\dto\ResponseDTO;
use App\Services\Highload\request\senders\HttpSender;
use Exception;
use NoDiscard;

class SimpleScenario implements IScenarioStrategy
{
    /**
     * @throws Exception
     */
    #[NoDiscard]
    function execute(int $highloadId): ResponseDTO|false
    {
        $highload = Highload::find($highloadId);

        if(is_null($highload)) {
            throw new Exception("Highload with ID $highloadId not found");
        }

        return HttpSender::send($highload);
    }
}
