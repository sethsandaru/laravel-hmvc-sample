<?php
/**
 * Created by PhpStorm.
 * User: Seth Phat
 * Date: 10/15/2018
 * Time: 7:59 PM
 */

namespace App\Modules\Home;


use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    private $moduleName = "home";

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        // register your config file here
        $this->mergeConfigFrom(__DIR__ . '/Configs/homeconfig.php', 'homeconfig');
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        // boot route
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // boot migration
        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // boot languages
        $this->loadTranslationsFrom(__DIR__ . '/Languages', $this->moduleName);

        // boot views
        $this->loadViewsFrom(__DIR__ . '/Views', $this->moduleName);
    }
}