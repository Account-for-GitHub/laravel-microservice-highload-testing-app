<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateRequests;
use App\Models\Highload;
use Illuminate\Http\Request;

class HighloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'url' => 'required|url|max:20|min:5',
                'quantity' => 'required|int|min:1|max:100',
                'request' => 'required|json|min:2',
            ],
            [
                'url.required' => 'This field is required!',
                'url.max' => 'Too much characters!',
                'quantity.min' => 'The quantity of testing requests should not be less than 1',
                'quantity.max' => 'The quantity of testing requests should not be greater than 100',
            ],
        );

        $quantity = $validated['quantity'];

        $highloadId = Highload::create([
            'user_id' => auth()->id(),
            'url' => $validated['url'],
            'quantity' => $quantity,
            'request_json' => $validated['request'],
        ])->id;

        GenerateRequests::dispatch($quantity, $highloadId);

        return redirect('/highload-progress');
    }

    public function list()
    {
        $highloads = Highload::where('user_id', auth()->id())
            ->get();

        return view('highloads', compact('highloads'));
    }
}
