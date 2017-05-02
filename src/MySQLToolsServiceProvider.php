<?php

namespace KCPT;

use Illuminate\Support\ServiceProvider;

class MySQLToolsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if( $this->app->runningInConsole() ) {
            $this->commands([
                MySQLTools\Clear::class,
                MySQLTools\Dump::class,
                MySQLTools\Import::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
