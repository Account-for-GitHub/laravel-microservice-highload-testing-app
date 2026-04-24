<x-app-layout>
    <x-slot name="title">
        {{ $title ?? __('Highload testing results') }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $formatName }}
            </h2>
            <a href="{{ $buttonRoute }}"
               class="bg-blue-600 text-white font-semibold py-2 px-10 rounded-md hover:bg-blue-700
                transition duration-300 shadow-lg cursor-pointer">
                {{ $buttonText }}
            </a>
        </div>
    </x-slot>

    <!-- Highload info -->
    <div class="pb-8">
        <div class="pb-3 text-2xl font-bold">Highload info</div>
        <div>
            <p>URL: <a href="{{ $highload->url }}" class="text-indigo-500">{{ $highload->url }}</a></p>
            <p>Quantity of requests: <span class="text-indigo-500">{{ $highload->quantity }}</span></p>
            <p>Request JSON: <span class="text-indigo-500">{{ $highload->request_json }}</span></p>
        </div>
    </div>

    <!-- Responses info -->
    <div>
        {{ $slot }}
    </div>
</x-app-layout>
