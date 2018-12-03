<?php

namespace Pountech\Ticket\Providers;

use Illuminate\Support\ServiceProvider;
use Pountech\Ticket\Commands\InstallCommand;

class TicketServiceProvider extends ServiceProvider
{
    private $packagePath = __DIR__. '/../';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->packagePath. '/Migrations/' => database_path('migrations')
        ], 'ticket');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->registerConsoleCommands();
        }
    }


    private function registerConsoleCommands()
    {
        $this->commands(InstallCommand::class); //
    }

}
