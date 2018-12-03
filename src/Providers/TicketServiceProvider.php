<?php

namespace Pountech\Ticket\Providers;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__. '/../Migrations');
        $this->publishes([
            __DIR__.'/../Migrations/' => database_path('migrations')
        ], 'ticket_migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

}
