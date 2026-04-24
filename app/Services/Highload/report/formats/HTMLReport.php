<?php

namespace App\Services\Highload\report\formats;

use App\Models\Report;
use App\Models\Highload;
use App\Models\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HTMLReport extends IReportFormatStrategy
{

    const HTML_REPORTS_DIR = 'html/';

    public static function formatName(): string
    {
        return IReportFormatStrategy::HTML_NAME;
    }

    public function format(): int
    {
        return IReportFormatStrategy::HTML;
    }

    protected function makeReport(Highload $highload): void
    {
        $description = $this->makeDescription($highload);
        echo "$description\n";

        $header = $this->makeHeader($description);

        $content = $header;

        $responses = $highload
            ->responses()
            ->get();

        $responsesHtmlContent = [];
        foreach ($responses as $index => $response) {
            /** @var Response $response */
            $responseHtmlLine = "<h2>Response number: $index; HTTP-Status: $response->status; Response: "
                . htmlspecialchars(Str::limit($response->response, 50)) . "</h2>";

            $responsesHtmlContent[] = $responseHtmlLine;
        }
        $content .= implode("\n", $responsesHtmlContent);

        $highloadId = $highload->id;
        $report = $this->generateHtmlReport($highloadId, $content);
        $this->saveToDatabase($highloadId, $report);
        $this->createReportFile($highloadId, $report);
    }

    protected function makeDescription(Highload $highload): string
    {
        return "URL for requests: $highload->url; "
            . "Quantity of requests: $highload->quantity; "
            . "Request JSON: $highload->request_json";
    }

    public function makeHeader(string $header): string
    {
        return "<h1>$header</h1>\n<br>\n<br>\n";
    }

    public function generateHtmlReport(int $highloadId, string $content): string {
        return <<<HEREDOC
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <title>Report for highload $highloadId</title>
                </head>
            <body>
            $content
            </body>
            </html>
            HEREDOC;
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
        $filename = date('Y-m-d-H-i-s') . "-highload-$highloadId-report.html";

        Storage::disk('reports')->put(self::HTML_REPORTS_DIR . $filename, $report);
    }
}
