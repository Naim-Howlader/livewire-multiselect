<div>
    <div class="border p-2 rounded-md">
        @foreach ($options as $opt)
            @php($id = $opt['id'])
            <label class="flex items-center gap-2 cursor-pointer block py-1">
                <input type="checkbox" wire:click="toggle('{{ $id }}')" @checked(in_array($id, $selected))>
                <span>{{ $opt['label'] }}</span>
            </label>
        @endforeach
    </div>

    {{-- Hidden inputs for form submission --}}
    @foreach ($selected as $value)
        <input type="hidden" name="{{ $name }}[]" value="{{ $value }}">
    @endforeach
</div>
