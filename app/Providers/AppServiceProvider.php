<?php

namespace Kleinespende\Providers;

use Event;
use Illuminate\Support\ServiceProvider;
use Kleinespende\Http\ViewComposers\ReceiverComposer;
use Kleinespende\Models\Receiver;
use Kleinespende\Events\ReceiverUpdated;

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
        Receiver::updated(function ($receiver) {
            Event::fire(new ReceiverUpdated($receiver));
        });
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
