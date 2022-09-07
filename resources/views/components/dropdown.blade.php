<div class="relative w-full px-2 py-3 text-gray-700 font-semibold hover:bg-blue-600 hover:text-white
    rounded-md dark:bg-gray-800 dark:text-gray-100" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute py-3 rounded-md w-full"
        style="display: none;"
        @click="open = false">
        <div class="rounded-md ring-black ring-opacity-5 w-full">
            {{ $content }}
        </div>
    </div>
</div>
