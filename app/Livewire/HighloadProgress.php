<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Highload;

#[Layout('layouts.livewire')]
class HighloadProgress extends Component
{
    public function render()
    {
        $highload = Highload::with('responses')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        $total = $highload->quantity;
        $current = $highload->responses()->count();

        return view('livewire.highload-progress', [
            'total' => $total,
            'current' => $current,
        ]);
    }

    public function redirectToResults()
    {
        $highload = Highload::where('user_id', auth()->id())
            ->latest()
            ->first();

        session()->flash('success', 'Highload testing is done!');

        $this->redirectRoute('results-list', ['highloadId' => $highload->id]);
    }
}
