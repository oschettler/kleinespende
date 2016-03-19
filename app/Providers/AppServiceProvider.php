<?php

namespace Kleinespende\Providers;

use Illuminate\Support\ServiceProvider;
use Kleinespende\Http\ViewComposers\ReceiverComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            ['buttons.create', 'buttons.edit'], ReceiverComposer::class
);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
