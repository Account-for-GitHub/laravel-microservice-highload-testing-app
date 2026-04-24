<?php

namespace App\Services\Highload\report\formats;

use App\Models\Report;
use App\Models\Highload;
use App\Models\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CSVReport extends IReportFormatStrategy
{
    const CSV_REPORTS_DIR = 'csv/';

    public static function formatName(): string
    {
        return IReportFormatStrategy::CSV_NAME;
    }

    public function format(): int
    {
        return IReportFormatStrategy::CSV;
    }

    protected function makeReport(Highload $highload): void
    {
        $header = $this->makeHeader($highload);

        echo $header;

        $report = $header;

        $responses = $highload
            ->responses()
            ->get();

        foreach ($responses as $index => $response) {
            /** @var Response $response */
            $responseCsvLine = "$index;$response->status;"
                . urlencode(Str::limit($response->response, 50)) . "\n";

            $report .= $responseCsvLine;

            echo $responseCsvLine;
        }

        echo "\n";

        $this->saveToDatabase($highload->id, $report);
        $this->createReportFile($highload->id, $report);
    }

    protected function makeHeader(Highload $highload): string
    {
        return "$highload->url;$highload->quantity;$highload->request_json\n";
    }

    protected function saveToDatabase(int $highloadId, string $report): void
    {
        Report::create([
            'highload_id' => $highloadId,
            'format' => $this->format(),
            'report' => $report,
        ]);
    }

    protected function createReportFile(int $highloadId, string $report)
    {
        $filename = date('Y-m-d-H-i-s') . "-highload-$highloadId-report.csv";

        Storage::disk('reports')->put(self::CSV_REPORTS_DIR . $filename, $report);
    }
}
