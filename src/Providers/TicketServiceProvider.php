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
        $this->loadRoutesFrom(__DIR__. '/../Routes/web.php');
        $this->loadMigrationsFrom(__DIR__. '/../Migrations');
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
