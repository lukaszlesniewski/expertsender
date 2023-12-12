<?php

namespace Lukaszlesniewski\ExpertSender\Providers;

use Illuminate\Support\ServiceProvider;

class ExpertSenderProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/expertsender.php' =>  config_path('expertsender.php'),
        ], 'config');
    }
    
    public function register()
    {

    }
}