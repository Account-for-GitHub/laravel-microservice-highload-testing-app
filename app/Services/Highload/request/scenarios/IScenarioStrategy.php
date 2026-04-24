<?php

namespace App\Services\Highload\request\scenarios;

use App\Services\Highload\dto\ResponseDTO;

interface IScenarioStrategy
{
    function execute(int $highloadId): ResponseDTO|false;
}
