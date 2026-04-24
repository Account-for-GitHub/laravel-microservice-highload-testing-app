<x-results :highload="$highload"
           formatName="{{ __('Aggregate Results') }}"
           buttonRoute="/results-list/{{ $highload->id }}"
           buttonText="{{ __('Show Results List') }}">

    <div class="pb-3 text-2xl font-bold">Responses</div>

    <div class="text-lg">Total number of responses: {{ $total }}</div>

    <!-- Line with text -->
    <div class="relative flex pt-6 items-center">
        <div class="flex-grow border-t border-slate-200"></div>
        <span class="flex-shrink mx-4 text-slate-400 text-xs font-semibold uppercase tracking-widest"
            >Responses grouped by HTTP status</span>
        <div class="flex-grow border-t border-slate-200"></div>
    </div>

    <!-- Grouped results -->
    @foreach($responses as $response)
    <div class="p-6 mt-6 bg-white border border-slate-200 rounded-xl shadow-sm transition-shadow">
        <div>HTTP status: <span class="text-indigo-500">{{ $response->status }}</span></div>
        <div>Number of responses in group: <span class="text-green-500">{{ $response->responses_count }}</span></div>
    </div>
    @endforeach
</x-results>
