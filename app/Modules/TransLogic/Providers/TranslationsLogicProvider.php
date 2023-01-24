<?php

namespace App\Modules\TransLogic\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TranslationsLogicProvider extends ServiceProvider
{
  /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        $this->loadMigrationsFrom([
            __DIR__ . '/../Migrations'
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../Config/trans.php','trans');

        
    }

    
}