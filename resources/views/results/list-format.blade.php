<x-results :highload="$highload"
           formatName="{{ __('Results List') }}"
           buttonRoute="/aggregate-results/{{ $highload->id }}"
           buttonText="{{ __('Show Aggregate Results') }}">

    <div class="pb-3 text-2xl font-bold">{{ __('Responses') }}</div>
    @foreach($responses as $index => $response)
    <div class="flex items-center justify-between text-gray-900">
        <span class="text-indigo-500">{{ $index + 1 }}</span>
        <span>{{ __('ID') }}: <span class="text-indigo-500">{{ $response->id }}</span></span>
        <span>{{ __('Status') }}: <span class="text-green-500">{{ $response->status }}</span></span>
        <span>{{ __('Data length') }}: <span class="text-indigo-500">{{ Str::length($response->response) }}</span></span>
    </div>
    @endforeach
</x-results>
