<div class="relative w-full" wire:click.outside="closeDropdown">
    <!-- Label -->
    @if (!empty($label))
        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
    @endif

    <!-- Selected / Placeholder -->
    <div wire:click="toggleDropdown"
        class="border rounded-md p-2 flex flex-wrap items-center gap-1 cursor-pointer bg-white shadow-sm">
        @if (count($selected) > 0)
            @foreach ($selected as $value)
                <span class="bg-blue-500 text-white px-2 py-1 rounded flex items-center gap-1 text-sm">
                    {{ $options[$value] ?? $value }}
                    <button type="button" wire:click.stop="toggle('{{ $value }}')"
                        class="ml-1 hover:text-gray-200">×</button>
                </span>
            @endforeach
        @else
            <span class="text-gray-400 text-sm">{{ $placeholder }}</span>
        @endif
        @if ($open)
            <span class="ml-auto text-gray-400">▲</span>
        @else
            <span class="ml-auto text-gray-400">▼</span>
        @endif
    </div>

    <!-- Dropdown -->
    @if ($open)
        <div class="absolute z-50 mt-1 w-full bg-white border rounded-md shadow-lg max-h-64 overflow-auto">
            @foreach ($options as $value => $labelOption)
                <label class="flex items-center justify-between p-2 cursor-pointer hover:bg-blue-100">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500"
                            wire:click="toggle('{{ $value }}')" @if (in_array($value, $selected)) checked @endif>
                        <span class="text-sm">{{ $labelOption }}</span>
                    </div>
                    <span class="text-blue-500 font-bold"
                        @if (!in_array($value, $selected)) style="display:none" @endif>✔</span>
                </label>
            @endforeach
        </div>
    @endif

    <!-- Clear All Button -->
    @if (count($selected) > 0)
        <button type="button" wire:click="clearAll" class="mt-2 text-sm text-red-500 hover:underline">
            Clear All
        </button>
    @endif
</div>
