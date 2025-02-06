<?php

namespace App\Providers;

use App\View\Composers\TrainingComposer;
use Illuminate\Support\Facades\View;
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
        View::share('appName',config('app.name'));
        View::share('appUrl',config('app.url'));

        View::composer(['exercises.*'],TrainingComposer::class);
    }
}
