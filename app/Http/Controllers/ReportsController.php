<?php

namespace App\Http\Controllers;

use App\Services\Highload\report\formats\CSVReport;
use App\Services\Highload\report\formats\HTMLReport;
use App\Services\Highload\report\Reports;

class ReportsController extends Controller
{

    public function csv(Reports $reports, CSVReport $format)
    {
        $status = $reports->generate($format);

        if($status === false) {
            return redirect('/highloads')->with('success', 'All CSV reports already generated!');
        }

        return redirect('/highloads')->with('success', 'CSV reports successfully generated!');
    }

    public function html(Reports $reports, HTMLReport $format)
    {
        $status = $reports->generate($format);

        if($status === false) {
            return redirect('/highloads')->with('success', 'All HTML reports already generated!');
        }

        return redirect('/highloads')->with('success', 'HTML reports successfully generated!');
    }
}
