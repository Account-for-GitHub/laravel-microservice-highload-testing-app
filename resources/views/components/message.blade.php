<div x-data="{ show: true }"
     x-init="setTimeout(() => show = false, 1000)"
     x-show="show"
     x-transition:leave="transition ease-in duration-500"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 flex items-center justify-center z-50 pointer-events-none bg-white/[70%]">

    <div class="flex items-center gap-3 bg-white backdrop-blur-md px-6 py-4 rounded-xl
        shadow-2xl overflow-hidden">

        <!-- Success Icon -->
        <div class="mx-auto flex items-center justify-center w-10 h-10 bg-green-200 rounded-full">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <!-- Message -->
        <div>
            <p class="font-medium">{{ $message }}</p>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 w-0 h-1 bg-blue-600 transition-all duration-[1000ms] ease-linear"
             x-init="$nextTick(() => { $el.style.width = '100%' })">
        </div>
    </div>
</div>
