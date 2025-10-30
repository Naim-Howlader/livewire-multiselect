<?php

namespace NaimHowlader\LivewireMultiselect\Http\Livewire;

use Livewire\Component;

class Multiselect extends Component
{
    public array $options = [];
    public array $selected = [];
    public string $name = 'multiselect';

    public function mount(array $options = [], array $selected = [], string $name = 'multiselect'): void
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->name = $name;
    }

    public function toggle($id): void
    {
        if (in_array($id, $this->selected)) {
            $this->selected = array_values(array_filter($this->selected, fn($v) => $v != $id));
        } else {
            $this->selected[] = $id;
        }

        $this->dispatch('multiselectUpdated', name: $this->name, selected: $this->selected);
    }

    public function render()
    {
        return view('livewire-multiselect::multiselect');
    }
}
