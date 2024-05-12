<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\View\Composers\SettingComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layouts.app', 'page.home.index'], SettingComposer::class);
    }
}
