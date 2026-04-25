<?php

namespace App\Services\Highload\report\formats;

use App\Models\Highload;
use App\Services\Highload\helpers\Output;

abstract class IReportFormatStrategy
{
    public const CSV = 1;
    public const CSV_NAME = 'csv';
    public const HTML = 2;
    public const HTML_NAME = 'html';

    abstract public function formatName(): string;

    abstract public function format(): int;

    abstract protected function makeReport(Highload $highload): void;

    public function generate(): bool
    {
        $unprocessedHighloads = Highload::whereDoesntHave('reports', function ($query) {
            $query->where('format', $this->format());
        });

        if($unprocessedHighloads->count() === 0) {
            Output::addString("All {$this->formatName()} report files already generated!\n");
            return false;
        }

        foreach ($unprocessedHighloads->get() as $highload) {
            $this->makeReport($highload);
        }

        return true;
    }
}
