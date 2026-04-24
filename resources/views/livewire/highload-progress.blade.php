<div class="p-6 text-gray-900">
    <div class="flex items-center justify-center min-h-[30vh] bg-white p-10">

        <div @if($current < $total) wire:poll.1s
             @else x-init="setTimeout(() => { $wire.redirectToResults() }, 1000)"
             @endif
            class="w-full max-w-2xl">

            @php
                $percent = $current / $total * 100;
            @endphp

            <!-- Header Section -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Highload testing in progress</h2>
                <div class="bg-indigo-600 text-white px-4 py-1 rounded-full text-xl font-mono font-bold shadow-lg shadow-indigo-200">
                    {{ $percent }}%
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="h-10 w-full bg-slate-100 rounded-2xl shadow-inner border border-slate-200 overflow-hidden p-1.5">

                <!-- Progress Fill -->
                <div class="h-full rounded-xl bg-linear-to-r from-indigo-500 via-indigo-600 to-indigo-700 transition-all duration-1000 ease-out relative shadow-[0_4px_15px_rgba(79,70,229,0.3)]"
                     style="width: {{ $percent }}%;">
                    <!-- Large Shine Overlay -->
                    <div class="absolute inset-0 bg-linear-to-b from-white/20 to-transparent"></div>

                    <!-- Animated Texture -->
                    <div class="absolute inset-0 opacity-15 bg-[linear-gradient(45deg,rgba(255,255,255,0.4)_25%,transparent_25%,transparent_50%,rgba(255,255,255,0.4)_50%,rgba(255,255,255,0.4)_75%,transparent_75%,transparent)] bg-[length:40px_40px] animate-[move-stripes_1.5s_linear_infinite]">
                    </div>
                </div>
            </div>

            <!-- Footnote -->
            <div class="mt-6 flex items-center justify-between text-slate-400 font-medium text-sm">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin text-indigo-500" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Please wait, do not refresh
                </span>
                <span>Requests {{ $current }} of {{ $total }}</span>
            </div>
        </div>
    </div>
</div>
