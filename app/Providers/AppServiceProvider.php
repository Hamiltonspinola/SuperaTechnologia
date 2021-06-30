<?php

namespace App\Providers;

use App\Models\vehicle;
use App\Observers\PlanObeserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        vehicle::observe(PlanObeserver::class);
    }
}
