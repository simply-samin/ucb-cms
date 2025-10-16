<?php

namespace App\Providers;

use Filament\Forms\Components\TagsInput;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TagsInput::configureUsing(function (TagsInput $component): void {
            $component->trim();
        });
    }
}
