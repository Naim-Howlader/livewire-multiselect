<?php

namespace NaimHowlader\LivewireMultiselect;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LivewireMultiselectServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge default config
        $this->mergeConfigFrom(__DIR__ . '/../config/multiselect.php', 'livewire-multiselect');
    }

    public function boot(): void
    {
        // Register Livewire component
        if (class_exists(\Livewire\Livewire::class)) {
            Livewire::component('multiselect', \NaimHowlader\LivewireMultiselect\Http\Livewire\Multiselect::class);
        }

        // Load package views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-multiselect');

        // Allow publishing of views & config
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/livewire-multiselect'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config/multiselect.php' => config_path('multiselect.php'),
        ], 'config');
    }
}
