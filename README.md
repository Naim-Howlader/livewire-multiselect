# Livewire Multiselect

A simple **Livewire-based multi-select component** for Laravel — no external JavaScript required.  
Fully reusable and easy to integrate into your Livewire projects.

---

## 🔧 Installation

### 1. Run this comman

```bash
composer require naim-howlader/livewire-multiselect:^1.0
```

### 2. Add this into your `composer.json`

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/Naim-Howlader/livewire-multiselect"
  }
]

```

### 3. Parent Livewire Class Structure

```php
<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class HomePage extends Component
{
    public $selectedFruits = [];
    public $selectedAnimals = [];
    public $fruits = [];
    public $animals = [];

    public function mount()
    {
        $this->fruits = [
            '1' => 'Apple',
            '2' => 'Banana',
            '3' => 'Cherry',
            '4' => 'Date',
        ];

        $this->animals = [
            '1' => 'Lion',
            '2' => 'Elephant',
            '3' => 'Giraffe',
            '4' => 'Zebra',
        ];
    }

    #[On('option-selected')]
    public function handleOptionSelected($payload)
    {
        switch ($payload['name']) {
            case 'fruit':
                $this->selectedFruits = $payload['selected'];
                break;
            case 'animal':
                $this->selectedAnimals = $payload['selected'];
                break;
        }
    }
}
```

### 4. Blade File Structure

```blade
<div class="bg-white p-5 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
    <livewire:multiselect :options="$fruits" placeholder="Select fruits" label="Fruits" name="fruit" />

    @if ($selectedFruits)
        <p class="mt-3 text-gray-700 text-sm">
            <span class="font-semibold">Selected:</span>
            {{ implode(', ', $selectedFruits ?? []) }}
        </p>
    @endif
</div>

```

## Livewire Multiselect Package

This package provides a simple, reusable multiselect component for Livewire applications, without the need for any JavaScript.  
It allows developers to easily integrate multiple selections, handle live updates, and keep the UI fully reactive using Livewire events.

---

## 📦 License

MIT License — free to use and modify.

---

## 💡 Tips

- Use unique names for each multiselect to avoid conflicts.
- You can pass associative arrays (e.g., `['1'=>'Apple']`).
- This package is fully reusable — you can copy it into multiple component.

---

## ℹ️ About This Package

This package was created to provide a simple, reusable multiselect component for Livewire applications, without the need for any JavaScript.  
It allows developers to easily integrate multiple selections, handle live updates, and keep the UI fully reactive using Livewire events.

---

## 👤 About the Author

**Naim Howlader** — a passionate Laravel and Livewire developer.  
You can find more of my work on [GitHub](https://github.com/Naim-Howlader).

This package is open-source, and contributions or suggestions are welcome!

Made with ❤️ using Laravel and Livewire
