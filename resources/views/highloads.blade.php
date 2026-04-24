<x-app-layout>
    <x-slot name="title">
        {{ __('Highloads') }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Highloads') }}
            </h2>

            <span class="space-x-6">
                <a href="/generate-csv"
                   class="bg-blue-600 text-white font-semibold py-2 px-10 rounded-md hover:bg-blue-700
                   transition duration-300 shadow-lg cursor-pointer">
                    {{ __('Generate CSV reports') }}
                </a>

                <a href="/generate-html"
                   class="bg-blue-600 text-white font-semibold py-2 px-10 rounded-md hover:bg-blue-700
                   transition duration-300 shadow-lg cursor-pointer">
                    {{ __('Generate HTML reports') }}
                </a>
            </span>
        </div>
    </x-slot>

    <div class="space-y-6">
    @forelse($highloads as $index => $highload)
        <a href="/results-list/{{ $highload->id }}"
           class="block overflow-hidden p-6 bg-white border border-slate-200
           rounded-xl shadow-sm hover:shadow-md transition-shadow">
            <p>{{ __('URL') }}: <span class="text-indigo-500">{{ $highload->url }}</span></p>
            <p>{{ __('Quantity of requests') }}: <span class="text-indigo-500">{{ $highload->quantity }}</span></p>
            <p>{{ __('Request JSON') }}: <span class="text-indigo-500">{{ $highload->request_json }}</span></p>
        </a>
    @empty
        <div class="block overflow-hidden p-6 bg-white border border-slate-200
            rounded-xl shadow-sm hover:shadow-md transition-shadow">
            {{ __('No highloads here yet, go to dashboard and perform one!') }}
        </div>
    @endforelse
    </div>
</x-app-layout>
