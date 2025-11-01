<div class="relative w-full" wire:click.outside="closeDropdown">
    <!-- Label -->
    @if (!empty($label))
        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>
    @endif

    <!-- Selected / Placeholder -->
    <div wire:click="toggleDropdown"
        class="border border-gray-300 rounded-lg p-2 flex flex-wrap items-center gap-2 cursor-pointer bg-white shadow-sm hover:shadow-md transition-all duration-200 focus:ring-2 focus:ring-blue-400">

        @if (count($selected) > 0)
            @foreach ($selected as $value)
                <span class="flex items-center gap-1 text-sm bg-blue-100 text-blue-700 px-2 py-1 rounded-full shadow-sm">
                    {{ $options[$value] ?? $value }}
                    <button type="button" wire:click.stop="toggle('{{ $value }}')"
                        class="flex-shrink-0 text-blue-500 hover:text-blue-800 transition-colors">×</button>
                </span>
            @endforeach
        @else
            <span class="text-gray-400 text-sm">{{ $placeholder }}</span>
        @endif

        <!-- Dropdown Arrow -->
        <span class="ml-auto text-gray-400 text-xs transition-transform duration-200"
            :class="{ 'rotate-180': {{ $open ? 'true' : 'false' }} }">{{ $open ? '▲' : '▼' }}</span>
    </div>

    <!-- Dropdown -->
    @if ($open)
        <div
            class="absolute z-50 mt-1 w-full bg-white border border-gray-200 rounded-lg shadow-lg max-h-64 overflow-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            @foreach ($options as $value => $labelOption)
                <label
                    class="flex items-center justify-between p-2 cursor-pointer rounded-md hover:bg-blue-50 transition-colors duration-150">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500 accent-blue-500"
                            wire:click="toggle('{{ $value }}')" @if (in_array($value, $selected)) checked @endif>
                        <span class="text-sm text-gray-700">{{ $labelOption }}</span>
                    </div>
                </label>
            @endforeach
        </div>
    @endif

    <!-- Clear All Button -->
    @if (count($selected) > 0)
        <button type="button" wire:click="clearAll"
            class="mt-2 text-sm text-red-500 hover:text-red-700 hover:underline transition-colors duration-150">
            Clear All
        </button>
    @endif
</div>
