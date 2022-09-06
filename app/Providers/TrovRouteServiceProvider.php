<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class TrovRouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $routes = File::allFiles(base_path('routes/trov'));

        if ($routes) {
            $this->routes(function () use ($routes) {
                collect($routes)->each(function ($file) {
                    Route::middleware('web')
                        ->group(base_path('routes/trov/' . $file->getBasename()));
                });
            });
        }
    }
}
