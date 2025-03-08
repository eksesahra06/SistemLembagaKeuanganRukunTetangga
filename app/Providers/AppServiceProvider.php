<?php

namespace App\Providers;

use App\Helper;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Set Fasade Accessor
        // Facade::setFacadeAccessor('Helper', Helper::class);
        // Storage::disk('public')->put('test.txt', 'Conten');
        // Require helpers.php
        // require_once __DIR__ . '/../helpers.php';
    }
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
}
