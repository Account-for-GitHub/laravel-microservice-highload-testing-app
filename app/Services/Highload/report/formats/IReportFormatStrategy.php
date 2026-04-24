<?php

namespace App\Services\Highload\report\formats;

use App\Models\Highload;

abstract class IReportFormatStrategy
{
    public const CSV = 1;
    public const CSV_NAME = 'csv';
    public const HTML = 2;
    public const HTML_NAME = 'html';

    abstract public static function formatName(): string;

    abstract public function format(): int;

    abstract protected function makeReport(Highload $highload): void;

    public function generate(): void
    {
        $unprocessedHighloads = Highload::whereDoesntHave('reports', function ($query) {
            $query->where('format', $this->format());
        })->get();

        if($unprocessedHighloads->isEmpty()) {
            echo "All reports generated\n";
        }

        foreach ($unprocessedHighloads as $highload) {
            $this->makeReport($highload);
        }
    }
}
