<?php

namespace App\Console\Commands;

use App\Services\Highload\helpers\Output;
use App\Services\Highload\report\formats\CSVReport;
use App\Services\Highload\report\formats\HTMLReport;
use App\Services\Highload\report\formats\IReportFormatStrategy;
use Illuminate\Console\Command;
use App\Services\Highload\report\Reports;

class ReportsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:generate {--format=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate reports for all unprocessed highloads in selected format';

    /**
     * Execute the console command.
     */
    public function handle(Reports $reports)
    {
        $reportsFormatName = $this->option('format') ?? IReportFormatStrategy::CSV_NAME;

        $formatObject = match ($reportsFormatName) {
            IReportFormatStrategy::HTML_NAME => new HTMLReport(),
            default => new CSVReport(),
        };

        $reports->generate($formatObject);

        $this->info(Output::getString());
    }
}
