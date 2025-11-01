<?php

namespace NaimHowlader\LivewireMultiselect\Http\Livewire;

use Livewire\Component;

class Multiselect extends Component
{
    public $options = [];
    public $selected = [];
    public $placeholder = 'Select options';
    public $label = null;
    public $open = false;

    public $name;

    public function mount($options = [], $selected = [], $placeholder = null, $label = null, $name = null)
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->placeholder = $placeholder ?? 'Select options';
        $this->label = $label;
        $this->name = $name;
    }


    public function toggle($value)
    {
        if (in_array($value, $this->selected)) {
            $this->selected = array_diff($this->selected, [$value]);
        } else {
            $this->selected[] = $value;
        }
        $this->dispatch('option-selected', [
            'name' => $this->name,
            'selected' => $this->selected,
        ]);
    }

    public function clearAll()
    {
        $this->selected = [];
    }

    public function toggleDropdown()
    {
        $this->open = !$this->open;
    }

    public function closeDropdown()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire-multiselect::multiselect');
    }
}
