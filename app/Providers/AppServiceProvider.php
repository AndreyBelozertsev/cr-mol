<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::morphMap([
            'unit' => Unit::class,
            'category' => Category::class,
            'page' => Page::class
        ]);

        Str::macro('phoneNumber', function ($string) {
            return preg_replace('/^8{1}/', '7', preg_replace('/[^0-9]/', '', $string));
        });

        Blade::if('fullInformation', function () {
            return isCorrectProfile();
        });

    }
}
