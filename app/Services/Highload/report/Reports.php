<?php

namespace App\Services\Highload\report;

use App\Services\Highload\report\formats\IReportFormatStrategy;

class Reports
{
    public function generate(IReportFormatStrategy $format): void
    {
        $format->generate();
    }
}
