<?php

namespace Tests\Unit\report\formats;

use App\Services\Highload\report\formats\CSVReport;
use App\Services\Highload\report\formats\IReportFormatStrategy;
use PHPUnit\Framework\TestCase;

class CSVReportTest extends TestCase
{

    public function testFormat()
    {
        $reportObject = new CSVReport();

        $this->assertEquals(IReportFormatStrategy::CSV, $reportObject->format());
    }

    public function testFormatName()
    {
        $this->assertEquals(IReportFormatStrategy::CSV_NAME, CSVReport::formatName());
    }
}
