<?php

namespace App\Http\Controllers;

use App\Models\Highload;
use App\Services\Highload\helpers\Helpers;

class ResultsController extends Controller
{
    public function list(int $highloadId)
    {
        Helpers::setVariousTabSession(
            'Results List',
            'results-list',
            "/results-list/$highloadId"
        );

        $highload = Highload::with('responses')
            ->where('id', $highloadId)
            ->first();

        $responses = $highload->responses;

        return view('results.list-format', compact('highload', 'responses'));
    }

    public function aggregate(int $highloadId)
    {
        Helpers::setVariousTabSession(
            'Aggregate Results',
            'aggregate-results',
            "/aggregate-results/$highloadId"
        );

        $highload = Highload::with('responses')
            ->where('id', $highloadId)
            ->first();

        $total = $highload->responses()->count();

        $responses = $highload
            ->responses()
            ->selectRaw('status, count(*) as responses_count')
            ->groupBy('status')
            ->get();

        return view('results.aggregate-format', compact('highload', 'responses', 'total'));
    }
}
