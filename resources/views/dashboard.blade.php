<x-app-layout>
    <x-slot name="title">{{ __('Highload-testing app') }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Select highload testing settings') }}
        </h2>
    </x-slot>


    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">{{ __('Highload testing') }}</h2>

    <form action="/highload" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="url" class="block text-sm font-medium text-gray-700">{{ __('Service URL') }}</label>
            <input type="url" name="url" id="url" value="http://localhost" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500
                   focus:border-blue-500 outline-none transition @error('url') border-red-500 @enderror">
            @error('url')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700"
            >{{ __('Quantity of testing requests') }}</label>
            <input type="number" name="quantity" id="quantity" value="10" required
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500
                   focus:border-blue-500 outline-none transition @error('quantity') border-red-500 @enderror">
            @error('quantity')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="request" class="block text-sm font-medium text-gray-700">{{ __('Request JSON') }}</label>
            <textarea name="request" id="request" rows="4" required
                      class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500
                      focus:border-blue-500 outline-none transition @error('request') border-red-500 @enderror"
            >{}</textarea>
            @error('request')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 rounded-md hover:bg-blue-700
                transition duration-300 shadow-lg cursor-pointer">
            {{ __('Start Highload Testing') }}
        </button>
    </form>

</x-app-layout>
