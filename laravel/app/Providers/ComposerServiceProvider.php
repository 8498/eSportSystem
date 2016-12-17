<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */


    public function boot()
    {
       View::composer('teammanagement::modals.add-game-player-modal', 'App\ViewComposers\GameComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
