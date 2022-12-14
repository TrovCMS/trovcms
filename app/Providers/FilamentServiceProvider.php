<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use pxlrbt\FilamentEnvironmentIndicator\FilamentEnvironmentIndicator;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerTheme(
                mix('css/filament.css')
            );

            Filament::registerNavigationGroups([
                'Site',
                'Discovery Center',
                'Airport',
                'Filament Shield',
            ]);
        });

        FilamentEnvironmentIndicator::configureUsing(function (FilamentEnvironmentIndicator $indicator) {
            $indicator->showBadge = fn () => true;
            $indicator->showBorder = fn () => false;
            $indicator->visible = fn () => true;
        }, isImportant: true);
    }
}
